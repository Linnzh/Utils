<?php


namespace Linnzh\Utils\Observer;


class Account extends Observable
{

    public string $username = '';
    public string $lastIp = '';

    public function login(string $username, string $ip): void
    {
        $this->username = $username;
        $this->lastIp = $ip;

        $this->notifyObservers($this);
    }
}
