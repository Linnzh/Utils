<?php

declare(strict_types=1);

namespace Linnzh\Utils\Bridge;

class TV implements DeviceCommonInterface
{
    private bool $on = false;

    private int $volume = 0;

    public function isEnabled(): bool
    {
        return $this->on;
    }

    public function enable(): void
    {
        $this->on = true;
    }

    public function disable(): void
    {
        $this->on = false;
    }

    public function getVolume(): int
    {
        return $this->volume;
    }

    public function setVolume(int $volume): void
    {
        $this->volume = $volume;
    }

    public function __toString()
    {
        return '这里是 TV （电视机），' . ($this->on ? '可用' : '不可用') . "，当前音量：{$this->volume}\n";
    }
}
