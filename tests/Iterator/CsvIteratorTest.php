<?php

declare(strict_types=1);

namespace Linnzh\Utils\Test\Iterator;

use Linnzh\Utils\Iterator\CsvIterator;
use PHPUnit\Framework\TestCase;

class CsvIteratorTest extends TestCase
{
    public function testExample(): void
    {
        $csv = new CsvIterator(__DIR__ . '/cats.csv');

        foreach ($csv as $key => $row) {
            print_r($row);
        }

        $this->assertIsIterable($csv);
    }
}
