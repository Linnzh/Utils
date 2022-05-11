<?php

declare(strict_types=1);

namespace Linnzh\Utils\Test\Leetcode\SqrtxSubmissions;

use Linnzh\Utils\Leetcode\SqrtxSubmissions\Solution;
use PHPUnit\Framework\TestCase;

class SolutionTest extends TestCase
{
    public function testMySqrt(): void
    {
        $this->assertEquals(2, (new Solution())->mySqrt(4));
        $this->assertEquals(2, (new Solution())->mySqrt(8));
        $this->assertEquals(3, (new Solution())->mySqrt(9));
    }
}
