<?php

declare(strict_types=1);

namespace Linnzh\Utils\Algorithm;

/**
 * 单链表节点
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

    public function __construct(mixed $value)
    {
        $this->val = $value;
        $this->next = null;
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
