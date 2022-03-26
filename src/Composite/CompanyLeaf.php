<?php

declare(strict_types=1);

namespace Linnzh\Utils\Composite;

class CompanyLeaf extends AbstractCompany
{
    private string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function execute(): string
    {
        return "一个企业叶节点：{$this->name}";
    }
}
