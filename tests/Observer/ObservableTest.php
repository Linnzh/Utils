<?php

namespace Linnzh\Utils\Test\Observer;

use Linnzh\Utils\Observer\Account;
use Linnzh\Utils\Observer\Observable;
use Linnzh\Utils\Observer\SmsSender;
use PHPUnit\Framework\TestCase;

class ObservableTest extends TestCase
{
    public function testExample(): void
    {
        $account = new Account();

        $account->addObserver(new SmsSender());
        $account->login('test', '123.12.34.21');
        $this->expectOutputString('用户名：test IP：123.12.34.21');
        //$account->login('test2', '123.12.34.21');
    }
}
