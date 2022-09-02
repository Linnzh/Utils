<?php

namespace Linnzh\Utils\Test\Leetcode\IsomorphicStrings;

use Linnzh\Utils\Leetcode\IsomorphicStrings\Solution;
use PHPUnit\Framework\TestCase;

class SolutionTest extends TestCase
{

    public function testIsIsomorphic()
    {
        $solution = new Solution();
        
        $this->assertEquals(true, $solution->isIsomorphic('egg', 'add'));
        $this->assertEquals(false, $solution->isIsomorphic('foo', 'bar'));
        $this->assertEquals(true, $solution->isIsomorphic('paper', 'title'));
        $this->assertEquals(false, $solution->isIsomorphic('badc', 'baba'));
    }
}
