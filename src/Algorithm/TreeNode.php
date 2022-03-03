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

    public function traverse(TreeNode $root, array &$result = []): array
    {
        // 前序遍历
        $result[] = $root->value;
        $root->left && $this->traverse($root->left, $result);

        // 中序遍历

        $root->right && $this->traverse($root->right, $result);
        // 后序遍历
        return $result;
    }

    /**
     * 前序遍历：指先访问根，然后访问子树的遍历方式
     * @param TreeNode $root
     * @param array $result
     * @return array
     */
    public function preorderTraverse(TreeNode $root, array &$result = []): array
    {
        $result[] = $root->value;
        $root->left && $this->preorderTraverse($root->left, $result);
        $root->right && $this->preorderTraverse($root->right, $result);
        return $result;
    }

    /**
     * 后序遍历：指先访问子树，然后访问根的遍历方式
     * @param TreeNode $root
     * @param array $result
     * @return array
     */
    public function postorderTraverse(TreeNode $root, array &$result = []): array
    {
        $root->left && $this->postorderTraverse($root->left, $result);
        $root->right && $this->postorderTraverse($root->right, $result);
        $result[] = $root->value;
        return $result;
    }
}