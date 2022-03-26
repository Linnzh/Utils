<?php

declare(strict_types=1);

namespace Linnzh\Utils\Mediator\EventDispatcher;

class OnBoardingNotification implements ObserverInterface
{
    private string $adminEmail;

    public function __construct(string $adminEmail)
    {
        $this->adminEmail = $adminEmail;
    }

    public function update(string $event, object $emitter, $data = null): void
    {
        echo "广播事件通知: 该通知已通过邮件发送至{$this->adminEmail}！\n";
    }
}
