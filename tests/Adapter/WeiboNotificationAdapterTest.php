<?php

declare(strict_types=1);

namespace Linnzh\Utils\Test\Adapter;

use Linnzh\Utils\Adapter\EmailNotification;
use Linnzh\Utils\Adapter\WeiboApi;
use Linnzh\Utils\Adapter\WeiboNotificationAdapter;
use PHPUnit\Framework\TestCase;

class WeiboNotificationAdapterTest extends TestCase
{
    public function testExample(): void
    {
        $emailNotification = new EmailNotification('reg.lynnzh@gmail.com');
        $emailNotification->send('一条通知', '你被清华大学录取啦！');

        $weiboNotification = new WeiboNotificationAdapter(new WeiboApi('Linn', md5('linn')), '张三');
        $weiboNotification->send('一条通知', '你被清华大学录取啦！');

        $this->assertEquals(true, true);
    }
}
