<?php


namespace Linnzh\Utils\FactoryMethod\AbstractFactory;


class WindowsCheckbox implements Checkbox
{

    public function print(): void
    {
        echo "您输出了一个 Windows 多选框！\n";
    }
}
