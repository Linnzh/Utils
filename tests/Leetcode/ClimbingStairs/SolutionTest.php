<?php

declare(strict_types=1);

namespace Linnzh\Utils\Test\Leetcode\ClimbingStairs;

use Linnzh\Utils\Leetcode\ClimbingStairs\Solution;
use PHPUnit\Framework\TestCase;

class SolutionTest extends TestCase
{
    public function testClimbStairs(): void
    {
        $this->assertEquals(1, (new Solution())->climbStairs(1));
        $this->assertEquals(2, (new Solution())->climbStairs(2));
        $this->assertEquals(3, (new Solution())->climbStairs(3));
        $this->assertEquals(5, (new Solution())->climbStairs(4));
        $this->assertEquals(8, (new Solution())->climbStairs(5));
    }
}
