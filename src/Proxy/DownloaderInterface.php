<?php

declare(strict_types=1);

namespace Linnzh\Utils\Proxy;

interface DownloaderInterface
{
    public function download(string $url): string;
}
