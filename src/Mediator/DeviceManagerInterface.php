<?php

declare(strict_types=1);

namespace Linnzh\Utils\Mediator;

interface DeviceManagerInterface
{
    /**
     * 设备列表
     *
     * @return array
     */
    public function enumerate(): array;

    /**
     * 激活指定设备
     *
     * @param int $deviceId
     */
    public function active(int $deviceId): void;

    /**
     * 获取指定设备类型的当前使用设备
     */
    public function getCurrentDeviceId(): int;
}
