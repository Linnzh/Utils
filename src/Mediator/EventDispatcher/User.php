<?php


namespace Linnzh\Utils\Mediator\EventDispatcher;


class User
{
    public array $attributes = [];

    public function update($data): void
    {
        $this->attributes = array_merge($this->attributes, $data);
    }

    /**
     * All objects can trigger events.
     */
    public function delete(): void
    {
        echo "User: 我现在可以删除自己而不必担心存储库\n";
        (EventDispatcher::getInstance())->trigger('users:deleted', $this, $this);
    }
}
