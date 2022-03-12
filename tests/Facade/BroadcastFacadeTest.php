<?php

namespace Linnzh\Utils\Test\Facade;

use Linnzh\Utils\Facade\BroadcastFacade;
use Linnzh\Utils\Facade\Company;
use Linnzh\Utils\Facade\User;
use PHPUnit\Framework\TestCase;

class BroadcastFacadeTest extends TestCase
{
    public function testExample(): void
    {
        $company = new Company('Linn集团');
        $company->addUser(new User('LA', 'test.la@example.com'));
        $company->addUser(new User('LB', 'test.lb@example.com'));

        $facade = new BroadcastFacade($company);
        $facade->send('愚人节全场九折！', '促销活动', 'email');
        $facade->send('愚人节全场九折！', '促销活动', 'weibo');

        $this->assertEquals(true, true);
    }
}
