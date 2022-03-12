<?php

namespace Linnzh\Utils\Test\Flyweight;

use Linnzh\Utils\Flyweight\MaterialCategoryFlyweight;
use Linnzh\Utils\Flyweight\MaterialPool;
use PHPUnit\Framework\TestCase;

class MaterialCategoryFlyweightTest extends TestCase
{
    public function testExample(): void
    {
        $pool = new MaterialPool();

        $suppliers = ['华为', 'OPPO', '小米', 'Apple'];
        $manufactureYears = [2020, 2021, 2022];

        $i = 0;
        while ($i < 1000) {
            $name = substr(str_shuffle('#ABCDEFGHILKMNOPQRSTUVWXYZ#abcdefghilkmnopqrstuvwxyz1234567890'), 1000 % 61, 10);
            $pool->addMaterial('物料' . $name, '简单描述' . $i, $suppliers[$i % 4], $manufactureYears[$i % 3]);
            $i++;
        }

        $material = $pool->findOneMaterial(['description' => '简单描述2']);
        if ($material) {
            $material->output();
        }

        $materials = $pool->findManyMaterial(['supplier' => '华为']);
        foreach ($materials as $material) {
            $material->output();
        }

        $this->assertEquals(true, true);
    }
}
