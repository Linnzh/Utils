<?php

declare(strict_types=1);

namespace Linnzh\Utils\Test\Algorithm;

use Linnzh\Utils\Algorithm\ListNode;
use PHPUnit\Framework\TestCase;

class ListNodeTest extends TestCase
{
    public function testIterateTraverse(): void
    {
        $node1 = new ListNode(1);
        $node2 = new ListNode(3);
        $node3 = new ListNode(5);

        $node2->next = $node3;
        $node1->next = $node2;

        $result = $node1->iterateTraverse($node1);
        $expected = [1, 3, 5];
        $this->assertEquals($expected, $result);
    }

    public function testPreorderTraverse(): void
    {
        $node1 = new ListNode(1);
        $node2 = new ListNode(3);
        $node3 = new ListNode(5);

        $node2->next = $node3;
        $node1->next = $node2;

        $result = $node1->preorderTraverse($node1);
        $expected = [1, 3, 5];
        $this->assertEquals($expected, $result);
    }

    public function testPostorderTraverse(): void
    {
        $node1 = new ListNode(1);
        $node2 = new ListNode(3);
        $node3 = new ListNode(5);

        $node2->next = $node3;
        $node1->next = $node2;

        $result = $node1->postorderTraverse($node1);
        $expected = [5, 3, 1];
        $this->assertEquals($expected, $result);
    }
}
