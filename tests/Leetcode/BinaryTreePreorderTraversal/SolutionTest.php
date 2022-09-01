<?php

namespace Linnzh\Utils\Test\Leetcode\BinaryTreePreorderTraversal;

use Linnzh\Utils\Algorithm\TreeNode;
use Linnzh\Utils\Leetcode\BinaryTreePreorderTraversal\Solution;
use PHPUnit\Framework\TestCase;

class SolutionTest extends TestCase
{
    public function testInorderTraversal()
    {
        $node1 = new TreeNode(1);
        $node2 = new TreeNode(2);
        $node3 = new TreeNode(3);
        $node2->left = $node3;
        $node1->left = null;
        $node1->right = $node2;
        $this->assertEquals([1,2,3], (new Solution())->preorderTraversal($node1));
    }
}
