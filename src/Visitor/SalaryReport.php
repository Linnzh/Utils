<?php

declare(strict_types=1);

namespace Linnzh\Utils\Visitor;

class SalaryReport implements Visitor
{
    public function visitCompany(Company $company): string
    {
        $output = '';
        $total = 0;

        foreach ($company->getDepartments() as $department) {
            $total += $department->getCost();
            $output .= "\n--" . $this->visitDepartment($department);
        }

        $output = $company->getName()
            . ' (' . (new \NumberFormatter('en_US', \NumberFormatter::CURRENCY))->formatCurrency($total, 'USD') . ")\n" . $output;

        return $output;
    }

    public function visitDepartment(Department $department): string
    {
        $output = '';

        foreach ($department->getEmployees() as $employee) {
            $output .= '   ' . $this->visitEmployee($employee);
        }

        $output = $department->getName()
            . ' (' . (new \NumberFormatter('en_US', \NumberFormatter::CURRENCY))->formatCurrency($department->getCost(), 'USD') . ")\n\n"
            . $output;

        return $output;
    }

    public function visitEmployee(Employee $employee): string
    {
        return (new \NumberFormatter('en_US', \NumberFormatter::CURRENCY))->formatCurrency($employee->getSalary(), 'USD')
            . ' ' . $employee->getName()
            . ' (' . $employee->getPosition() . ")\n";
    }
}
