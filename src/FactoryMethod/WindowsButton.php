<?php

declare(strict_types=1);

namespace Linnzh\Utils\FactoryMethod;

class WindowsButton implements Button
{
    public function render(): void
    {
        echo "您渲染了一个 Windows 按钮！\n";
    }

    public function onClick(): void
    {
        echo "您点击了一个 Windows 按钮！\n";
    }
}
