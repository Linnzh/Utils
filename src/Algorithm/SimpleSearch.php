<?php


namespace Linnzh\Utils\Algorithm;


class SimpleSearch
{
    /**
     * 搜索的数组
     * @var array
     */
    public $data = [];

    /**
     * 搜索目标值
     * @var mixed
     */
    public $target;

    public const ERROR = -1;

    public function __construct(array $data = [], $target = '')
    {
        $this->data = $data;
        $this->target = $target;
    }

    /**
     * 二分查找法
     *
     * 取首尾两端的中间位置的值，与目标值比较
     * 如果相等则返回该位置
     * 若中间值在目标值左边，则移动左边至中间
     * 反之中间值在目标值右边，则移动右边至中间
     * 直至找到与目标值相等的中间值
     * 或者左边等于右边
     * @param array $data
     * @param $target
     * @return int
     */
    public static function binarySearch(array $data, $target): int
    {
        $start = 0;
        $end = count($data) - 1;

        $middle = (int)floor(($start + $end) / 2);

        while($start <= $end) {
            if($data[$middle] === $target) {
                return $middle;
            }
            if($data[$middle] < $target) {
                $start = $middle + 1;
            } else {
                $end = $middle - 1;
            }
            $middle = (int)floor(($start + $end) / 2);
        }
        return self::ERROR;
    }

    /**
     * 二分查找法-递归
     *
     * 这里是将循环转为递归写法
     *
     * @param array $data
     * @param $target
     * @param int $start
     * @param int $end
     * @return int
     */
    public static function recursiveBinarySearch(array $data, $target, int $start, int $end): int
    {
        if($start > $end) {
            return self::ERROR;
        }
        $middle = (int)floor(($start + $end) / 2);

        if($data[$middle] === $target) {
            return $middle;
        }
        if($data[$middle] < $target) {
            $start = $middle + 1;
        } else {
            $end = $middle - 1;
        }
        return self::recursiveBinarySearch($data, $target, $start, $end);
    }
}