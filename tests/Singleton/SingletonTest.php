<?php

namespace Linnzh\Utils\Test\Singleton;

use Linnzh\Utils\Singleton\Singleton;
use PHPUnit\Framework\TestCase;

class SingletonTest extends TestCase
{
    public function testExample(): void
    {
        $instance1 = Singleton::getInstance();
        $instance2 = Singleton::getInstance();

        $this->assertEquals(true, $instance1 === $instance2);
    }
}
