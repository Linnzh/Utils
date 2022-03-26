<?php

declare(strict_types=1);

namespace Linnzh\Utils\Test\Example;

use PHPUnit\Framework\TestCase;

class SkippedTest extends TestCase
{
    public function testConnection(): void
    {
        $this->assertTrue(true);
    }

    /**
     * 使用 @requires 标注来表达测试用例的一些常见前提条件
     *
     * @requires PHP 7.4
     * @requires extension redis 2.2.0
     */
    public function testPhpVersion(): void
    {
        $this->assertTrue(true);
    }

    protected function setUp(): void
    {
        if (!extension_loaded('pdo_mysql')) {
            $this->markTestSkipped('PDO 扩展尚未开启，此测试将被跳过，该测试被标记为 S');
        }
    }
}
