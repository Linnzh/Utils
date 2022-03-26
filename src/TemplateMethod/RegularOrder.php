<?php


namespace Linnzh\Utils\TemplateMethod;


class RegularOrder extends Order
{

    public function commit(): void
    {
        echo "\n使用了父类默认的 commit() 方法！\n";
        parent::commit();
    }
}
