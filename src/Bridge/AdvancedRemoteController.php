<?php


namespace Linnzh\Utils\Bridge;


class AdvancedRemoteController extends BasicRemoteController
{
    public function mute(): void
    {
        $this->device->setVolume(0);
    }
}
