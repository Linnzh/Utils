<?php

declare(strict_types=1);

namespace Linnzh\Utils\Leetcode\ValidParentheses;

/**
 * 给定一个只包括 '('，')'，'{'，'}'，'['，']' 的字符串 s ，判断字符串是否有效。
 *
 * 有效字符串需满足：
 *
 * 左括号必须用相同类型的右括号闭合。
 * 左括号必须以正确的顺序闭合。
 *
 * 来源：力扣（LeetCode）
 * 链接：https://leetcode-cn.com/problems/valid-parentheses
 * 著作权归领扣网络所有。商业转载请联系官方授权，非商业转载请注明出处。
 */
class Solution
{
    public const PARENTHESES = [
        ')' => '(',
        ']' => '[',
        '}' => '{',
    ];

    /**
     * @param string $s
     *
     * @return bool
     */
    public function isValid(string $s): bool
    {
        $count = strlen($s);

        if ($count % 2 === 1) {
            return false;
        }

        $arr = str_split($s);

        $stack = [];

        foreach ($arr as $item) {
            if (isset(self::PARENTHESES[$item])) {
                if (count($stack) === 0 || $stack[count($stack) - 1] !== self::PARENTHESES[$item]) {
                    return false;
                }
                array_pop($stack);
            } else {
                $stack[] = $item;
            }
        }

        return count($stack) === 0;
    }
}
