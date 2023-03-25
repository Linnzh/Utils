<?php


namespace Linnzh\Utils\Algorithm\SinglyLinkedList;


use Linnzh\Utils\Algorithm\Heap\MinHeap;
use Linnzh\Utils\Algorithm\ListNode;

class Merge
{
    /**
     * 难点：如何快速得到 k 个节点中的最小节点，接到结果链表上？
     * 思路：
     * 使用 优先级队列（二叉堆/最小堆） 这种数据结构，把链表节点放入一个最小堆，
     * 就可以每次获得 k 个节点中的最小节点
     *
     * @link https://leetcode.cn/problems/merge-k-sorted-lists/
     *       假设每个链表都已经按升序排列
     *
     * @link https://labuladong.github.io/algo/di-ling-zh-bfe1b/shuang-zhi-0f7cc/
     * @link https://labuladong.github.io/algo/di-yi-zhan-da78c/shou-ba-sh-daeca/er-cha-dui-1a386/
     *
     * @param ListNode[] $listNodes
     */
    public function mergeKSortedLists(array $listNodes)
    {
        $minHeap = new MinHeap();

        // 将每个链表的头结点加入小根堆
        foreach ($listNodes as $node) {
            if ($node) {
                $minHeap->push($node);
            }
        }

        $dummyHead = new ListNode(-1);
        $curr = $dummyHead;

        // 依次取出最小的结点，并将其后继加入小根堆
        while (!$minHeap->isEmpty()) {
            $node = $minHeap->pop();
            $curr->next = $node;
            $curr = $curr->next;

            if ($node->next) {
                $minHeap->push($node->next);
            }
        }

        return $dummyHead->next;
    }


    /**
     * Merge Two Sorted Lists
     *
     * 双指针技巧——拉拉链
     *
     * @link https://leetcode.cn/problems/merge-two-sorted-lists/
     * @link https://labuladong.github.io/algo/di-ling-zh-bfe1b/shuang-zhi-0f7cc/
     *
     * @param ListNode|null $listNode1
     * @param ListNode|null $listNode2
     *
     * @return ListNode|null
     */
    public function mergeTwoSortedLists(?ListNode $listNode1, ?ListNode $listNode2)
    {
        $dummy = new ListNode(-1);

        $p = $dummy;

        [$p1, $p2] = [$listNode1, $listNode2];

        while ($p1 && $p2) {
            if ($p1->val > $p2->val) {
                $p->next = $p2;
                $p2 = $p2->next;
            } else {
                $p->next = $p1;
                $p1 = $p1->next;
            }
            $p = $p->next;
        }

        if ($p1) {
            $p->next = $p1;
        }
        if ($p2) {
            $p->next = $p2;
        }

        return $dummy->next;
    }
}
