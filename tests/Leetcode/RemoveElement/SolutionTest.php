<?php

declare(strict_types=1);

namespace Linnzh\Utils\Test\Leetcode\RemoveElement;

use Linnzh\Utils\Leetcode\RemoveElement\Solution;
use PHPUnit\Framework\TestCase;

class SolutionTest extends TestCase
{
    public function testRemoveElement(): void
    {
        $nums = [3, 2, 2, 3];
        $count = (new Solution())->removeElement($nums, 3);
        $this->assertEquals([2, 2], array_values($nums));
        $this->assertEquals(2, $count);
    }
}
