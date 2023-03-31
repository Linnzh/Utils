<?php


namespace Linnzh\Utils\Algorithm\SinglyLinkedList;


use Linnzh\Utils\Algorithm\ListNode;

class Find
{
    /**
     * @link https://leetcode.cn/problems/middle-of-the-linked-list/
     *       #876 链表的中间结点
     *
     * @param ListNode $head
     *
     * @return ListNode|null
     */
    public function middleNode(ListNode $head)
    {
        $slow = $head;
        $fast = $head;

        while ($fast && $fast->next) {
            $slow = $slow->next;
            $fast = $fast->next->next;
        }
        return $slow;
    }

    /**
     * 判断链表是否包含环
     *
     * 快慢指针：
     * 每当慢指针 slow 前进一步，快指针 fast 就前进两步。
     * 如果 fast 最终遇到空指针，说明链表中没有环；
     * 如果 fast 最终和 slow 相遇，那肯定是 fast 超过了 slow 一圈，说明链表中含有环。
     *
     * @param ListNode $head
     *
     * @return bool
     */
    public function hasCycle(ListNode $head)
    {
        $slow = $head;
        $fast = $head;

        while ($fast && $fast->next) {
            $slow = $slow->next;
            $fast = $fast->next->next;

            if ($slow === $fast) {
                return true;
            }
        }
        return false;
    }

    /**
     * 寻找链表的环起点
     *
     * @link https://labuladong.github.io/algo/di-ling-zh-bfe1b/shuang-zhi-0f7cc/
     *
     * @param ListNode $head
     *
     * @return ListNode|null
     */
    public function detectCycle(ListNode $head)
    {
        $slow = $head;
        $fast = $head;

        while ($fast && $fast->next) {
            $slow = $slow->next;
            $fast = $fast->next->next;

            if ($slow === $fast) {
                break;
            }
        }

        // fast 遇到空指针说明没有环
        if ($fast == null || $fast->next == null) {
            return null;
        }

        // 重新指向头结点
        $slow = $head;
        // 快慢指针同步前进，相交点就是环起点
        while ($slow != $fast) {
            $fast = $fast->next;
            $slow = $slow->next;
        }
        return $slow;
    }

    /**
     * 获取相交结点
     *
     * @link https://leetcode.cn/problems/intersection-of-two-linked-lists/
     *       #160 相交链表
     *
     * @link https://labuladong.github.io/algo/di-ling-zh-bfe1b/shuang-zhi-0f7cc/
     *
     * 关键是，通过某些方式，让 p1 和 p2 能够同时到达相交节点 c1
     * 可以让 p1 遍历完链表 A 之后开始遍历链表 B，让 p2 遍历完链表 B 之后开始遍历链表 A，
     * 这样相当于「逻辑上」两条链表接在了一起
     * 如果这样进行拼接，就可以让 p1 和 p2 同时进入公共部分，也就是同时到达相交节点 c1
     *
     * @param ListNode $head1
     * @param ListNode $head2
     *
     * @return ListNode|null
     */
    public function getIntersectionNode(ListNode $head1, ListNode $head2)
    {
        $p1 = $head1;
        $p2 = $head2;

        while ($p1 !== $p2) {
            if ($p1) {
                $p1 = $p1->next;
            } else {
                $p1 = $head2;
            }
            if ($p2) {
                $p2 = $p2->next;
            } else {
                $p2 = $head1;
            }
        }

        return $p2;
    }
}
