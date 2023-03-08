<?php

declare(strict_types=1);

/**
 * 两数之和
 *
 * @param array $nums
 * @param int   $target
 *
 * @return array
 */
function twoSum(array $nums, int $target): array
{
    $hash = array_combine($nums, array_keys($nums));
    foreach ($nums as $k1 => $left) {
        $k2 = $target - $left;
        if (isset($hash[$k2]) && $k1 != $hash[$k2]) {
            return [$k1, $hash[$k2]];
        }
    }
    return [];
}

/**
 * 判断是否为回文数
 *
 * @param int $x
 *
 * @return bool
 */
function isPalindrome(int $x): bool
{
    if ($x < 0) {
        return false;
    }

    $tmp = $x;
    $reversed = 0;

    while($tmp > 0) {
        $lastNum = $tmp % 10;
        $tmp = floor($tmp / 10);
        $reversed = $reversed * 10 + $lastNum;
    }

    return $reversed == $x;
}

/**
 * 最长公共前缀
 *
 * @param array|string[] $strArr
 *
 * @return string
 */
function longestCommonPrefix(array $strArr): string {
    if (empty($strArr)) {
        return '';
    }

    $count = count($strArr);
    $length = strlen($strArr[0]);

    for ($col = 0;$col < $length; $col++) {
        for ($row = 1;$row < $count; $row++) {
            $current = $strArr[$row];
            $prev = $strArr[$row - 1];
            if ($col >= strlen($current)
                || $col >= strlen($prev)
                || $current[$col] != $prev[$col]
            ) {
                return substr($strArr[$row], 0, $col);
            }
        }
    }

    return $strArr[0];
}

/**
 * 罗马数字转整数
 *
 * @param string $s
 *
 * @return float|int
 */
function romanToInt(string $s): float|int
{
    define("RULE", ['I' => 1, 'V' => 5, 'X' => 10, 'L' => 50,
                    'C' => 100, 'D' => 500, 'M' => 1000, 'IV' => 4,
                    'IX' => 9, 'XL' => 40, 'XC' => 90, 'CD' => 400,
                    'CM' => 900]);
    $arr = str_split($s);
    $result = 0;

    foreach ($arr as $key => $item) {
        $result += RULE[$item];
        if ($key === 0) {
            continue;
        }

        $prev = $arr[$key - 1];
        if (RULE[$item] > RULE[$prev]) {
            $result -= RULE[$prev] * 2;
        }
    }

    return $result;
}
