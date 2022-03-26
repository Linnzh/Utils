<?php

declare(strict_types=1);

namespace Linnzh\Utils\Adapter;

interface NotificationTarget
{
    public function send(string $title, string $message): void;
}
