<?php

namespace Linnzh\Utils\Test\Leetcode\BinaryTreePostorderTraversal;

use Linnzh\Utils\Algorithm\TreeNode;
use Linnzh\Utils\Leetcode\BinaryTreePostorderTraversal\Solution;
use PHPUnit\Framework\TestCase;

class SolutionTest extends TestCase
{

    public function testPostorderTraversal()
    {
        $node1 = new TreeNode(1);
        $node2 = new TreeNode(2);
        $node3 = new TreeNode(3);
        $node2->left = $node3;
        $node1->left = null;
        $node1->right = $node2;
        $this->assertEquals([3, 2, 1], (new Solution())->postorderTraversal($node1));
    }
}
