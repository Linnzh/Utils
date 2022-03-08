<?php


namespace Linnzh\Utils\Adapter;


interface NotificationTarget
{
    public function send(string $title, string $message): void;
}
