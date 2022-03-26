<?php

declare(strict_types=1);

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
     *
     * @param TreeNode $root
     * @param array    $result
     *
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
     * 中序遍历：指先访问左（右）子树，然后访问根，最后访问右（左）子树的遍历方式
     *
     * @param TreeNode $root
     * @param array    $result
     *
     * @return array
     */
    public function inorderTraverse(TreeNode $root, array &$result = []): array
    {
        $root->left && $this->inorderTraverse($root->left, $result);

        $result[] = $root->value;

        $root->right && $this->inorderTraverse($root->right, $result);

        return $result;
    }

    /**
     * 后序遍历：指先访问子树，然后访问根的遍历方式
     *
     * @param TreeNode $root
     * @param array    $result
     *
     * @return array
     */
    public function postorderTraverse(TreeNode $root, array &$result = []): array
    {
        $root->left && $this->postorderTraverse($root->left, $result);
        $root->right && $this->postorderTraverse($root->right, $result);
        $result[] = $root->value;

        return $result;
    }

    /**
     * 最大路径和问题
     * 路径被定义为一条从树中任意节点出发，达到任意节点的序列
     * 该路径至少包含一个节点，且不一定经过根节点
     *
     * 分别计算左子树和右子树的最大路径和，取大值，再加上自己的值
     *
     * @param TreeNode|null $root
     * @param int           $ans
     *
     * @return int|mixed
     */
    public function oneSideMax(?TreeNode $root, int &$ans = 0)
    {
        if (!$root) {
            return 0;
        }

        $left = max(0, $this->oneSideMax($root->left, $ans));
        $right = max(0, $this->oneSideMax($root->right, $ans));

        // 后序遍历：决定是否加上父节点的值
        $ans = max($ans, $left + $right + $root->value);

        return max($left, $right) + $root->value;
    }
}
