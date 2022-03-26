<?php

declare(strict_types=1);

namespace Linnzh\Utils\Test\Composite;

use Linnzh\Utils\Composite\CompanyComposite;
use Linnzh\Utils\Composite\CompanyLeaf;
use PHPUnit\Framework\TestCase;

class CompanyCompositeTest extends TestCase
{
    public function testExample(): void
    {
        $tree = new CompanyComposite();

        $branchA = new CompanyComposite();
        $branchA->add(new CompanyLeaf('企业A1'));
        $branchA->add(new CompanyLeaf('企业A2'));
        $tree->add($branchA);
        echo $tree->execute();

        echo "\n";

        $branchB = new CompanyComposite();
        $branchB->add(new CompanyLeaf('企业B1'));
        $branchB->add(new CompanyLeaf('企业B2'));
        $tree->add($branchB);
        echo $tree->execute();

        $this->assertEquals(true, true);
    }
}
