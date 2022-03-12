<?php


namespace Linnzh\Utils\Bridge;


interface RemoteControllerInterface
{
    public function power(): void;
    public function volumeUp(): void;
    public function volumeDown(): void;
}
