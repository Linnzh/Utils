<?php

namespace Linnzh\Utils\Test\Algorithm\SinglyLinkedList;

use Linnzh\Utils\Algorithm\ListNode;
use Linnzh\Utils\Algorithm\SinglyLinkedList\Merge;
use PHPUnit\Framework\TestCase;

class MergeTest extends TestCase
{
    public function testMergeKSortedLists()
    {
        $list1 = new ListNode(1, new ListNode(4, new ListNode(5)));
        $list2 = new ListNode(1, new ListNode(3, new ListNode(4)));
        $list3 = new ListNode(2, new ListNode(6));
        $lists = [$list1, $list2, $list3];

        $mergedList = (new Merge())->mergeKSortedLists($lists);

        $expectedList = new ListNode(1, new ListNode(1, new ListNode(2, new ListNode(3, new ListNode(4, new ListNode(4, new ListNode(5, new ListNode(6))))))));

        $this->assertEquals($expectedList, $mergedList);
    }
}
