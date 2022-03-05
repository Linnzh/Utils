<?php


namespace Linnzh\Utils\Mediator\EventDispatcher;


class Logger implements ObserverInterface
{
    private string $filename;

    public function __construct($filename)
    {
        $this->filename = $filename;
        if (file_exists($this->filename)) {
            unlink($this->filename);
        }
    }

    public function update(string $event, object $emitter, $data = null): void
    {
        $entry = date("Y-m-d H:i:s") . ": 事件 {$event} 数据：" . json_encode($data, JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT) . "\n";
        file_put_contents($this->filename, $entry, FILE_APPEND);

        echo "日志系统: 已将事件——{$event}——写入日志\n";
    }
}
