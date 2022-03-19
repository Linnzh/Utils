<?php


namespace Linnzh\Utils\Leetcode\LongestCommonPrefix;


/**
 * 编写一个函数来查找字符串数组中的最长公共前缀。
 *
 * 如果不存在公共前缀，返回空字符串 ""。
 */
class Solution
{
    /**
     * @param String[] $strings
     * @return String
     */
    public function longestCommonPrefix(array $strings): string
    {
        $result = '';

        // 最暴力的方法
        usort($strings, static function ($prev, $current) {
            if (strlen($prev) === strlen($current)) {
                return 0;
            }
            return (strlen($prev) < strlen($current) ? -1 : 1);
        });

        $min = str_split($strings[0]);
        foreach ($min as $key => $item) {

            $isSame = true;
            foreach ($strings as $string) {
                $stringArr = str_split($string);
                if ($item !== $stringArr[$key]) {
                    $isSame = false;
                    break 2;
                }
            }

            $isSame && $result .= $item;
        }

        return $result;
    }
}
