<?php


namespace Linnzh\Utils\Algorithm;


/**
 * 二叉树节点
 */
class TreeNode
{
    /**
     * @var mixed 节点存储值
     */
    public mixed $value;

    /**
     * @var TreeNode|null 指向左侧子节点的指针
     */
    public ?TreeNode $left;

    /**
     * @var TreeNode|null 指向右侧子节点的指针
     */
    public ?TreeNode $right;

    public function __construct(mixed $value)
    {
        $this->value = $value;
        $this->left = null;
        $this->right = null;
    }
}