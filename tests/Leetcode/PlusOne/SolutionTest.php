<?php

declare(strict_types=1);

namespace Linnzh\Utils\Test\Leetcode\PlusOne;

use Linnzh\Utils\Leetcode\PlusOne\Solution;
use PHPUnit\Framework\TestCase;

class SolutionTest extends TestCase
{
    public function testPlusOne(): void
    {
        $this->assertEquals([1, 2, 4], (new Solution())->plusOne([1, 2, 3]));
        $this->assertEquals([4,3,2,2], (new Solution())->plusOne([4,3,2,1]));
        $this->assertEquals([1], (new Solution())->plusOne([0]));
        $this->assertEquals([1, 0], (new Solution())->plusOne([9]));
        $this->assertEquals([1, 0, 0], (new Solution())->plusOne([9, 9]));
        $this->assertEquals([1, 0, 0, 0], (new Solution())->plusOne([9, 9, 9]));
        $this->assertEquals(
            [7,2,8,5,0,9,1,2,9,5,3,6,6,7,3,2,8,4,3,7,9,5,7,7,4,7,4,9,4,7,0,1,1,1,7,4,0,0,7],
            (new Solution())->plusOne([7,2,8,5,0,9,1,2,9,5,3,6,6,7,3,2,8,4,3,7,9,5,7,7,4,7,4,9,4,7,0,1,1,1,7,4,0,0,6])
        );
    }
}
