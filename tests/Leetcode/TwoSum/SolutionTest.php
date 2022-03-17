<?php

namespace Linnzh\Utils\Test\Leetcode\TwoSum;

use Linnzh\Utils\Leetcode\TwoSum\Solution;
use PHPUnit\Framework\TestCase;

class SolutionTest extends TestCase
{

    public function testTwoSum(): void
    {
        $nums = [3, 2, 4];
        $target = 6;
        $result = (new Solution())->twoSum($nums, $target);
        sort($result);
        $this->assertEquals([1, 2], $result);
    }
}
