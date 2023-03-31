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
}
