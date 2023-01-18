<?php


namespace Linnzh\Utils\Compression;


use FFMpeg\Coordinate\FrameRate;
use FFMpeg\FFMpeg;
use FFMpeg\Format\Video\WebM;
use FFMpeg\Format\Video\X264;

/**
 * Class Video
 *
 * @link    https://github.com/PHP-FFMpeg/PHP-FFMpeg
 * @link    https://ffmpeg.org/documentation.html
 * @link    https://njuferret.github.io/2018/01/27/ffmpeg_usage
 *
 * @author  linnzh
 * @created 2023/1/17 17:07
 */
class Video
{
    private static function getFileExtension(string $filePath)
    {
        return strtolower(pathinfo($filePath, PATHINFO_EXTENSION));
    }

    /**
     * ffmpeg -y -i /opt/www/tests/Compression/demo.mp4
     * -threads 1
     * -vcodec libx264
     * -acodec aac
     * -b:v 19
     *
     * @param string $path
     * @param string $outputPathfile
     *
     * @return bool
     * @throws \Throwable
     * @author  linnzh
     * @created 2023/1/18 10:38
     */
    public function compress(string $path, string $outputPathfile)
    {
        $startTime = time();
        try {
            $ffmpeg = $this->getFFMpeg();
            $video = $ffmpeg->open($path);

            /**
             * $video->getStreams()->videos()->first()?->all()
             *
             * duration 视频时长（秒）
             * width 宽度
             * height 高度
             */
            $originInfo = $this->getVideoInfo($video);

            $width = $originInfo['width'] * 0.5;
            $height = $originInfo['height'] * 0.5;

            if (self::getFileExtension($outputPathfile) == 'webm') {
                $format = new WebM();
            } else {
                $format = new X264('aac', 'libx264');
            }

            // 视频比特率
            // 比特率高，压缩速度就慢
            $videoBiteRate = $video->getFormat()->get('bit_rate');
            $format->setKiloBitrate(round($videoBiteRate / 1024 * 0.1, 0));

            $audioInfo = $video->getStreams()->audios()->first()?->all();
            if ($audioInfo) {
                $format->setAudioChannels($audioInfo['channels'] ?? 1);
                $format->setAudioKiloBitrate($audioInfo['bit_rate'] ?? 128);
            }

            $video->filters()
                ->framerate(new FrameRate(25), 48)
                ->resize(new \FFMpeg\Coordinate\Dimension((int) $width, (int) $height))
                ->synchronize();

            $format->on('progress', function ($video, $format, $percentage) {
                $content = date('Y-m-d H:i:s ') . "{$percentage} % transcoded\n";
                echo $content;
            });

            $result = $video->save($format, $outputPathfile);

            $newInfo = $this->getVideoInfo($result);

            printf("Origin info is %s\nNew info is %s\n", json_encode($originInfo), json_encode($newInfo));

        } catch (\Throwable $e) {
            printf("Error: %s in %s[%d]\n\n", $e->getMessage(), $e->getFile(), $e->getCode());
            throw $e;
        } finally {
            $result = null;

            $sizeUnit = 'MB';
            $sizeConstant = 1048576;
            $originFileSize = round(filesize($path) / $sizeConstant, 0);
            $newFileSize = round(filesize($outputPathfile) / $sizeConstant, 0);

            $interval = time() - $startTime;

            /**
             * 原视频大小：84 MB 压缩后视频大小：27 MB 总耗时：385 秒（mp4）
             * 原视频大小：84 MB 压缩后视频大小：2 MB 总耗时：249 秒（webm）
             */
            printf("原视频大小：%d MB 压缩后视频大小：%d MB 总耗时：%d 秒\n", $originFileSize, $newFileSize, $interval);
        }

        return !empty($result);
    }

    /**
     * @return \FFMpeg\FFMpeg
     *
     * @author  linnzh
     * @created 2023/1/18 15:05
     */
    public function getFFMpeg(): FFMpeg
    {
        return FFMpeg::create([
            // 'ffmpeg.binaries' => '/usr/bin/ffmpeg',
            // 'ffprobe.binaries' => '/usr/bin/ffprobe',

            'timeout' => 0, // The timeout for the underlying process
            'ffmpeg.threads' => 2,   // The number of threads that FFMpeg should use
            'ffmpeg.preset' => 'ultrafast',
            'ffmpeg.nostats' => 1,
            'ffmpeg.crf' => 20,
            'ffmpeg.maxrate' => '400k',
            'ffmpeg.bufsize' => '800k',
            // todo 临时文件夹无效
            'temporary_directory' => dirname(__FILE__, 2) . '/runtime',
        ]);
    }

    /**
     * @param \FFMpeg\Media\Video|\FFMpeg\Media\Audio $video
     *
     * @return array
     *
     * @author  linnzh
     * @created 2023/1/18 15:05
     */
    public function getVideoInfo(\FFMpeg\Media\Video|\FFMpeg\Media\Audio $video): array
    {
        $videoInfo = $video->getStreams()->videos()->first();
        $format = $video->getFormat();
        return [
            'width' => $videoInfo?->get('width'),
            'height' => $videoInfo?->get('height'),
            'r_frame_rate' => $videoInfo?->get('r_frame_rate'),
            'filename' => $format->get('filename'),
            'filesize' => $format->get('size') / 1048576,// MB
            'duration' => $format->get('duration'),// 秒
            'bit_rate' => $format->get('bit_rate'),// 比特率
        ];
    }
}
