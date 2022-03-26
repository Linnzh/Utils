<?php

declare(strict_types=1);

namespace Linnzh\Utils\Mediator;

class CameraManager implements DeviceManagerInterface
{
    public int $deviceId = 0;

    public function enumerate(): array
    {
        return [
            ['id' => 1, 'name' => '摄像头1'],
            ['id' => 2, 'name' => '摄像头2'],
            ['id' => 3, 'name' => '摄像头3'],
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
