<?php

declare(strict_types=1);

namespace Linnzh\Utils\Observer;

class SmsSender extends Observer
{
    public function loginNotify(): void
    {
        // echo '您登录了账号！' . PHP_EOL;
    }

    public function update(Observable $observable, mixed $object): void
    {
        $this->loginNotify();
        echo '用户名：' . $object->username . ' IP：' . $object->lastIp;
    }
}
