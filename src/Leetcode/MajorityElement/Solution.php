<?php

namespace Linnzh\Utils\Leetcode\MajorityElement;

/**
 * 多数元素
 *
 * 给定一个大小为 n 的数组 nums ，返回其中的多数元素。多数元素是指在数组中出现次数 大于 ⌊ n/2 ⌋ 的元素。
 *
 * 你可以假设数组是非空的，并且给定的数组总是存在多数元素。
 *
 * 示例 1：
 *
 * 输入：nums = [3,2,3]
 * 输出：3
 *
 * 示例 2：
 *
 * 输入：nums = [2,2,1,1,1,2,2]
 * 输出：2
 *
 * 提示：
 *
 * n == nums.length
 * 1 <= n <= 5 * 104
 * -109 <= nums[i] <= 109
 */
class Solution
{
    /**
     * @param Integer[] $nums
     * @return Integer
     */
    public function majorityElement(array $nums): int
    {
        $count = (int)ceil(count($nums) / 2);
        $generator = static::getGenerator($nums);
        $result = [];
        foreach ($generator as $key => $item) {
            if (isset($result[$key])) {
                $result[$key]++;
            } else {
                $result[$key] = 1;
            }
            if ($result[$key] >= $count) {
                return $key;
            }
        }
        return -1;
    }

    public static function getGenerator(array $nums): \Generator
    {
        foreach ($nums as $num) {
            yield $num => $num;
        }
    }
}
