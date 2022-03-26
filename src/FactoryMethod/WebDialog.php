<?php

declare(strict_types=1);

namespace Linnzh\Utils\FactoryMethod;

class WebDialog extends Dialog
{
    public function render(): void
    {
        echo "您渲染了一个 WEB 对话框！\n";
    }

    public function createButton(): Button
    {
        return new HTMLButton();
    }
}
