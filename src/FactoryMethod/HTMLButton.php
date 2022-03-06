<?php


namespace Linnzh\Utils\FactoryMethod;


class HTMLButton implements Button
{

    public function render(): void
    {
        echo "您渲染了一个 HTML 按钮！\n";
    }

    public function onClick(): void
    {
        echo "您点击了一个 HTML 按钮！\n";
    }
}
