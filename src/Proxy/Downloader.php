<?php

declare(strict_types=1);

namespace Linnzh\Utils\Proxy;

class Downloader implements DownloaderInterface
{
    public function download(string $url): string
    {
        return file_get_contents($url);
    }
}
