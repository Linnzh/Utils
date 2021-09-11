<?php


namespace Linnzh\Utils\Algorithm;


class SimpleSorting
{
    /**
     * 选择排序
     * @param array $data
     * @return array
     */
    public static function selectionSort(array $data): array
    {
        $count = count($data);

        for ($i = 0; $i < $count - 1; $i++) {
            $smallest = $i;
            for ($j = $i + 1; $j < $count; $j++) {
                if($data[$j] < $data[$smallest]) {
                    $smallest = $j;
                }
            }
            $tmp = $data[$i];
            $data[$i] = $data[$smallest];
            $data[$smallest] = $tmp;
        }

        return $data;
    }
}