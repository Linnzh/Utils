<?php

declare(strict_types=1);

namespace Linnzh\Utils\Test\Leetcode\LengthOfLastWord;

use Linnzh\Utils\Leetcode\LengthOfLastWord\Solution;
use PHPUnit\Framework\TestCase;

class SolutionTest extends TestCase
{
    public function testLengthOfLastWord(): void
    {
        $this->assertEquals(1, (new Solution())->lengthOfLastWord('a'));
        $this->assertEquals(5, (new Solution())->lengthOfLastWord('Hello World'));
        $this->assertEquals(4, (new Solution())->lengthOfLastWord('   fly me   to   the moon  '));
        $this->assertEquals(6, (new Solution())->lengthOfLastWord('luffy is still joyboy'));
    }
}
