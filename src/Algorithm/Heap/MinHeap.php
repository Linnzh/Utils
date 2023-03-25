<?php


namespace Linnzh\Utils\Algorithm\Heap;


use Linnzh\Utils\Algorithm\Heap;

class MinHeap extends Heap
{
    protected function heapifyDown(int $index = 0)
    {
        while ($this->left($index) < $this->size) {
            $smallestIndex = $this->left($index);
            if ($smallestIndex + 1 < $this->size && $this->data[$smallestIndex + 1] < $this->data[$smallestIndex]) {
                $smallestIndex = $this->right($index);
            }
            if ($this->data[$index] <= $this->data[$smallestIndex]) {
                break;
            }
            $this->swap($index, $smallestIndex);
            $index = $smallestIndex;
        }
    }

    protected function heapifyUp(int $index)
    {
        while ($index > 0 && $this->data[$index] < $this->data[$this->parent($index)]) {
            $parentIndex = $this->parent($index);
            $this->swap($index, $parentIndex);
            $index = $parentIndex;
        }
    }
}
