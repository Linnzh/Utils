<?php


namespace Linnzh\Utils\Leetcode\BinaryTreePostorderTraversal;


use Linnzh\Utils\Algorithm\TreeNode;

/**
 * 给你一棵二叉树的根节点 root ，返回其节点值的 后序遍历 。
 *
 *
 *
 * 示例 1：
 *
 * 输入：root = [1,null,2,3]
 * 输出：[3,2,1]
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
 * 链接：https://leetcode.cn/problems/binary-tree-postorder-traversal
 * 著作权归领扣网络所有。商业转载请联系官方授权，非商业转载请注明出处。
 */
class Solution
{
    /**
     * @param TreeNode $root
     * @param array    $result
     *
     * @return Integer[]
     */
    public function postorderTraversal(TreeNode $root, array &$result = [])
    {

        $root->left && $this->postorderTraversal($root->left, $result);
        $root->right && $this->postorderTraversal($root->right, $result);
        $result[] = $root->value;

        return $result;
    }
}
