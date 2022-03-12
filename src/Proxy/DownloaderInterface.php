<?php


namespace Linnzh\Utils\Proxy;


interface DownloaderInterface
{
    public function download(string $url): string;
}
