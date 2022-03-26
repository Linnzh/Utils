<?php


namespace Linnzh\Utils\TemplateMethod;


class PickupOrder extends Order
{
    public function commit(): void
    {
        echo "\n订单正在提交……\n";
        echo "\n该订单为备货单，无需发货！\n";
        echo "\n订单已完成！\n";
    }
}
