<?php

declare(strict_types=1);

namespace Linnzh\Utils\Test\Leetcode\FindAllNumbersDisappearedInAnArray;

use Linnzh\Utils\Leetcode\FindAllNumbersDisappearedInAnArray\Solution;
use PHPUnit\Framework\TestCase;

class SolutionTest extends TestCase
{
    public function testFindDisappearedNumbers(): void
    {
        $this->assertEquals([5,6], (new Solution())->findDisappearedNumbers([4,3,2,7,8,2,3,1]));
        $this->assertEquals([2], (new Solution())->findDisappearedNumbers([1,1]));
    }
}
