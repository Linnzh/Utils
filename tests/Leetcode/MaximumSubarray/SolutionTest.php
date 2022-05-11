<?php

declare(strict_types=1);

namespace Linnzh\Utils\Test\Leetcode\MaximumSubarray;

use Linnzh\Utils\Leetcode\MaximumSubarray\Solution;
use PHPUnit\Framework\TestCase;

class SolutionTest extends TestCase
{
    public function testMaxSubArray(): void
    {
        $nums = [-2,1,-3,4,-1,2,1,-5,4];
        $this->assertEquals(6, (new Solution())->maxSubArray($nums));

        $nums = [1];
        $this->assertEquals(1, (new Solution())->maxSubArray($nums));

        $nums = [5,4,-1,7,8];
        $this->assertEquals(23, (new Solution())->maxSubArray($nums));
    }
}
