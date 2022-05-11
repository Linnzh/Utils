<?php

declare(strict_types=1);

namespace Linnzh\Utils\Test\Leetcode\MajorityElement;

use Linnzh\Utils\Leetcode\MajorityElement\Solution;
use PHPUnit\Framework\TestCase;

class SolutionTest extends TestCase
{
    public function testMajorityElement(): void
    {
        $this->assertEquals(2, (new Solution())->majorityElement([1, 2, 3, 4, 2, 2]));
    }
}
