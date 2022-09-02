<?php


namespace Linnzh\Utils\Leetcode\ReverseLinkedList;


use Linnzh\Utils\Algorithm\ListNode;

/**
 * 给你单链表的头节点 head ，请你反转链表，并返回反转后的链表。
 *
 *
 *
 * 示例 1：
 *
 * 输入：head = [1,2,3,4,5]
 * 输出：[5,4,3,2,1]
 *
 * 示例 2：
 *
 * 输入：head = [1,2]
 * 输出：[2,1]
 *
 * 示例 3：
 *
 * 输入：head = []
 * 输出：[]
 *
 *
 * 来源：力扣（LeetCode）
 * 链接：https://leetcode.cn/problems/reverse-linked-list
 * 著作权归领扣网络所有。商业转载请联系官方授权，非商业转载请注明出处。
 */
class Solution
{
    /**
     * @param ListNode $head
     *
     * @return ListNode
     */
    public function reverseList(ListNode $head)
    {
        $ans = null;
        for ($p = $head; $p !== null; $p = $p->next) {
            $ans = new ListNode($p->val, $ans);
        }
        return $ans;
    }
}
