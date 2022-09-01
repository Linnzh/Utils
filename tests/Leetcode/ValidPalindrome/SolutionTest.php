<?php

namespace Linnzh\Utils\Test\Leetcode\ValidPalindrome;

use Linnzh\Utils\Leetcode\ValidPalindrome\Solution;
use PHPUnit\Framework\TestCase;

class SolutionTest extends TestCase
{
    public function testIsPalindrome()
    {
        $solution = new Solution();

        $s = 'A man, a plan, a canal: Panama';
        $result = $solution->isPalindrome($s);
        $this->assertTrue($result);

        $s = 'race a car';
        $result = $solution->isPalindrome($s);
        $this->assertFalse($result);

        $s = ' ';
        $result = $solution->isPalindrome($s);
        $this->assertTrue($result);

        $s = 'ab_a';
        $result = $solution->isPalindrome($s);
        $this->assertTrue($result);

        $s = '0P';
        $result = $solution->isPalindrome($s);
        $this->assertFalse($result);
    }
}
