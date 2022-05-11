<?php

declare(strict_types=1);

namespace Linnzh\Utils\Test\Leetcode\BinaryTreeInorderTraversal;

use Linnzh\Utils\Algorithm\TreeNode;
use Linnzh\Utils\Leetcode\BinaryTreeInorderTraversal\Solution;
use PHPUnit\Framework\TestCase;

class SolutionTest extends TestCase
{
    public function testInorderTraversal(): void
    {
        $node1 = new TreeNode(1);
        $node2 = new TreeNode(2);
        $node3 = new TreeNode(3);
        $node2->left = $node3;
        $node1->left = null;
        $node1->right = $node2;
        $this->assertEquals([1,3,2], (new Solution())->inorderTraversal($node1));
    }
}
