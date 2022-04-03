<?php


namespace Linnzh\Utils\Leetcode\ClimbingStairs;


/**
 * 假设你正在爬楼梯。需要 n 阶你才能到达楼顶。
 * 每次你可以爬 1 或 2 个台阶。你有多少种不同的方法可以爬到楼顶呢？
 *
 * 示例 1：
 *
 * 输入：n = 2
 * 输出：2
 * 解释：有两种方法可以爬到楼顶。
 * 1. 1 阶 + 1 阶
 * 2. 2 阶
 *
 * 示例 2：
 *
 * 输入：n = 3
 * 输出：3
 * 解释：有三种方法可以爬到楼顶。
 * 1. 1 阶 + 1 阶 + 1 阶
 * 2. 1 阶 + 2 阶
 * 3. 2 阶 + 1 阶
 *
 * 来源：力扣（LeetCode）
 * 链接：https://leetcode-cn.com/problems/climbing-stairs
 * 著作权归领扣网络所有。商业转载请联系官方授权，非商业转载请注明出处。
 */
class Solution
{
    public function recursive(int $n): int
    {
        if ($n === 1) {
            return 1;
        }

        if ($n === 2) {
            return 2;
        }

        return $this->recursive($n - 1) + $this->recursive($n - 2);
    }

    /**
     * 动态规划类问题
     * 本质为：求可解方法的数量
     * 使用递归会造成重复计算，可能会导致超时
     * 这里只需要计算指定 n 的前两个元素之和
     *
     * @param Integer $n
     * @return Integer
     */
    public function climbStairs(int $n): int
    {
        if ($n <= 1) {
            return $n;
        }
        $dp = [];
        $dp[1] = 1;
        $dp[2] = 2;
        for ($i = 3; $i <= $n; $i++) {
            $dp[$i] = $dp[$i-1] + $dp[$i-2];
        }
        return $dp[$n];
    }
}
