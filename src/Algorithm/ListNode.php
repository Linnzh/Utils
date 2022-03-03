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
     * @var TreeNode|null 指向下一节点的指针
     */
    public ?TreeNode $next;

    public function __construct(mixed $value)
    {
        $this->value = $value;
        $this->next = null;
    }
}