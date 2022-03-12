<?php


namespace Linnzh\Utils\Bridge;


class BasicRemoteController implements RemoteControllerInterface
{
    protected DeviceCommonInterface $device;

    public function __construct(?DeviceCommonInterface $device)
    {
        $device && $this->device = $device;
    }

    public function power(): void
    {
        echo '当前设备状态：' . ($this->device->isEnabled() ? '开启' : '关闭') . "，正在为您"  . ($this->device->isEnabled() ? '关机' : '开机') . "\n";
        $this->device->isEnabled() ? $this->device->disable() : $this->device->enable();
    }

    public function volumeUp(): void
    {
        $this->device->setVolume($this->device->getVolume() + 10);
    }

    public function volumeDown(): void
    {
        $this->device->setVolume($this->device->getVolume() - 10);
    }
}
