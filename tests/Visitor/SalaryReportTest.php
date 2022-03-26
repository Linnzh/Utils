<?php

declare(strict_types=1);

namespace Linnzh\Utils\Test\Visitor;

use Linnzh\Utils\Visitor\Company;
use Linnzh\Utils\Visitor\Department;
use Linnzh\Utils\Visitor\Employee;
use Linnzh\Utils\Visitor\SalaryReport;
use PHPUnit\Framework\TestCase;

class SalaryReportTest extends TestCase
{
    public function testExample(): void
    {
        $mobileDev = new Department('Mobile Development', [
            new Employee('Albert Filmore', 'designer', 100000),
            new Employee('Ali Hallway', 'programmer', 100000),
            new Employee('Sarah Kronor', 'programmer', 90000),
            new Employee('Monica Ronaldo', 'QA engineer', 31000),
            new Employee('James Smith', 'QA engineer', 30000),
        ]);
        $techSupport = new Department('Tech Support', [
            new Employee('Larry Albrecht', 'supervisor', 70000),
            new Employee('Elton Pale', 'operator', 30000),
            new Employee('Rajeev Kumar', 'operator', 30000),
            new Employee('John Burnoose', 'operator', 34000),
            new Employee('Sergey Korolyov', 'operator', 35000),
        ]);
        $company = new Company('SuperStarDevelopment', [$mobileDev, $techSupport]);

        $report = new SalaryReport();

        echo "Client: I can print a report for a whole company:\n\n";
        echo $company->accept($report);

        echo "\nClient: ...or just for a single department:\n\n";
        echo $techSupport->accept($report);

        $this->assertTrue(true);
    }
}
