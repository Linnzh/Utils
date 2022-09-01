<?php


namespace Linnzh\Utils\Leetcode\ValidPalindrome;


/**
 * 验证回文串
 *
 * 如果在将所有大写字符转换为小写字符、并移除所有非字母数字字符之后，短语正着读和反着读都一样。则可以认为该短语是一个回文串。
 *
 * 字母和数字都属于字母数字字符。
 *
 * 给你一个字符串 s，如果它是回文串，返回 true ；否则，返回 false 。
 *
 *
 *
 * 来源：力扣（LeetCode）
 * 链接：https://leetcode.cn/problems/valid-palindrome
 * 著作权归领扣网络所有。商业转载请联系官方授权，非商业转载请注明出处。
 */
class Solution
{
    /**
     * @param String $s
     *
     * @return Boolean
     */
    public function isPalindrome(string $s)
    {
        return $this->buildin($s);
    }

    public function buildin(string $s)
    {
        $s = preg_replace('/[^a-zA-Z0-9]/', '', $s);
        $s = strtolower($s);

        return $s == strrev($s);
    }

    public function loop(string $s)
    {
        $s = preg_replace('/[^a-zA-Z0-9]/', '', $s);
        $s = strtolower($s);

        $arr = str_split($s);
        $length = count($arr);
        for ($i = 0; $i < ceil($length / 2); $i++) {
            if ($arr[$i] != $arr[$length - $i - 1]) {
                return false;
            }
        }
        return true;
    }
}
