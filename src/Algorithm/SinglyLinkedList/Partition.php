<?php


namespace Linnzh\Utils\Algorithm\SinglyLinkedList;


use Linnzh\Utils\Algorithm\ListNode;

class Partition
{
    /**
     * Partition List
     *
     * 双指针技巧——拉拉链
     *
     * @link https://leetcode.cn/problems/partition-list/
     * @link https://labuladong.github.io/algo/di-ling-zh-bfe1b/shuang-zhi-0f7cc/
     *
     * @param ListNode|null $listNode
     * @param mixed         $x
     *
     * @return ListNode|null
     */
    public function partition(?ListNode $listNode, mixed $x)
    {
        /* 虚拟链表：所有元素均小于 x */
        $dummy1 = new ListNode(-1);
        /* 虚拟链表：所有元素均大于等于 x */
        $dummy2 = new ListNode(-1);

        [$p1, $p2] = [$dummy1, $dummy2];

        /* p 负责遍历原链表 */
        $p = $listNode;
        while ($p != null) {
            if ($p->val >= $x) {
                $p2->next = $p;
                $p2 = $p2->next;
            } else {
                $p1->next = $p;
                $p1 = $p1->next;
            }
            /* 断开原链表中的每个节点的 next 指针 */
            $tmp = $p->next;
            $p->next = null;
            $p = $tmp;
        }
        /* 连接两个链表 */
        $p1->next = $dummy2->next;

        /* 返回 小于x的链表 + 大于等于x的链表 */
        return $dummy1->next;
    }
}
