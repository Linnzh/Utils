<?php

namespace Linnzh\Utils\Test\Leetcode\HappyNumber;

use Linnzh\Utils\Leetcode\HappyNumber\Solution;
use PHPUnit\Framework\TestCase;

class SolutionTest extends TestCase
{

    public function testIsHappy()
    {
        $solution = new Solution();
        
        $this->assertEquals(true,$solution->isHappy(19));
        $this->assertEquals(false,$solution->isHappy(2));
    }
}
