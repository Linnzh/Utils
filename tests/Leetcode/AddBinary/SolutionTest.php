<?php

declare(strict_types=1);

namespace Linnzh\Utils\Test\Leetcode\AddBinary;

use Linnzh\Utils\Leetcode\AddBinary\Solution;
use PHPUnit\Framework\TestCase;

class SolutionTest extends TestCase
{
    public function testAddBinary(): void
    {
        $this->assertEquals('100', (new Solution())->addBinary('11', '1'));
        $this->assertEquals('10101', (new Solution())->addBinary('1010', '1011'));
        $this->assertEquals('11110', (new Solution())->addBinary('1111', '1111'));

        // 对于大数字的处理
        // "10100000100100110110010000010101111011011001101110111111111101000000101111001110001111100001101"
        // "110101001011101110001111100110001010100001101011101010000011011011001011101111001100000011011110011"
        $this->assertEquals(
            '110111101100010011000101110110100000011101000101011001000011011000001100011110011010010011000000000',
            (new Solution())->addBinary(
                '10100000100100110110010000010101111011011001101110111111111101000000101111001110001111100001101',
                '110101001011101110001111100110001010100001101011101010000011011011001011101111001100000011011110011'
            )
        );
    }
}
