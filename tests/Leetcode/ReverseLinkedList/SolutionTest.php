<?php

namespace Linnzh\Utils\Test\Leetcode\ReverseLinkedList;

use Linnzh\Utils\Algorithm\ListNode;
use Linnzh\Utils\Leetcode\ReverseLinkedList\Solution;
use PHPUnit\Framework\TestCase;

class SolutionTest extends TestCase
{
    public function testReverseList()
    {
        $node = new ListNode(1);
        $next = $node->next = new ListNode(2);
        $next = $next->next = new ListNode(3);
        $next = $next->next = new ListNode(4);
        $next = $next->next = new ListNode(5);
        $next = $next->next = new ListNode(6);

        $ans = (new Solution())->reverseList($node);
        $result = $node->iterateTraverse($ans);
        $this->assertEquals([6, 5, 4, 3, 2, 1], $result);
    }
}
