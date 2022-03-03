<?php

namespace Linnzh\Utils\Test\Algorithm;

use Linnzh\Utils\Algorithm\TreeNode;
use PHPUnit\Framework\TestCase;

class TreeNodeTest extends TestCase
{

    public function testTraverse(): void
    {
        $node1 = new TreeNode(1);
        $node2 = new TreeNode(2);
        $node3 = new TreeNode(3);
        $node4 = new TreeNode(4);
        $node5 = new TreeNode(5);

        $node2->left = $node3;
        $node2->right = $node4;
        $node1->left = $node2;
        $node1->right = $node5;

        $result = $node1->traverse($node1);
        $expected = [1, 2, 3, 4, 5];
        $this->assertEquals($expected, $result);


        $node1 = new TreeNode('A');
        $node2 = new TreeNode('B');
        $node3 = new TreeNode('C');
        $node4 = new TreeNode('D');
        $node5 = new TreeNode('E');
        $node6 = new TreeNode('F');

        $node2->left = $node4;
        $node2->right = $node5;
        $node3->left = $node6;
        $node1->left = $node2;
        $node1->right = $node3;

        $result = $node1->traverse($node1);
        $expected = ['A', 'B', 'D', 'E', 'C', 'F'];
        $this->assertEquals($expected, $result);
    }

    public function testPreorderTraverse(): void
    {
        $node1 = new TreeNode(1);
        $node2 = new TreeNode(2);
        $node3 = new TreeNode(3);
        $node4 = new TreeNode(4);
        $node5 = new TreeNode(5);

        $node2->left = $node3;
        $node2->right = $node4;
        $node1->left = $node2;
        $node1->right = $node5;

        $result = $node1->preorderTraverse($node1);
        $expected = [1, 2, 3, 4, 5];
        $this->assertEquals($expected, $result);


        $node1 = new TreeNode('A');
        $node2 = new TreeNode('B');
        $node3 = new TreeNode('C');
        $node4 = new TreeNode('D');
        $node5 = new TreeNode('E');
        $node6 = new TreeNode('F');

        $node2->left = $node4;
        $node2->right = $node5;
        $node3->left = $node6;
        $node1->left = $node2;
        $node1->right = $node3;

        $result = $node1->preorderTraverse($node1);
        $expected = ['A', 'B', 'D', 'E', 'C', 'F'];
        $this->assertEquals($expected, $result);
    }

    public function testPostorderTraverse(): void
    {
        $node1 = new TreeNode(1);
        $node2 = new TreeNode(2);
        $node3 = new TreeNode(3);
        $node4 = new TreeNode(4);
        $node5 = new TreeNode(5);

        $node2->left = $node3;
        $node2->right = $node4;
        $node1->left = $node2;
        $node1->right = $node5;

        $result = $node1->postorderTraverse($node1);
        $expected = [3, 4, 2, 5, 1];
        $this->assertEquals($expected, $result);


        $node1 = new TreeNode('A');
        $node2 = new TreeNode('B');
        $node3 = new TreeNode('C');
        $node4 = new TreeNode('D');
        $node5 = new TreeNode('E');
        $node6 = new TreeNode('F');

        $node2->left = $node4;
        $node2->right = $node5;
        $node3->left = $node6;
        $node1->left = $node2;
        $node1->right = $node3;

        $result = $node1->postorderTraverse($node1);
        $expected = ['D', 'E', 'B', 'F', 'C', 'A'];
        $this->assertEquals($expected, $result);
    }
}
