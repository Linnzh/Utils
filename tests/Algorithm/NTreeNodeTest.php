<?php

declare(strict_types=1);

namespace Linnzh\Utils\Test\Algorithm;

use Linnzh\Utils\Algorithm\NTreeNode;
use PHPUnit\Framework\TestCase;

class NTreeNodeTest extends TestCase
{
    public function testTraverse(): void
    {
        $node1 = new NTreeNode(1);
        $node2 = new NTreeNode(2);
        $node3 = new NTreeNode(3);
        $node4 = new NTreeNode(4);
        $node5 = new NTreeNode(5);
        $node6 = new NTreeNode(6);

        $node2->children[] = $node3;
        $node2->children[] = $node4;
        $node2->children[] = $node6;
        $node1->children[] = $node2;
        $node1->children[] = $node5;

        $result = $node1->traverse($node1);
        $expected = [1, 2, 3, 4, 6, 5];
        $this->assertEquals($expected, $result);
    }

    public function testPreorderTraverse(): void
    {
        $node1 = new NTreeNode(1);
        $node2 = new NTreeNode(2);
        $node3 = new NTreeNode(3);
        $node4 = new NTreeNode(4);
        $node5 = new NTreeNode(5);
        $node6 = new NTreeNode(6);

        $node2->children[] = $node3;
        $node2->children[] = $node4;
        $node2->children[] = $node6;
        $node1->children[] = $node2;
        $node1->children[] = $node5;

        $result = $node1->preorderTraverse($node1);
        $expected = [1, 2, 3, 4, 6, 5];
        $this->assertEquals($expected, $result);
    }

    public function testPostorderTraverse(): void
    {
        $node1 = new NTreeNode(1);
        $node2 = new NTreeNode(2);
        $node3 = new NTreeNode(3);
        $node4 = new NTreeNode(4);
        $node5 = new NTreeNode(5);
        $node6 = new NTreeNode(6);

        $node2->children[] = $node3;
        $node2->children[] = $node4;
        $node2->children[] = $node6;
        $node1->children[] = $node2;
        $node1->children[] = $node5;

        $result = $node1->postorderTraverse($node1);
        $expected = [3, 4, 6, 2, 5, 1];
        $this->assertEquals($expected, $result, "\n实际值：" . implode(' ', $result) . "\n");
    }
}
