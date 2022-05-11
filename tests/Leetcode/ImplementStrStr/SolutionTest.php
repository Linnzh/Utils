<?php

declare(strict_types=1);

namespace Linnzh\Utils\Test\Leetcode\ImplementStrStr;

use Linnzh\Utils\Leetcode\ImplementStrStr\Solution;
use PHPUnit\Framework\TestCase;

class SolutionTest extends TestCase
{
    public function testStrStr(): void
    {
        $this->assertEquals(0, (new Solution())->strStr('a', 'a'));
        $this->assertEquals(0, (new Solution())->strStr('a', ''));
        $this->assertEquals(-1, (new Solution())->strStr('abc', 'd'));
        $this->assertEquals(1, (new Solution())->strStr('abc', 'b'));
    }
}
