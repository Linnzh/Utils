<?php

declare(strict_types=1);

namespace Linnzh\Utils\Decorator;

interface NotifierInterface
{
    public function send(string $message): void;
}
