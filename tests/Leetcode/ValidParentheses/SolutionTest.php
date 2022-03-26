<?php

declare(strict_types=1);

namespace Linnzh\Utils\Test\Leetcode\ValidParentheses;

use Linnzh\Utils\Leetcode\ValidParentheses\Solution;
use PHPUnit\Framework\TestCase;

class SolutionTest extends TestCase
{
    public function testIsValid(): void
    {
        $this->assertEquals(
            true,
            (new Solution())->isValid('()')
        );

        $this->assertEquals(
            false,
            (new Solution())->isValid('){')
        );

        $this->assertEquals(
            true,
            (new Solution())->isValid('()[]{}')
        );

        $this->assertEquals(
            false,
            (new Solution())->isValid('([)]')
        );

        $this->assertEquals(
            false,
            (new Solution())->isValid('()([)]')
        );

        $this->assertEquals(
            true,
            (new Solution())->isValid('{[]}')
        );

        $this->assertEquals(
            true,
            (new Solution())->isValid('(([]){})')
        );

        $this->assertEquals(
            false,
            (new Solution())->isValid('[({])}')
        );

//        $this->assertEquals(
//            true,
//            (new Solution())->isValid('[({])}')
//        );
    }
}
