<?php


namespace Linnzh\Utils\Leetcode\LengthOfLastWord;


/**
 * 给你一个字符串 s，由若干单词组成，单词前后用一些空格字符隔开。返回字符串中 最后一个 单词的长度。
 *
 * 单词 是指仅由字母组成、不包含任何空格字符的最大子字符串。
 *
 * 来源：力扣（LeetCode）
 * 链接：https://leetcode-cn.com/problems/length-of-last-word
 * 著作权归领扣网络所有。商业转载请联系官方授权，非商业转载请注明出处。
 */
class Solution
{
    /**
     * @param String $s
     * @return Integer
     */
    public function lengthOfLastWord(string $s): int
    {
        $s = trim($s);
        $lastIndex = strlen($s) - 1;
        $spaceIndex = strrpos($s, ' ');
        if ($spaceIndex === false) {
            $spaceIndex = -1;
        }
        return $lastIndex - $spaceIndex;
    }
}
