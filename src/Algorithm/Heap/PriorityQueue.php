<?php


namespace Linnzh\Utils\Algorithm\Heap;


/**
 * 优先队列 - PriorityQueue
 *
 * 优先队列是一种特殊的队列数据结构，它可以让元素在队列中按照优先级顺序排列。
 * 具体来说，优先队列中的每个元素都有一个相关联的优先级，这个优先级可以是数字、字符串、对象等等。
 * 当调用 dequeue 方法时，优先队列会返回当前队列中优先级最高的元素。
 *
 * 优先队列可以用于很多实际应用场景，比如任务调度、事件处理、数据压缩等等。
 * 在任务调度中，优先队列可以用于按照任务优先级调度任务执行的顺序；
 * 在事件处理中，优先队列可以用于按照事件发生时间的先后顺序处理事件；
 * 在数据压缩中，优先队列可以用于按照字符出现频率构建霍夫曼树，从而实现高效的数据压缩算法。
 *
 * 优先队列可以通过各种不同的数据结构来实现，比如堆（Heap）、二叉搜索树（Binary Search Tree）、红黑树（Red-Black Tree）等等。
 * 其中，使用堆实现优先队列是最常见、最高效的方法。
 */
class PriorityQueue extends MaxHeap
{
    /**
     * 插入元素
     *
     * @param mixed $item
     */
    public function enqueue(mixed $item)
    {
        $this->push($item);
    }

    /**
     * 删除元素
     *
     * 先删除优先级较高的元素（大顶堆）
     *
     * @return mixed|null
     */
    public function dequeue()
    {
        return $this->pop();
    }
}
