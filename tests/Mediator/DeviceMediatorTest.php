<?php

declare(strict_types=1);

namespace Linnzh\Utils\Test\Mediator;

use Linnzh\Utils\Mediator\DeviceMediator;
use PHPUnit\Framework\TestCase;

class DeviceMediatorTest extends TestCase
{
    public function testExample(): void
    {
        $mediator = new DeviceMediator();

        // 激活麦克风管理器中的第一个设备
        // 该过程全部交由中介者 mediator 做
        $colleague = $mediator->getDeviceListByType(DeviceMediator::SPEAKER);
        $mediator->activeByType(DeviceMediator::SPEAKER, $colleague[0]['id']);
        $this->assertEquals(1, $mediator->getCurrentDeviceIdByType(DeviceMediator::SPEAKER));

        // 激活麦克风管理器中的第二个设备
        // 该过程全部交由中介者 mediator 做
        $colleague = $mediator->getDeviceListByType(DeviceMediator::CAMERA);
        $mediator->activeByType(DeviceMediator::CAMERA, $colleague[1]['id']);
        $this->assertEquals(2, $mediator->getCurrentDeviceIdByType(DeviceMediator::CAMERA));
    }
}
