<?php

declare(strict_types=1);

namespace Linnzh\Utils\Test\Leetcode\RomanToInteger;

use Linnzh\Utils\Leetcode\RomanToInteger\Solution;
use PHPUnit\Framework\TestCase;

class SolutionTest extends TestCase
{
    public function testRomanToInt(): void
    {
        $this->assertEquals(3, (new Solution())->romanToInt('III'));
        $this->assertEquals(4, (new Solution())->romanToInt('IV'));
        $this->assertEquals(9, (new Solution())->romanToInt('IX'));
        $this->assertEquals(58, (new Solution())->romanToInt('LVIII'));
        $this->assertEquals(1994, (new Solution())->romanToInt('MCMXCIV'));
    }

    public function testRomanToIntPro(): void
    {
        $this->assertEquals(3, (new Solution())->romanToIntPro('III'));
        $this->assertEquals(4, (new Solution())->romanToIntPro('IV'));
        $this->assertEquals(9, (new Solution())->romanToIntPro('IX'));
        $this->assertEquals(58, (new Solution())->romanToIntPro('LVIII'));
        $this->assertEquals(1994, (new Solution())->romanToIntPro('MCMXCIV'));
    }
}
