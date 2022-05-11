<?php

declare(strict_types=1);

namespace Linnzh\Utils\Test\Leetcode\RemoveDuplicatesFromSortedArray;

use Linnzh\Utils\Leetcode\RemoveDuplicatesFromSortedArray\Solution;
use PHPUnit\Framework\TestCase;

class SolutionTest extends TestCase
{
    public function testExample(): void
    {
        $nums = [1, 1, 2];
        $count = (new Solution())->removeDuplicates($nums);
        $this->assertEquals([1, 2], $nums);
        $this->assertEquals(2, $count);
    }
}
