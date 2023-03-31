<?php


namespace Linnzh\Utils\Algorithm\SinglyLinkedList;


use Linnzh\Utils\Algorithm\ListNode;

class Remove
{
    /**
     * @link https://leetcode.cn/problems/remove-nth-node-from-end-of-list/
     *       #19 删除链表的倒数第 N 个结点
     *
     * @param ListNode|null $head
     * @param Integer       $n
     *
     * @return ListNode
     */
    public function removeNthFromEnd(?ListNode $head, int $n)
    {
        $dummy = new ListNode(-1);

        // find the n index
        $p = $head;

        $i = 0;
        while ($i < $n) {
            $p = $p->next;
            $i++;
        }
        // 此时 P 处于第 n 个位置

        // 现在需要第二个节点 P2 从头开始，两个节点一起走 total-n 步
        // total-n : p1 has arrived final, and p2 will get the target
        $p2 = $head;
        while ($p) {
            $p = $p->next;
            $p2 = $p2->next;
        }

        // now, delete the p2
        $p2->next = $p2->next->next;

        $p2 = $dummy;

        return $dummy->next;
    }
}
