<?php

namespace Linnzh\Utils\Test\Leetcode\PalindromeNumber;

use Linnzh\Utils\Leetcode\PalindromeNumber\Solution;
use PHPUnit\Framework\TestCase;

class SolutionTest extends TestCase
{

    public function testIsPalindrome(): void
    {
        $this->assertEquals(true, (new Solution())->isPalindrome(121));
        $this->assertEquals(true, (new Solution())->isPalindrome(0));
        $this->assertEquals(false, (new Solution())->isPalindrome(10));
        $this->assertEquals(false, (new Solution())->isPalindrome(-121));
    }
}
