<?php

namespace Linnzh\Utils\Test\Leetcode\SearchInsertPosition;

use Linnzh\Utils\Leetcode\SearchInsertPosition\Solution;
use PHPUnit\Framework\TestCase;

class SolutionTest extends TestCase
{

    public function testSearchInsert(): void
    {
        $this->assertEquals(0, (new Solution())->searchInsert([1, 2, 3], -1));
        $this->assertEquals(0, (new Solution())->searchInsert([1, 2, 3], 1));
        $this->assertEquals(1, (new Solution())->searchInsert([1, 3, 4], 2));
        $this->assertEquals(3, (new Solution())->searchInsert([1, 2, 4], 5));
    }
}
