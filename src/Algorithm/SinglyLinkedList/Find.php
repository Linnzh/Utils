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
}
