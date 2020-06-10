<?php

/**
 * 线性表-链式存储
 */

 /**
  * 存储数据的节点
  */
class Node 
{
    public $data = null;
    public $next = null;

    public function __construct($data = null)
    {
        $this->data = $data;
    }
}

/**
 * 链表存储
 */
class LineLink
{
    public $head = null;
    public $len = 0;

    public function __construct()
    {
        $this->head = new Node();
    }

    /**
     * 添加数据
     * @param $index 指定下标
     * @param $data 数据
     */
    public function add($index = 0, $data = null)
    {
        // 判断下标的合法性
        if (0 > $index || $this->len < $index) {
            return false;
        }

        // 开始的指针
        $pointer = $this->head;

        // 当前的下标
        $curIndex = 0;

        while ($pointer->next && $index > $curIndex) {
            $pointer = $pointer->next;
            $curIndex++;
        }

        $data->next = $pointer->next; // 原本的下一位 转移到当前的下一位
        $pointer->next = $data; // 把数据放到当前位置

        // 长度加一
        $this->len++;
    }

    public function del($index = 0)
    {
        // 判断下标是否合法
        if (0 > $index || $index > $this->len) {
            return false;
        }

        // 获取起点
        $pointer = $this->head;

        $curIndex = 0;

        while ($pointer->next && $index > $curIndex) {
            $pointer = $pointer->next;
            $curIndex++;
        }

        $nextPointer = $pointer->next;
        $pointer->next = $nextPointer->next;

        unset($nextPointer);

        $this->len--;
    }
    
    /**
     * 展示数据
     */
    public function show()
    {
        // 没有元素直接返回空
        if (1 > $this->len) {
            return null;
        }

        // 获取第一个元素
        $pointer = $this->head->next;

        // 开始的下标
        $index = 0;
        
        while ($pointer) {
            echo $index.'-'.$pointer->data.PHP_EOL;

            $pointer = $pointer->next;
            $index++;
        } 

        echo '---'.PHP_EOL;
    }
}