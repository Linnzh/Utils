<?php

declare(strict_types=1);

namespace Linnzh\Utils\Leetcode\MaximumSubarray;

/**
 * 给你一个整数数组 nums ，请你找出一个具有最大和的连续子数组（子数组最少包含一个元素），返回其最大和。
 * 子数组 是数组中的一个连续部分。
 *
 * 示例 1：
 *
 * 输入：nums = [-2,1,-3,4,-1,2,1,-5,4]
 * 输出：6
 * 解释：连续子数组 [4,-1,2,1] 的和最大，为 6 。
 *
 * 示例 2：
 *
 * 输入：nums = [1]
 * 输出：1
 *
 * 来源：力扣（LeetCode）
 * 链接：https://leetcode-cn.com/problems/maximum-subarray
 * 著作权归领扣网络所有。商业转载请联系官方授权，非商业转载请注明出处。
 */
class Solution
{
    /**
     * 暴力破解
     *
     * @param int[] $nums
     *
     * @return int
     */
    public function maxSubArray(array $nums): int
    {
        $count = count($nums);

        if ($count === 1) {
            return $nums[0];
        }

        $tmp = $nums[0];
        $max = $tmp;

        for ($i = 1; $i < $count; $i++) {
            $after = $nums[$i] + $tmp;

            /**
             * 当当前序列加上此时的元素的值大于 tmp 的值，说明最大序列和可能出现在后续序列中，记录此时的最大值
             * 否则 tmp(当前和)小于下一个元素时，当前最长序列到此为止。以该元素为起点继续找最大子序列，并记录此时的最大值
             */
            if ($nums[$i] < $after) {
                $max = max($max, $after);
                $tmp = $after;
            } else {
                $max = max($max, $tmp, $after, $nums[$i]);
                $tmp = $nums[$i];
            }
        }

        return $max;
    }
}
