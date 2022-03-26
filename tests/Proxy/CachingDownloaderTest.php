<?php

declare(strict_types=1);

namespace Linnzh\Utils\Test\Proxy;

use Linnzh\Utils\Proxy\CachingDownloader;
use Linnzh\Utils\Proxy\Downloader;
use PHPUnit\Framework\TestCase;

class CachingDownloaderTest extends TestCase
{
    public function testExample(): void
    {
        $url = 'http://www.baidu.com';
        $realSubject = new Downloader();
        $realResult = $realSubject->download($url);

        $proxySubject = new CachingDownloader();
        $proxyResult = $realSubject->download($url);

        $this->assertEquals($realResult, $proxyResult);
    }
}
