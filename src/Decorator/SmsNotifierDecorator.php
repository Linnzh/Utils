<?php


namespace Linnzh\Utils\Decorator;


class SmsNotifierDecorator extends AbstractNotifierDecorator
{
    public function send(string $message): void
    {
        parent::send($message);
        $this->sendSms($message);
    }

    private function sendSms(string $message): void
    {
        echo $message . ' 发送了一条短信通知' . PHP_EOL;
    }
}
