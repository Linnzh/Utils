<?php


namespace Linnzh\Utils\Algorithm;


/**
 * 单链表节点
 */
class ListNode
{
    /**
     * @var mixed 节点存储值
     */
    public mixed $value;

    /**
     * @var ListNode|null 指向下一节点的指针
     */
    public ?ListNode $next;

    public function __construct(mixed $value)
    {
        $this->value = $value;
        $this->next = null;
    }

    /**
     * 迭代遍历 p.value
     *
     * @param ListNode $head
     * @return array
     */
    public function iterateTraverse(ListNode $head): array
    {
        $result = [];
        for ($p = $head; $p !== null; $p = $p->next) {
            $result[] = $p->value;
        }
        return $result;
    }

    /**
     * 前序遍历
     * @param ListNode $head
     * @param array $result
     * @return array
     */
    public function preorderTraverse(ListNode $head, array &$result = []): array
    {
        $result[] = $head->value;
        $head->next && $this->preorderTraverse($head->next, $result);
        return $result;
    }

    /**
     * 后序遍历
     * @param ListNode $head
     * @param array $result
     * @return array
     */
    public function postorderTraverse(ListNode $head, array &$result = []): array
    {
        $head->next && $this->postorderTraverse($head->next, $result);
        $result[] = $head->value;
        return $result;
    }
}