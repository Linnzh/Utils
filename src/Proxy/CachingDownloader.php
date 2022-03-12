<?php


namespace Linnzh\Utils\Proxy;


class CachingDownloader implements DownloaderInterface
{
    private DownloaderInterface $downloader;

    private array $cache = [];

    public function __construct(?DownloaderInterface $downloader = null)
    {
        $this->downloader = $downloader ?? (new Downloader());
    }

    public function download(string $url): string
    {
        if(!isset($this->cache[$url])) {
            echo "缓存失效！正在重新下载……\n";
            $result = $this->downloader->download($url);
            $this->cache[$url] = $result;
        } else {
            echo "缓存命中！正在返回结果……\n";
        }

        return $this->cache[$url];
    }
}
