<?php

declare(strict_types=1);

namespace Linnzh\Utils\Algorithm;

/**
 * 链表 - LinkedList
 *
 * 链表是一种动态数据结构，它由一系列节点组成，每个节点包含数据和指向下一个节点的指针。
 * 链表可以用于动态地添加或删除元素，但访问元素的速度较慢。
 */
class ListNode
{
    /**
     * @var mixed 节点存储值
     */
    public mixed $val;

    /**
     * @var ListNode|null 指向下一节点的指针
     */
    public ?ListNode $next;

    public function __construct(mixed $value, ListNode $next = null)
    {
        $this->val = $value;
        $this->next = $next;
    }

    /**
     * 迭代遍历 p.value
     *
     * @param ListNode $head
     *
     * @return array
     */
    public function iterateTraverse(ListNode $head): array
    {
        $result = [];

        for ($p = $head; $p !== null; $p = $p->next) {
            $result[] = $p->val;
        }

        return $result;
    }

    /**
     * 前序遍历：指先访问根，然后访问子树的遍历方式
     *
     * @param ListNode $head
     * @param array    $result
     *
     * @return array
     */
    public function preorderTraverse(ListNode $head, array &$result = []): array
    {
        $result[] = $head->val;
        $head->next && $this->preorderTraverse($head->next, $result);

        return $result;
    }

    /**
     * 后序遍历：指先访问子树，然后访问根的遍历方式
     *
     * @param ListNode $head
     * @param array    $result
     *
     * @return array
     */
    public function postorderTraverse(ListNode $head, array &$result = []): array
    {
        $head->next && $this->postorderTraverse($head->next, $result);
        $result[] = $head->val;

        return $result;
    }
}
