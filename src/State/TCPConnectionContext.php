<?php


namespace Linnzh\Utils\State;


class TCPConnectionContext
{
    private TCPState $state;

    public function changeState(TCPState $state): void
    {
        $this->state = $state;
    }

    public function behavior()
    {
        // 调用当前状态的行为方法
        return $this->state->behavior($this);
    }

    public function established(): void
    {
        $this->state = TCPEstablishedState::getInstance();
    }

    public function listen(): void
    {
        $this->state = TCPListenState::getInstance();
    }

    public function closed(): void
    {
        $this->state = TCPClosedState::getInstance();
    }
}
