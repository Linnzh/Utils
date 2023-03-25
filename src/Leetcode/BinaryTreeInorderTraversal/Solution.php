<?php

declare(strict_types=1);

namespace Linnzh\Utils\Leetcode\BinaryTreeInorderTraversal;

use Linnzh\Utils\Algorithm\TreeNode;

/**
 * 给定一个二叉树的根节点 root ，返回 它的 中序 遍历 。
 *
 * 示例 1：
 *
 * 输入：root = [1,null,2,3]
 * 输出：[1,3,2]
 *
 * 示例 2：
 *
 * 输入：root = []
 * 输出：[]
 *
 * 示例 3：
 *
 * 输入：root = [1]
 * 输出：[1]
 *
 * 来源：力扣（LeetCode）
 * 链接：https://leetcode-cn.com/problems/binary-tree-inorder-traversal
 * 著作权归领扣网络所有。商业转载请联系官方授权，非商业转载请注明出处。
 */
class Solution
{
    /**
     * 递归算法
     *
     * @TODO 迭代算法
     *
     * @param TreeNode $root
     * @param array    $result
     *
     * @return int[]
     */
    public function inorderTraversal(TreeNode $root, array &$result = []): array
    {
        $root->left && $this->inorderTraversal($root->left, $result);

        $result[] = $root->val;

        $root->right && $this->inorderTraversal($root->right, $result);

        return $result;
    }
}
