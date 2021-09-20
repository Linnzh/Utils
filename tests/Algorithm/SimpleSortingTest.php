<?php


namespace Linnzh\Utils\Test\Algorithm;


use Linnzh\Utils\Algorithm\SimpleSorting;
use PHPUnit\Framework\TestCase;

class SimpleSortingTest extends TestCase
{
    public function testSelectionSort(): void
    {
        $data = range(12, 30);
        shuffle($data);

//        $data = [12, 9, 3, 7, 14, 11];
        $initValue = $data;
        $result = SimpleSorting::selectionSort($data);
        $this->assertIsArray($result);
        sort($data);
        $this->assertEquals($data, $result,
            "初始值：" . json_encode($initValue, JSON_UNESCAPED_UNICODE) .
            "\n预期结果：" . json_encode($data, JSON_UNESCAPED_UNICODE)
            . "\n实际结果：" . json_encode($result, JSON_UNESCAPED_UNICODE));
    }

    public function testInsertionSort(): void
    {
        $data = range(12, 30);
        shuffle($data);

//        $data = [12, 9, 3, 7, 14, 11];
        $initValue = $data;
        $result = SimpleSorting::insertionSort($data);
        $this->assertIsArray($result);
        sort($data);
        $this->assertEquals($data, $result,
            "初始值：" . json_encode($initValue, JSON_UNESCAPED_UNICODE) .
            "\n预期结果：" . json_encode($data, JSON_UNESCAPED_UNICODE)
            . "\n实际结果：" . json_encode($result, JSON_UNESCAPED_UNICODE));
    }
}