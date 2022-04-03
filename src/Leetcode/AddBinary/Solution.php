<?php


namespace Linnzh\Utils\Leetcode\AddBinary;


/**
 * 给你两个二进制字符串，返回它们的和（用二进制表示）。
 * 输入为 非空 字符串且只包含数字 1 和 0。
 *
 * 示例 1:
 *
 * 输入: a = "11", b = "1"
 * 输出: "100"
 *
 * 示例 2:
 *
 * 输入: a = "1010", b = "1011"
 * 输出: "10101"
 *
 * 来源：力扣（LeetCode）
 * 链接：https://leetcode-cn.com/problems/add-binary
 * 著作权归领扣网络所有。商业转载请联系官方授权，非商业转载请注明出处。
 */
class Solution
{
    /**
     * @param String $a
     * @param String $b
     * @return String
     */
    public function addBinary(string $a, string $b): string
    {
        // return decbin((int)bindec($a) + (int)bindec($b));

        $countA = strlen($a);
        $countB = strlen($b);
        $length = max($countA, $countB);
        $a = str_pad($a, $length, '0', STR_PAD_LEFT);
        $b = str_pad($b, $length, '0', STR_PAD_LEFT);

        $arrA = str_split($a);
        $arrB = str_split($b);

        $result = '';

        for ($i = $length - 1; $i >= 0; $i--) {
            $sum = $arrA[$i] + $arrB[$i];

            $calc = match ($sum) {
                0, 2 => 0,
                1, 3 => 1
            };

            $result .= $calc;

            if ($sum > 1) {
                if ($i === 0) {
                    $result .= 1;
                } else {
                    ++$arrA[$i - 1];
                }
            }
        }
        
        return strrev($result);
    }
}
