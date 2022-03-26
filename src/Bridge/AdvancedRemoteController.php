<?php

declare(strict_types=1);

namespace Linnzh\Utils\Bridge;

class AdvancedRemoteController extends BasicRemoteController
{
    public function mute(): void
    {
        $this->device->setVolume(0);
    }
}
