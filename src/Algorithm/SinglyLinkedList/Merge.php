<?php


namespace Linnzh\Utils\Algorithm\SinglyLinkedList;


use Linnzh\Utils\Algorithm\ListNode;

class Merge
{
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
