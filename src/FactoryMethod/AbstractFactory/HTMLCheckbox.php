<?php

declare(strict_types=1);

namespace Linnzh\Utils\FactoryMethod\AbstractFactory;

class HTMLCheckbox implements Checkbox
{
    public function print(): void
    {
        echo "您输出了一个 WEB 多选框！\n";
    }
}
