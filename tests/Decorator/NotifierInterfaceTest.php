<?php

namespace Linnzh\Utils\Test\Decorator;

use Linnzh\Utils\Decorator\NotifierInterface;
use Linnzh\Utils\Decorator\QQNotifierDecorator;
use Linnzh\Utils\Decorator\SmsNotifierDecorator;
use Linnzh\Utils\Decorator\WechatNotifierDecorator;
use PHPUnit\Framework\TestCase;

class NotifierInterfaceTest extends TestCase
{
    public function testExample(): void
    {
        echo "\n正在创建订单……\n订单创建完成，即将发送通知……\n";
        $decorator = new SmsNotifierDecorator();
        $decorator->send('明明');
        echo "通知结束！\n";

        echo "\n正在创建订单……\n订单创建完成，即将发送通知……\n";
        $decorator = new SmsNotifierDecorator(new WechatNotifierDecorator());
        $decorator->send('白白');
        echo "通知结束！\n";

        echo "\n正在创建订单……\n订单创建完成，即将发送通知……\n";
        $decorator = new SmsNotifierDecorator(new WechatNotifierDecorator(new QQNotifierDecorator()));
        $decorator->send('白白');
        echo "通知结束！\n";


        $this->assertEquals(true, true);
    }
}
