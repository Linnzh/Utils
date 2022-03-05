<?php


namespace Linnzh\Utils\Decorator;


class WechatNotifierDecorator extends AbstractNotifierDecorator
{
    public function send(string $message): void
    {
        parent::send($message);
        $this->sendWechat($message);
    }

    private function sendWechat(string $message): void
    {
        echo $message . ' 发送了一条微信通知' . PHP_EOL;
    }
}
