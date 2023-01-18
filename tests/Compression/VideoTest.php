<?php

namespace Linnzh\Utils\Test\Compression;

use Linnzh\Utils\Compression\Video;
use PHPUnit\Framework\TestCase;

class VideoTest extends TestCase
{
    public string $outputPathfile;
    private string $path;

    protected function setUp(): void
    {
        parent::setUp();
        $this->path = __DIR__.'/demo.mp4';
        $this->outputPathfile = __DIR__ . '/compress.mp4';
    }

    public function testCompress()
    {
        $video = new Video();
        $video->compress($this->path, $this->outputPathfile);
        $this->assertTrue(is_file($this->outputPathfile));
    }
}
