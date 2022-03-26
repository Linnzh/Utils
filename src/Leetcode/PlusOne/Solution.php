<?php

declare(strict_types=1);

namespace Linnzh\Utils\Leetcode\PlusOne;

/**
 * 给定一个由 整数 组成的 非空 数组所表示的非负整数，在该数的基础上加一。
 *
 * 最高位数字存放在数组的首位， 数组中每个元素只存储单个数字。
 *
 * 你可以假设除了整数 0 之外，这个整数不会以零开头。
 *
 * 来源：力扣（LeetCode）
 * 链接：https://leetcode-cn.com/problems/plus-one
 * 著作权归领扣网络所有。商业转载请联系官方授权，非商业转载请注明出处。
 *
 * 难点：大数字计算时会转科学计数法
 */
class Solution
{
    /**
     * @param int[] $digits
     *
     * @return int[]
     */
    public function plusOne(array $digits): array
    {
        $count = count($digits);
        $i = $count - 1;

        while ($i >= 0) {
            $digits[$i]++;
            $digits[$i] %= 10;

            if ($digits[$i] !== 0) {
                return $digits;
            }
            $i--;
        }

        // 全是 9 的情况
        $digits = array_fill(0, $count, 0);
        array_unshift($digits, 1);

        return $digits;
    }

    /**
     * @notice 略复杂的计算逻辑
     *
     * @param int[] $digits
     *
     * @return int[]
     */
    public function plusOne2(array $digits): array
    {
        $count = count($digits);
        $i = $count - 1;

        while ($i >= 0) {
            $current = $digits[$i] + 1;

            $isAddOne = $current >= 10;
            $addSingle = $isAddOne ? $current - 10 : $current;

            $digits[$i] = $addSingle;

            if (!$isAddOne) {
                break;
            }

            if ($i === 0) {
                array_unshift($digits, 1);
            }
            $i--;
        }

        return $digits;
    }

    /**
     * @error 数字精度问题
     *
     * @param int[] $digits
     *
     * @return int[]
     */
    public function plusOneSimple(array $digits): array
    {
        $digit = (int) implode('', $digits);
        $digit = number_format($digit, 0, '', '');
        $result = number_format((int) $digit + 1, 0, '', '');

        return str_split($result);
    }
}
