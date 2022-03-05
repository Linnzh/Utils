<?php


namespace Linnzh\Utils\State;


abstract class TCPState
{
    abstract public function changeState(TCPConnectionContext $context, TCPState $state): void;
}
