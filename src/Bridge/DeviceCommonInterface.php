<?php

declare(strict_types=1);

namespace Linnzh\Utils\Bridge;

interface DeviceCommonInterface
{
    public function isEnabled(): bool;

    public function enable(): void;

    public function disable(): void;

    public function getVolume(): int;

    public function setVolume(int $volume): void;
}
