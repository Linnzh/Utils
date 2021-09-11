<?php


namespace Linnzh\Utils\Test\Example;


use PHPUnit\Framework\TestCase;

class IncompleteTest extends TestCase
{
    public function testSomething(): void
    {
        $this->assertTrue(true, '测试一个未完成的测试');

        // ...

        $this->markTestIncomplete('此测试尚未完成，将被标记为 I');
    }
}