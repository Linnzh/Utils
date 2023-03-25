<?php

namespace Linnzh\Utils\Test\Algorithm\Heap;

use Linnzh\Utils\Algorithm\Heap\MinHeap;
use PHPUnit\Framework\TestCase;

class MinHeapTest extends TestCase
{
    public function testPushAndPop()
    {
        $heap = new MinHeap();

        $heap->push(5);
        $heap->push(3);
        $heap->push(8);
        $heap->push(2);

        $this->assertEquals(2, $heap->pop());
        $this->assertEquals(3, $heap->pop());
        $this->assertEquals(5, $heap->pop());
        $this->assertEquals(8, $heap->pop());
        $this->assertNull($heap->pop());
    }

    public function testPeek()
    {
        $heap = new MinHeap();

        $heap->push(5);
        $heap->push(3);
        $heap->push(8);
        $heap->push(2);

        $this->assertEquals(2, $heap->peek());
    }

    public function testSize()
    {
        $heap = new MinHeap();

        $this->assertEquals(0, $heap->size());

        $heap->push(5);
        $heap->push(3);

        $this->assertEquals(2, $heap->size());

        $heap->pop();

        $this->assertEquals(1, $heap->size());
    }
}
