<?php

namespace Linnzh\Utils\Test\Leetcode\MoveZeroes;

use Linnzh\Utils\Leetcode\MoveZeroes\Solution;
use PHPUnit\Framework\TestCase;

class SolutionTest extends TestCase
{

    public function testMoveZeroes(): void
    {
        $nums = [0,1,0,3,12];
        (new Solution())->moveZeroes($nums);
        $this->assertEquals([1,3,12,0,0], $nums);

        $nums = [0];
        (new Solution())->moveZeroes($nums);
        $this->assertEquals([0], $nums);
    }
}
