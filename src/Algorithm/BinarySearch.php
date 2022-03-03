<?php


namespace Linnzh\Utils\Algorithm;


/**
 * 二分查找法
 * 前提：一个已经排好序的数组 list （默认从小到大，ASC） 和目标值 target
 * 概要：从两端 left 和 right 取中间值 mid 与 目标值 target 进行大小比较，
 *  按情况进行范围收紧，找不到则返回 -1
 *
 * 情况0：以 mid 为主：如果 mid == target，则返回 mid，不然：
 *  mid > target 则说明需要在左侧查找，收缩右边界
 *  mid < target 则说明需要在右侧查找，收缩左边界
 *
 * 情况1：以 left 为主，找到第一个符合条件的位置
 *  即便 mid == target 也要向左看，即收缩右边界
 *
 * 情况2：以 right 为主，找到最后一个符合条件的位置
 *  即便 mid == target 也要向右看，即收缩左边界
 *
 * 情况 1 和 2 需要考虑数组越界的情况：left 超出数组长度 或者 right 小于 0
 * left 只会不断增大，right 则不断缩小
 */
class BinarySearch
{
    public static function middle(array $list, mixed $target): int
    {
        $left = 0;
        $right = count($list) - 1;
        while($left <= $right) {
            $mid = $left + floor(($right - $left) / 2);
            if ($list[$mid] === $target) {
                return $mid;
            }
            if ($list[$mid] < $target) {
                $left = $mid + 1;
            } elseif ($list[$mid] > $target) {
                $right = $mid - 1;
            }
        }
        return -1;
    }

    public static function first(array $list, mixed $target): int
    {
        $left = 0;
        $right = count($list) - 1;
        while($left <= $right) {
            $mid = $left + floor(($right - $left) / 2);
            if ($list[$mid] === $target) {
                $right = $mid - 1;
            } elseif ($list[$mid] < $target) {
                $left = $mid + 1;
            } elseif ($list[$mid] > $target) {
                $right = $mid - 1;
            }
        }
        if ($left >= count($list) || $list[$left] !== $target) {
            return  -1;
        }
        return $left;
    }

    public static function last(array $list, mixed $target): int
    {
        $left = 0;
        $right = count($list) - 1;
        while($left <= $right) {
            $mid = $left + floor(($right - $left) / 2);
            if ($list[$mid] === $target) {
                $left = $mid + 1;
            } elseif ($list[$mid] < $target) {
                $left = $mid + 1;
            } elseif ($list[$mid] > $target) {
                $right = $mid - 1;
            }
        }
        if ($right < 0 || $list[$right] !== $target) {
            return  -1;
        }
        return $right;
    }
}