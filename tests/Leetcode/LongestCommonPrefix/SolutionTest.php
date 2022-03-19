<?php

namespace Linnzh\Utils\Test\Leetcode\LongestCommonPrefix;

use Linnzh\Utils\Leetcode\LongestCommonPrefix\Solution;
use PHPUnit\Framework\TestCase;

class SolutionTest extends TestCase
{

    public function testLongestCommonPrefix(): void
    {
        $this->assertEquals(
            'fl',
            (new Solution())->longestCommonPrefix(["flower","flow","flight"])
        );

        $this->assertEquals(
            '',
            (new Solution())->longestCommonPrefix(["dog","racecar","car"])
        );

        $this->assertEquals(
            'c',
            (new Solution())->longestCommonPrefix(["cir","car"])
        );
    }
}
