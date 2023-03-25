<?php


namespace Linnzh\Utils\Algorithm;


/**
 * 堆 - Heap
 * 当前类默认实现「大顶堆 Max Heap」
 * 若想转换为「小顶堆」，将所有大小逻辑判断取逆（例如将 ≥ 替换为 ≤）即可
 *
 * 堆是一种特殊的树形数据结构，每个节点的值都大于等于（或小于等于）其子节点的值。
 *
 * 它是一棵限定条件下的「完全二叉树」。
 * 二叉树中的根结点对应「堆顶」，底层最靠右结点对应「堆底」
 *
 * 根据成立条件，堆主要分为两种类型：
 *
 * 1. 「大顶堆 Max Heap」，任意结点的值 >=其子结点的值（堆往下越来越小，堆顶/根元素最大）
 * 大顶堆就是一个元素从大到小出队的优先队列
 *
 *
 * 2. 「小顶堆 Min Heap」，任意结点的值 <=其子结点的值（堆往下越来越大，堆顶/根元素最小）
 *
 *
 * 堆常用于实现优先队列等数据结构。
 *
 * @link https://www.hello-algo.com/chapter_heap/heap/
 */
class Heap
{
    public array $data;
    public int $size;

    public function __construct()
    {
        $this->data = [];
        $this->size = 0;
    }

    /**
     * 获取某个节点的父节点的下标
     *
     * @param int $index
     *
     * @return int
     */
    public function parent(int $index)
    {
        return (int) floor(($index - 1) / 2);
    }

    /**
     * 获取某个节点的左子节点的下标
     *
     * @param int $index
     *
     * @return float|int
     */
    public function left(int $index)
    {
        return 2 * $index + 1;
    }

    /**
     * 获取某个节点的右子节点的下标
     *
     * @param int $index
     *
     * @return float|int
     */
    public function right(int $index)
    {
        return 2 * $index + 2;
    }

    /**
     * 访问堆顶元素
     * 堆顶元素是二叉树的根结点，即列表首元素
     *
     * @return mixed
     */
    public function peek()
    {
        return $this->data[0];
    }
}

