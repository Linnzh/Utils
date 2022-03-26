<?php

declare(strict_types=1);

namespace Linnzh\Utils\Mediator;

class SpeakerManager implements DeviceManagerInterface
{
    public int $deviceId = 0;

    public function enumerate(): array
    {
        return [
            ['id' => 1, 'name' => '麦克风1'],
            ['id' => 2, 'name' => '麦克风2'],
            ['id' => 3, 'name' => '麦克风3'],
        ];
    }

    public function active(int $deviceId): void
    {
        $this->deviceId = $deviceId;
    }

    public function getCurrentDeviceId(): int
    {
        return $this->deviceId;
    }
}
