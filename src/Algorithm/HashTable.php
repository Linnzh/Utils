<?php


namespace Linnzh\Utils\Algorithm;


use JetBrains\PhpStorm\Pure;

/**
 * 哈希表 - HashTable
 *
 * 哈希表是一种使用哈希函数将数据映射到存储位置的数据结构。
 * 它支持快速插入和查找操作，常用于缓存、路由表等场景。
 */
class HashTable
{
    private array $buckets; // 存储桶数组
    private int $size; // 哈希表大小

    /**
     * 构造函数，初始化桶数组和哈希表大小
     *
     * @param int $size
     */
    public function __construct(int $size = 10)
    {
        // 初始化桶数组，每个桶初始为空数组
        $this->buckets = array_fill(0, $size, []);
        // 初始化哈希表大小
        $this->size = $size;
    }

    /**
     * 插入键值对到哈希表中
     *
     * @param $key
     * @param $value
     */
    public function insert($key, $value)
    {
        $index = $this->hash($key);
        // 在对应桶中插入键值对
        array_push($this->buckets[$index], [$key, $value]);
    }

    /**
     * 哈希函数，用于计算键的哈希值
     * 这里简单地使用键的长度作为哈希值，实际的哈希函数可能更加复杂
     *
     * @param $key
     *
     * @return int
     */
    private function hash($key)
    {
        return strlen($key) % $this->size;
    }

    /**
     * 查找指定键的值
     *
     * @param $key
     *
     * @return mixed|null
     */
    #[Pure]
    public function find($key)
    {
        // 计算键的哈希值，确定查找的桶位置
        $index = $this->hash($key);
        // 在对应桶中查找键值对
        foreach ($this->buckets[$index] as $bucket) {
            // 找到指定键的值
            if ($bucket[0] === $key) {
                return $bucket[1]; // 返回值
            }
        }
        return null; // 没有找到指定键，返回 null
    }

    /**
     * 删除指定键的键值对
     *
     * @param $key
     */
    public function delete($key)
    {
        // 计算键的哈希值，确定删除的桶位置
        $index = $this->hash($key);
        // 在对应桶中查找键值对
        foreach ($this->buckets[$index] as $i => $bucket) {
            // 找到指定键的键值对
            if ($bucket[0] === $key) {
                // 删除键值对
                array_splice($this->buckets[$index], $i, 1);
                return; // 删除成功，直接返回
            }
        }
    }

    /**
     * 打印哈希表中的所有键值对
     */
    public function printTable()
    {
        // 遍历所有桶
        for ($i = 0; $i < $this->size; $i++) {
            echo "Bucket " . $i . ": "; // 打印桶的编号
            // 遍历桶中的键值对
            foreach ($this->buckets[$i] as $bucket) {
                echo $bucket[0] . "=>" . $bucket[1] . " "; // 打印键和值
            }
            echo PHP_EOL; // 换行
        }
    }
}

