<?php

declare(strict_types=1);

namespace Linnzh\Utils\Test\State;

use Linnzh\Utils\State\TCPConnectionContext;
use PHPUnit\Framework\TestCase;

class TCPConnectionContextTest extends TestCase
{
    public function testExample(): void
    {
        $context = new TCPConnectionContext();

        $context->established();// 状态变更
        $stateName = $context->behavior();// 在 behavior() 方法中，调用当前状态的行为方法
        $this->assertEquals('established', $stateName);

        $context->listen();
        $stateName = $context->behavior();
        $this->assertEquals('listen', $stateName);

        $context->closed();
        $stateName = $context->behavior();
        $this->assertEquals('closed', $stateName);
    }
}
