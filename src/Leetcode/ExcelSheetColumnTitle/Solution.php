<?php


namespace Linnzh\Utils\Leetcode\ExcelSheetColumnTitle;


/**
 * 给你一个整数 columnNumber ，返回它在 Excel 表中相对应的列名称。
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
 * 示例 1：
 *
 * 输入：columnNumber = 1
 * 输出：'A'
 *
 * 示例 2：
 *
 * 输入：columnNumber = 28
 * 输出：'AB'
 *
 * 示例 3：
 *
 * 输入：columnNumber = 701
 * 输出：'ZY'
 *
 * 示例 4：
 *
 * 输入：columnNumber = 2147483647
 * 输出：'FXSHRXW'
 *
 *
 * 来源：力扣（LeetCode）
 * 链接：https://leetcode.cn/problems/excel-sheet-column-title
 * 著作权归领扣网络所有。商业转载请联系官方授权，非商业转载请注明出处。
 */
class Solution
{
    /**
     * 实际上为 10 进制转 26 进制问题
     *
     * @param Integer $columnNumber
     *
     * @return String
     */
    public function convertToTitle(int $columnNumber)
    {
        $title = '';
        while ($columnNumber > 0) {
            $columnNumber--;

            $last = $columnNumber % 26;
            $title .= chr($last + 65);
            $columnNumber = (int) floor($columnNumber / 26);
        }
        return strrev($title);
    }
}
