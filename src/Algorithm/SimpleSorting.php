<?php


namespace Linnzh\Utils\Algorithm;


class SimpleSorting
{
    /**
     * 选择排序
     *
     * 指定元素与后面一组元素比较，找出后组元素中的最小值，进而交换
     * @param array $data
     * @return array
     */
    public static function selectionSort(array $data): array
    {
        $count = count($data);

        for ($i = 0; $i < $count - 1; $i++) {
            $smallest = $i;
            for ($j = $i + 1; $j < $count; $j++) {
                if ($data[$j] < $data[$smallest]) {
                    $smallest = $j;
                }
            }
            $tmp = $data[$i];
            $data[$i] = $data[$smallest];
            $data[$smallest] = $tmp;
        }

        return $data;
    }

    /**
     * 插入排序
     *
     * 指定元素与已排好序的前面一组元素就近地逐个比较
     * @param array $data
     * @return array
     */
    public static function insertionSort(array $data): array
    {
        $count = count($data);

        for ($i = 1; $i < $count; $i++) {
            $first = $data[$i];// 剩余元素的第一个值

            for ($j = $i - 1; $j >= 0 && $data[$j] > $first; $j--) {
                $data[$j + 1] = $data[$j];
            }
            $data[$j + 1] = $first;
        }

        return $data;
    }
}