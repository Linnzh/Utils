<?php

/**
 * 常用工具函数
 */
if (!function_exists('max')) {
    function max(mixed $left, mixed $right) {
        return $left >= $right ? $left : $right;
    }
}
