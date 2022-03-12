<?php


namespace Linnzh\Utils\Adapter;


class EmailNotification implements NotificationTarget
{

    private string $email;

    /**
     * EmailNotification constructor.
     * @param string|null $email
     */
    public function __construct(?string $email)
    {
        $email && $this->email = $email;
    }

    public function send(string $title, string $message): void
    {
        // 邮件发送代码
        echo "邮件已发送至：{$this->email}\n标题：{$title}\n内容：{$message}\n";
    }
}
