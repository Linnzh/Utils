<?php

declare(strict_types=1);

namespace Linnzh\Utils\Flyweight;

class MaterialCategoryFlyweight
{
    public string $supplier;

    public int $manufactureYear;

    public function __construct(string $supplier, int $manufactureYear)
    {
        $this->supplier = $supplier;
        $this->manufactureYear = $manufactureYear;
    }

    public function output(string $name, string $description): void
    {
        echo "供应商：{$this->supplier} 生产年份：{$this->manufactureYear} 年 名称：{$name} 描述：{$description}\n";
    }
}
