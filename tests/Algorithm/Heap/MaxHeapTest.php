<?php

namespace Linnzh\Utils\Test\Algorithm\Heap;

use Linnzh\Utils\Algorithm\Heap\MaxHeap;
use PHPUnit\Framework\TestCase;

class MaxHeapTest extends TestCase
{
    public function testPushPop()
    {
        $heap = new MaxHeap();

        $heap->push(10);
        $heap->push(20);
        $heap->push(15);
        $heap->push(25);

        $this->assertEquals(25, $heap->pop());
        $this->assertEquals(20, $heap->pop());
        $this->assertEquals(15, $heap->pop());
        $this->assertEquals(10, $heap->pop());
        $this->assertNull($heap->pop());
    }

    public function testPeek()
    {
        $heap = new MaxHeap();

        $heap->push(10);
        $heap->push(20);
        $heap->push(15);

        $this->assertEquals(20, $heap->peek());
    }

    public function testEmptyHeap()
    {
        $heap = new MaxHeap();

        $this->assertNull($heap->pop());
        $this->assertNull($heap->peek());
    }
}
