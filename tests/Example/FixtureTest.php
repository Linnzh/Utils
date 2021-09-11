<?php


namespace Linnzh\Utils\Test\Example;


use PHPUnit\Framework\TestCase;

class FixtureTest extends TestCase
{
    /**
     * 在编写测试时，最费时的部分之一是编写代码来将整个场景设置成某个已知的状态，并在测试结束后将其复原到初始状态。
     * 这个已知的状态称为测试的 基境(fixture)。
     *
     * PHPUnit 支持共享建立基境的代码。在运行某个测试方法前，会调用一个名叫 setUp() 的模板方法。
     *
     * setUp() 是创建测试所用对象的地方。当测试方法运行结束后，不管是成功还是失败，都会调用另外一个名叫 tearDown() 的模板方法。
     * tearDown() 是清理测试所用对象的地方。
     *
     * 一个有实际意义的多测试间共享基境的例子是数据库连接：只登录数据库一次，然后重用此连接，
     * 而不是每个测试都建立一个新的数据库连接。这样能加快测试的运行。
     *
     * 需要反复强调的是：在测试之间共享基境会降低测试的价值。潜在的设计问题是对象之间并非松散耦合。
     */

    protected $stack;

    protected function setUp(): void
    {
        $this->stack = [];
    }

    public function testEmpty(): void
    {
        $this->assertEmpty($this->stack);
    }

    public function testPush(): void
    {
        $this->stack[] = 'foo';
        $this->assertEquals('foo', $this->stack[count($this->stack) - 1]);
        $this->assertNotEmpty($this->stack);
    }

    public function testPop(): void
    {
        $this->stack[] = 'foo';
        $this->assertEquals('foo', array_pop($this->stack));
        $this->assertEmpty($this->stack);
    }
}