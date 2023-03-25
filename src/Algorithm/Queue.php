<?php


namespace Linnzh\Utils\Algorithm;


/**
 * 队列 - Queue
 *
 * 队列是一种先进先出（FIFO）的数据结构，它允许在队尾插入元素，在队头删除元素。
 * 队列可以用于实现消息队列、任务队列等场景。
 */
class Queue
{
    private array $queue;

    /**
     * @var int 队头指针，指向队列第一个元素的位置
     *          每当删除一个元素时，front 指针就会向后移动一位；
     *          当队列为空时，front 指针和 rear 指针重合，且它们的位置都为 -1。
     */
    private int $front;

    /**
     * @var int 队尾指针，指向队列最后一个元素的位置
     *          每当插入一个元素时，rear 指针就会向后移动一位；
     *          当队列为空时，rear 指针的位置应该比 front 指针的位置小 1，这时候队列的大小为 0。
     */
    private int $rear;

    public function __construct()
    {
        $this->queue = [];
        $this->front = 0;
        $this->rear = -1;
    }

    /**
     * 入队——将一个元素添加到队尾
     *
     * @param mixed $data
     */
    public function enqueue(mixed $data)
    {
        $this->rear++;
        $this->queue[$this->rear] = $data;
    }

    /**
     * 出队——将队头元素弹出并返回
     *
     * @return mixed
     * @throws \Exception
     */
    public function dequeue()
    {
        if ($this->front > $this->rear) {
            throw new \Exception("Queue is empty.");
        }
        $data = $this->queue[$this->front];
        unset($this->queue[$this->front]);
        $this->front++;
        return $data;
    }

    public function front()
    {
        if ($this->front > $this->rear) {
            throw new \Exception("Queue is empty.");
        }
        return $this->queue[$this->front];
    }

    public function isEmpty()
    {
        return $this->front > $this->rear;
    }

    public function size()
    {
        return $this->rear - $this->front + 1;
    }
}

