<?php

namespace Linnzh\Utils\Test\Leetcode\ExcelSheetColumnTitle;

use Linnzh\Utils\Leetcode\ExcelSheetColumnTitle\Solution;
use PHPUnit\Framework\TestCase;

class SolutionTest extends TestCase
{

    public function testConvertToTitle()
    {
        $solution = new Solution();
        
        $this->assertEquals('A', $solution->convertToTitle(1));
        $this->assertEquals('AB', $solution->convertToTitle(28));
        $this->assertEquals('ZY', $solution->convertToTitle(701));
        $this->assertEquals('FXSHRXW', $solution->convertToTitle(2147483647));
    }
}
