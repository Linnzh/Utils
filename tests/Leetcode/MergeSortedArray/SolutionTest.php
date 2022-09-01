<?php

declare(strict_types=1);

namespace Linnzh\Utils\Test\Leetcode\MergeSortedArray;

use Linnzh\Utils\Leetcode\MergeSortedArray\Solution;
use PHPUnit\Framework\TestCase;

class SolutionTest extends TestCase
{
    public function testMerge(): void
    {
        $nums1 = [1, 2, 3, 0, 0, 0];
        (new Solution())->merge($nums1, 3, [2, 5, 6], 3);
        $this->assertEquals([1, 2, 2, 3, 5, 6], $nums1);
    }
}
