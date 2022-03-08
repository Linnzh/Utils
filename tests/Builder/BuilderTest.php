<?php

namespace Linnzh\Utils\Test\Builder;

use Linnzh\Utils\Builder\Builder;
use Linnzh\Utils\Builder\CarBuilder;
use Linnzh\Utils\Builder\Director;
use Linnzh\Utils\Builder\ManualBuilder;
use PHPUnit\Framework\TestCase;

class BuilderTest extends TestCase
{
    public function testExample(): void
    {
        $director = new Director();
        echo "\n";

        $carBuilder = new CarBuilder();
        $director->buildSportsCar($carBuilder);
        echo $carBuilder . "\n\n";

        $manualBuilder = new ManualBuilder();
        $director->buildSUVCar($manualBuilder);
        echo $manualBuilder . "\n\n";

        $this->assertEquals(true, true);
    }
}
