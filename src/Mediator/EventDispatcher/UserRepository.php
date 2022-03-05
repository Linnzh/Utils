<?php


namespace Linnzh\Utils\Mediator\EventDispatcher;


class UserRepository implements ObserverInterface
{
    /**
     * @var array List of application's users.
     */
    private array $users = [];

    /**
     * Components can subscribe to events by themselves or by client code.
     */
    public function __construct()
    {
        (EventDispatcher::getInstance())->attach($this, 'users:deleted');
    }

    /**
     * Components can decide whether they'd like to process an event using its
     * name, emitter or any contextual data passed along with the event.
     */
    public function update(string $event, object $emitter, $data = null): void
    {
        switch ($event) {
            case 'users:deleted':
                if ($emitter === $this) {
                    return;
                }
                $this->deleteUser($data, true);
                break;
        }
    }

    // These methods represent the business logic of the class.

    public function initialize(string $filename): void
    {
        echo "数据仓: 从文件加载用户数据……\n";
        // ...
        (EventDispatcher::getInstance())->trigger('users:init', $this, $filename);
    }

    public function createUser(array $data, bool $silent = false): User
    {
        echo "数据仓: 正在创建一个用户\n";

        $user = new User();
        $user->update($data);

        $id = bin2hex(openssl_random_pseudo_bytes(16));
        $user->update(['id' => $id]);
        $this->users[$id] = $user;

        if (!$silent) {
            (EventDispatcher::getInstance())->trigger('users:created', $this, $user);
        }

        return $user;
    }

    public function updateUser(User $user, array $data, bool $silent = false): ?User
    {
        echo "数据仓: 正在更新一个用户……\n";

        $id = $user->attributes['id'];
        if (!isset($this->users[$id])) {
            return null;
        }

        $user = $this->users[$id];
        $user->update($data);

        if (!$silent) {
            (EventDispatcher::getInstance())->trigger('users:updated', $this, $user);
        }

        return $user;
    }

    public function deleteUser(User $user, bool $silent = false): void
    {
        echo "数据仓: 正在删除一个用户……\n";

        $id = $user->attributes['id'];
        if (!isset($this->users[$id])) {
            return;
        }

        unset($this->users[$id]);

        if (!$silent) {
            (EventDispatcher::getInstance())->trigger('users:deleted', $this, $user);
        }
    }
}
