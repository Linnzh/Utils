<?php


namespace Linnzh\Utils\Leetcode\ExcelSheetColumnNumber;


/**
 * 给你一个字符串 columnTitle ，表示 Excel 表格中的列名称。返回 该列名称对应的列序号 。
 *
 * 例如：
 *
 * A -> 1
 * B -> 2
 * C -> 3
 * ...
 * Z -> 26
 * AA -> 27
 * AB -> 28
 * ...
 *
 *
 *
 * 示例 1:
 *
 * 输入: columnTitle = 'A'
 * 输出: 1
 *
 * 示例 2:
 *
 * 输入: columnTitle = 'AB'
 * 输出: 28
 *
 * 示例 3:
 *
 * 输入: columnTitle = 'ZY'
 * 输出: 701
 *
 * 来源：力扣（LeetCode）
 * 链接：https://leetcode.cn/problems/excel-sheet-column-number
 * 著作权归领扣网络所有。商业转载请联系官方授权，非商业转载请注明出处。
 */
class Solution
{
    /**
     * 10 进制转 26 进制（1，25）
     *
     * @param String $columnTitle
     *
     * @return Integer
     */
    public function titleToNumber(string $columnTitle)
    {
        $ans = 0;

        $titles = str_split($columnTitle);
        foreach ($titles as $index => $title) {
            $ans = $ans * 26 + ord($title) - ord('A') + 1;
        }

        return $ans;
    }
}
