<?php


namespace Linnzh\Utils\Leetcode\BinaryTreePreorderTraversal;


use Linnzh\Utils\Algorithm\TreeNode;

/**
 * 给你二叉树的根节点 root ，返回它节点值的 前序 遍历。
 *
 *
 *
 * 示例 1：
 *
 * 输入：root = [1,null,2,3]
 * 输出：[1,2,3]
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
 * 示例 4：
 *
 * 输入：root = [1,2]
 * 输出：[1,2]
 *
 * 示例 5：
 *
 * 输入：root = [1,null,2]
 * 输出：[1,2]
 *
 *
 *
 * 来源：力扣（LeetCode）
 * 链接：https://leetcode.cn/problems/binary-tree-preorder-traversal
 * 著作权归领扣网络所有。商业转载请联系官方授权，非商业转载请注明出处。
 */
class Solution
{
    /**
     * 递归算法
     *
     * @param TreeNode $root
     * @param array    $result
     *
     * @return int[]
     */
    public function preorderTraversal(TreeNode $root, array &$result = []): array
    {
        $result[] = $root->value;

        $root->left && $this->preorderTraversal($root->left, $result);
        $root->right && $this->preorderTraversal($root->right, $result);

        return $result;
    }
}
