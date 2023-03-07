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
