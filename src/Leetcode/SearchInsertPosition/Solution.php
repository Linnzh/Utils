<?php

declare(strict_types=1);

namespace Linnzh\Utils\Leetcode\SearchInsertPosition;

/**
 * 给定一个排序数组和一个目标值，在数组中找到目标值，并返回其索引。如果目标值不存在于数组中，返回它将会被按顺序插入的位置。
 *
 * 请必须使用时间复杂度为 O(log n) 的算法。
 *
 * 来源：力扣（LeetCode）
 * 链接：https://leetcode-cn.com/problems/search-insert-position
 * 著作权归领扣网络所有。商业转载请联系官方授权，非商业转载请注明出处。
 */
class Solution
{
    /**
     * @param int[] $nums
     * @param int   $target
     *
     * @return int
     */
    public function searchInsert(array $nums, int $target): int
    {
        if ($target <= $nums[0]) {
            return 0;
        }

        $count = count($nums);

        if ($target === $nums[$count - 1]) {
            return $count - 1;
        }

        if ($target > $nums[$count - 1]) {
            return $count;
        }

        $maxIndex = 0;

        foreach ($nums as $key => $num) {
            if ($target === $num) {
                return $key;
            }

            if ($target > $num && $target < $nums[$key + 1]) {
                $maxIndex = $key + 1;
            }
        }

        return $maxIndex;
    }
}
