<?php


namespace Linnzh\Utils\Algorithm\Heap;


use Linnzh\Utils\Algorithm\Heap;

class MinHeap extends Heap
{
    /**
     * 比较 left 是否小于 right（小顶堆）
     *
     * @param int $left
     * @param int $right
     *
     * @return bool
     */
    protected function compare(int $left, int $right): bool
    {
        return $this->data[$left] < $this->data[$right];
    }
}
