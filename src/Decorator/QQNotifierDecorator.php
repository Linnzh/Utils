<?php

declare(strict_types=1);

namespace Linnzh\Utils\Decorator;

class QQNotifierDecorator extends AbstractNotifierDecorator
{
    public function send(string $message): void
    {
        parent::send($message);
        $this->sendQQ($message);
    }

    private function sendQQ(string $message): void
    {
        echo $message . ' 发送了一条QQ通知' . PHP_EOL;
    }
}
