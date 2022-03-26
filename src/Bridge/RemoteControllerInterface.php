<?php

declare(strict_types=1);

namespace Linnzh\Utils\Bridge;

interface RemoteControllerInterface
{
    public function power(): void;

    public function volumeUp(): void;

    public function volumeDown(): void;
}
