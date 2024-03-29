<?php


namespace Linnzh\Utils\Leetcode\IsomorphicStrings;


/**
 * 给定两个字符串 s 和 t ，判断它们是否是同构的。
 *
 * 如果 s 中的字符可以按某种映射关系替换得到 t ，那么这两个字符串是同构的。
 *
 * 每个出现的字符都应当映射到另一个字符，同时不改变字符的顺序。不同字符不能映射到同一个字符上，相同字符只能映射到同一个字符上，字符可以映射到自己本身。
 *
 *
 *
 * 示例 1:
 *
 * 输入：s = 'egg', t = 'add'
 * 输出：true
 *
 * 示例 2：
 *
 * 输入：s = 'foo', t = 'bar'
 * 输出：false
 *
 * 示例 3：
 *
 * 输入：s = 'paper', t = 'title'
 * 输出：true
 *
 * 来源：力扣（LeetCode）
 * 链接：https://leetcode.cn/problems/isomorphic-strings
 * 著作权归领扣网络所有。商业转载请联系官方授权，非商业转载请注明出处。
 */
class Solution
{
    /**
     * 题意是 s->t 唯一，t->s 唯一，而不是「映射唯一」，也不是仅 s->t 唯一
     *
     * @param String $s
     * @param String $t
     *
     * @return Boolean
     */
    public function isIsomorphic(string $s, string $t)
    {
        if (strlen($s) != strlen($t)) {
            return false;
        }

        $mappingA = $mappingB = [];
        $sArr = str_split($s);
        $tArr = str_split($t);
        foreach ($sArr as $key => $val) {
            if (isset($mapping[$val]) && $mapping[$val] !== $tArr[$key]) {
                return false;
            }
            if (isset($mappingB[$tArr[$key]]) && $mappingB[$tArr[$key]] !== $val) {
                return false;
            }
            if (!isset($mapping[$val])) {
                $mapping[$val] = $tArr[$key];
            }
            if (!isset($mappingB[$tArr[$key]])) {
                $mappingB[$tArr[$key]] = $val;
            }
        }

        return true;
    }
}
