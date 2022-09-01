<?php

namespace Linnzh\Utils\Test\Leetcode\ExcelSheetColumnNumber;

use Linnzh\Utils\Leetcode\ExcelSheetColumnNumber\Solution;
use PHPUnit\Framework\TestCase;

class SolutionTest extends TestCase
{

    public function testTitleToNumber()
    {
        $solution = new Solution();
        
        $this->assertEquals(1, $solution->titleToNumber('A'));
        $this->assertEquals(28, $solution->titleToNumber('AB'));
        $this->assertEquals(701, $solution->titleToNumber('ZY'));
        $this->assertEquals(2147483647, $solution->titleToNumber('FXSHRXW'));
    }
}
