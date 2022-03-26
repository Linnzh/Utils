<?php

declare(strict_types=1);

namespace Linnzh\Utils\Facade;

use Linnzh\Utils\Adapter\EmailNotification;
use Linnzh\Utils\Adapter\WeiboApi;
use Linnzh\Utils\Adapter\WeiboNotificationAdapter;

class BroadcastFacade
{
    protected Company $company;

    public function __construct(Company $company)
    {
        $this->company = $company;
    }

    public function send(string $message, string $title, string $type = 'email'): void
    {
        echo "企业 {$this->company->getName()} 正在广播一条通知：\n";

        if ($type === 'weibo') {
            $weiboApi = new WeiboApi($this->company->getName(), 'appKey');
        }

        foreach ($this->company->getUsers() as $user) {
            if ($type === 'email') {
                $notification = new EmailNotification($user->getEmail());
            }

            if ($type === 'weibo' && isset($weiboApi)) {
                $notification = new WeiboNotificationAdapter($weiboApi, $user->getName());
            }
            isset($notification) && $notification->send($title, $message);
        }
        echo "通知结束！\n";
    }
}
