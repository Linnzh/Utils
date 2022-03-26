<?php

declare(strict_types=1);
if (!function_exists('max')) {
    function max(mixed $left, mixed $right)
    {
        return $left >= $right ? $left : $right;
    }
}
