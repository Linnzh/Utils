<?php

namespace Linnzh\Utils\Test\Leetcode\SingleNumber;

use Linnzh\Utils\Leetcode\SingleNumber\Solution;
use PHPUnit\Framework\TestCase;

class SolutionTest extends TestCase
{

    public function testSingleNumber(): void
    {
        $this->assertEquals(1, (new Solution())->singleNumber([2, 2, 1]));
        $this->assertEquals(4, (new Solution())->singleNumber([4, 1, 2, 1, 2]));
    }
}
