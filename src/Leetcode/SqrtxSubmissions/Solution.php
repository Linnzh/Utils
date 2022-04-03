<?php


namespace Linnzh\Utils\Leetcode\SqrtxSubmissions;


/**
 * 给你一个非负整数 x ，计算并返回 x 的 算术平方根 。
 *
 * 由于返回类型是整数，结果只保留 整数部分 ，小数部分将被 舍去 。
 *
 * 注意：不允许使用任何内置指数函数和算符，例如 pow(x, 0.5) 或者 x ** 0.5 。
 *
 * 来源：力扣（LeetCode）
 * 链接：https://leetcode-cn.com/problems/sqrtx
 * 著作权归领扣网络所有。商业转载请联系官方授权，非商业转载请注明出处。
 */
class Solution
{
    /**
     * @param Integer $x
     * @return Integer
     */
    public function mySqrt(int $x): int
    {
        // return (int)sqrt($x);

        // 牛顿迭代：https://leetcode-cn.com/problems/sqrtx/solution/x-de-ping-fang-gen-by-leetcode-solution/
        if ($x === 0) {
            return 0;
        }
        $x0 = $x;
        $offset = 10 ** -7;
        while(true) {
            $xi = 0.5 * ($x0 + $x / $x0);
            if(abs($x0 - $xi) < $offset) {
                break;
            }
            $x0 = $xi;
        }
        return (int)$x0;
    }
}
