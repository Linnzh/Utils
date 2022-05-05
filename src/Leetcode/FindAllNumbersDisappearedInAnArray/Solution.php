<?php


namespace Linnzh\Utils\Leetcode\FindAllNumbersDisappearedInAnArray;


/**
 * 找到所有数组中消失的数字
 *
 * 给你一个含 n 个整数的数组 nums ，其中 nums[i] 在区间 [1, n] 内。请你找出所有在 [1, n] 范围内但没有出现在 nums 中的数字，并以数组的形式返回结果。
 *
 * 示例 1：
 *
 * 输入：nums = [4,3,2,7,8,2,3,1]
 * 输出：[5,6]
 *
 * 示例 2：
 *
 * 输入：nums = [1,1]
 * 输出：[2]
 *
 * 提示：
 *
 * n == nums.length
 * 1 <= n <= 105
 * 1 <= nums[i] <= n
 *
 * 来源：力扣（LeetCode）
 * 链接：https://leetcode-cn.com/problems/find-all-numbers-disappeared-in-an-array
 * 著作权归领扣网络所有。商业转载请联系官方授权，非商业转载请注明出处。
 */
class Solution
{
    /**
     * 暴力破解
     * 使用生成器制造 从 1 到 n 的数组 generator
     * 对 nums 进行遍历，如果 generator 的元素不存在于 nums，则进行记录
     * - 这里使用数组的索引来快速查找
     * - 如果使用 in_array() 方法，则会导致运行时间过长
     * @param Integer[] $nums
     * @return Integer[]
     */
    public function findDisappearedNumbers(array $nums): array
    {
        $count = count($nums);
        $result = [];

        $generator = static::generator($count);
        $nums = array_combine($nums, $nums);
        foreach ($generator as $i) {
            if(!isset($nums[$i])) {
                $result[] = $i;
            }
        }

        return $result;
    }

    public static function generator(int $count): \Generator
    {
        for ($i = 1; $i <= $count; $i++) {
            yield $i;
        }
    }
}
