<?php

namespace Linnzh\Utils\Test\Algorithm;

use Linnzh\Utils\Algorithm\SimpleSearch;
use PHPUnit\Framework\TestCase;

class SimpleSearchTest extends TestCase
{
    public function testBinarySearch(): void
    {
        $data = range(12, 40);

        $count = 0;
        while ($count < 7) {

            $expected = random_int(0, count($data) - 1);
            $target = $data[$expected];
            $result = SimpleSearch::binarySearch($data, $target);
            $this->assertIsNumeric($result);
            $this->assertEquals($expected, $result);

            $count++;
        }
    }

    public function testRecursiveBinarySearch(): void
    {
        $data = range(12, 40);

//        $expected = random_int(0, count($data) - 1);
//        $target = $data[$expected];
//        $result = SimpleSearch::recursiveBinarySearch($data, $target, 0, count($data) - 1);
//        $this->assertIsNumeric($result);
//        $this->assertEquals($expected, $result);

        $count = 0;
        while($count < 7) {

            $expected = random_int(0, count($data) - 1);
            $target = $data[$expected];
            $result = SimpleSearch::recursiveBinarySearch($data, $target, 0, count($data) - 1);
            $this->assertIsNumeric($result);
            $this->assertEquals($expected, $result);

            $count++;
        }
    }
}
