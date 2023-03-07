<?php

declare(strict_types=1);

/**
 * 判断是否为回文数
 *
 * @param int $x
 *
 * @return bool
 */
function isPalindrome(int $x): bool {
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
