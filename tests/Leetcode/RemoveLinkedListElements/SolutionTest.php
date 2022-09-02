<?php

namespace Linnzh\Utils\Test\Leetcode\RemoveLinkedListElements;

use Linnzh\Utils\Algorithm\ListNode;
use Linnzh\Utils\Leetcode\RemoveLinkedListElements\Solution;
use PHPUnit\Framework\TestCase;

class SolutionTest extends TestCase
{
    public function testRemoveElements()
    {
        $node = new ListNode(1);
        $next = $node->next = new ListNode(2);
        $next = $next->next = new ListNode(6);
        $next = $next->next = new ListNode(3);
        $next = $next->next = new ListNode(4);
        $next = $next->next = new ListNode(5);
        $next = $next->next = new ListNode(6);

        $ans = (new Solution())->removeElements($node, 6);
        $result = $node->iterateTraverse($ans);
        $this->assertEquals([1,2,3,4,5], $result);
    }
}
