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
        return $this->size == 0 ? null : $this->data[0];
    }

    /**
     * 元素入堆——堆底
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
     * 堆顶元素——出堆
     *
     * 步骤：
     * 1. 弹出堆顶元素（在 MaxHeap 中为最大值，MinHeap 中为最小值）
     * 2. 将堆底元素赋值到堆顶
     * 3. 执行 heapifyDown 操作，将新的堆顶元素进行下沉操作
     *
     * @return mixed
     */
    public function pop()
    {
        if ($this->size == 0) {
            return null;
        }

        $root = $this->data[0];
        $this->data[0] = array_pop($this->data);
        $this->size--;

        $this->heapifyDown();

        return $root;
    }

    /**
     * 下沉/从顶至底堆化：修复从根结点到弹出结点这条路径上的各个结点，从堆顶开始进行向下调整
     *
     * @param int $index
     */
    protected function heapifyDown(int $index = 0)
    {
        while ($this->left($index) < $this->size) {
            // 找到左右子节点中较大的那个节点
            $largestIndex = $this->left($index);
            if ($largestIndex + 1 < $this->size && $this->compare($largestIndex + 1, $largestIndex)) {
                $largestIndex = $this->right($index);
            }
            // 如果该节点比子节点中较大的节点还大，说明该元素已经到达了合适的位置，退出循环
            if ($this->compare($index, $largestIndex)) {
                break;
            }
            // 否则，将该节点与子节点中较大的那个节点进行交换，并继续向下调整位置
            $this->swap($index, $largestIndex);
            $index = $largestIndex;
        }
    }

    /**
     * 上浮/从底至顶执行堆化：修复从插入结点到根结点这条路径上的各个结点，从入堆结点开始
     *
     * 将新插入的元素与其父节点进行比较并进行位置调整，使得堆仍保持大顶堆的性质
     *
     * @param int $index 新插入的元素的下标
     */
    protected function heapifyUp(int $index)
    {
        // 如果当前节点不是根节点，且当前节点比其父节点大，需要进行位置交换
        while ($index > 0 && $this->compare($index, $this->parent($index))) {
            // 交换当前节点与父节点的值
            $parentIndex = $this->parent($index);
            $this->swap($index, $parentIndex);
            // 更新当前节点的下标为其父节点的下标，继续进行比较
            $index = $parentIndex;
        }
    }

    public function swap(int $index1, int $index2)
    {
        $temp = $this->data[$index1];
        $this->data[$index1] = $this->data[$index2];
        $this->data[$index2] = $temp;
    }

    public function size()
    {
        return $this->size;
    }

    public function isEmpty()
    {
        return $this->size == 0;
    }

    /**
     * 比较 left 是否大于 right（大顶堆）
     *
     * @param int $left
     * @param int $right
     *
     * @return bool
     */
    protected function compare(int $left, int $right): bool
    {
        return $this->data[$left] > $this->data[$right];
    }
}

