<?php

declare(strict_types=1);

namespace Linnzh\Utils\Mediator;

class DeviceMediator
{
    public const SPEAKER = 1;

    public const CAMERA = 2;

    /**
     * @var DeviceManagerInterface[]
     */
    private array $deviceManagerList = [];

    public function __construct()
    {
        $this->deviceManagerList[self::SPEAKER] = new SpeakerManager();
        $this->deviceManagerList[self::CAMERA] = new CameraManager();
    }

    public function getDeviceManagerListByType(int $type): DeviceManagerInterface
    {
        return $this->deviceManagerList[$type];
    }

    public function getDeviceListByType(int $type): array
    {
        return $this->deviceManagerList[$type]->enumerate();
    }

    public function activeByType(int $type, int $deviceId): void
    {
        $this->deviceManagerList[$type]->active($deviceId);
    }

    public function getCurrentDeviceIdByType(int $type): int
    {
        return $this->deviceManagerList[$type]->getCurrentDeviceId();
    }
}
