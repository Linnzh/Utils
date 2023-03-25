<?php


namespace Linnzh\Utils\Algorithm;

/**
 * 栈 - Stack
 *
 * 栈是一种后进先出（LIFO）的数据结构，它只允许在栈顶插入和删除元素。
 * 栈可以用于括号匹配、函数调用等场景。
 */
class Stack
{
    private array $stack;
    /**
     * @var mixed|int 栈顶元素索引值
     */
    private mixed $top;

    public function __construct()
    {
        $this->stack = [];
        $this->top = -1;
    }

    /*
     * 入栈——将一个元素添加到栈顶
     */
    public function push(mixed $data)
    {
        $this->top++;
        $this->stack[$this->top] = $data;
    }

    /**
     * 出栈——将栈顶元素弹出并返回
     *
     * @return mixed
     */
    public function pop()
    {
        if ($this->top < 0) {
            throw new \Exception("Stack is empty.");
        }
        $data = $this->stack[$this->top];
        unset($this->stack[$this->top]);
        $this->top--;
        return $data;
    }

    /**
     * 返回栈顶元素但不将其弹出
     *
     * @return mixed
     */
    public function peek()
    {
        if ($this->top < 0) {
            throw new \Exception("Stack is empty.");
        }
        return $this->stack[$this->top];
    }

    public function isEmpty()
    {
        return $this->top < 0;
    }

    public function size()
    {
        return $this->top + 1;
    }
}
