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

    /**
     * 元素入堆
     *
     * @param mixed $item
     */
    public function push(mixed $item)
    {
        /**
         * 添加至堆底
         */
        $this->data[] = $item;
        $this->size++;

        /**
         * 由于 val 可能大于堆中其它元素，此时堆的成立条件可能已经被破坏，
         * 因此需要修复从插入结点到根结点这条路径上的各个结点，该操作被称为「堆化 Heapify」
         */
        $this->heapifyUp($this->size - 1);
    }

    /**
     * 堆化：修复从插入结点到根结点这条路径上的各个结点
     *
     * 将新插入的元素与其父节点进行比较并进行位置调整，使得堆仍保持大顶堆的性质
     *
     * @param int $index 新插入的元素的下标
     */
    protected function heapifyUp(int $index)
    {
        // 如果当前节点不是根节点，且当前节点比其父节点大，需要进行位置交换
        while ($index > 0 && $this->data[$index] > $this->data[$this->parent($index)]) {
            // 交换当前节点与父节点的值
            $parentIndex = $this->swap($index);
            // 更新当前节点的下标为其父节点的下标，继续进行比较
            $index = $parentIndex;
        }
    }

    /**
     * 交换当前节点与父节点的值
     *
     * @param int $index
     *
     * @return int
     */
    protected function swap(int $index): int
    {
        $parentIndex = $this->parent($index);

        $temp = $this->data[$index];
        $this->data[$index] = $this->data[$parentIndex];
        $this->data[$parentIndex] = $temp;

        return $parentIndex;
    }
}

