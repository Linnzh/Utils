<?php

declare(strict_types=1);

namespace Linnzh\Utils\Test\Bridge;

use Linnzh\Utils\Bridge\AdvancedRemoteController;
use Linnzh\Utils\Bridge\BasicRemoteController;
use Linnzh\Utils\Bridge\Radio;
use Linnzh\Utils\Bridge\TV;
use PHPUnit\Framework\TestCase;

class DeviceCommonInterfaceTest extends TestCase
{
    public function testExample(): void
    {
        $device = new Radio();
        echo $device;
        $remoteController = new BasicRemoteController($device);
        $remoteController->power();
        $remoteController->volumeUp();
        $remoteController->volumeUp();
        echo $device;
        $remoteController->volumeDown();
        echo $device;
        $remoteController->power();
        echo $device;

        $device = new TV();
        echo $device;
        $remoteController = new AdvancedRemoteController($device);
        $remoteController->power();
        $remoteController->mute();
        echo $device;
        $remoteController->volumeUp();
        echo $device;
        $remoteController->power();
        echo $device;

        $this->assertEquals(true, true);
    }
}
