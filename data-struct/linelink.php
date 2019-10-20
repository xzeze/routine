<?php

/**
 * 定义一个数据格式 用来存储所有的数据
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
 * 线性表 链式存储
 * Class LineLink
 */
class LineLink
{
    private $head = null;

    /**
     * 初始化赋值头节点
     * LineLink constructor.
     */
    public function __construct()
    {
        $this->head = new Node();
    }

    /**
     * 获取当前长度
     * @return int
     */
    public function getLength()
    {
        $length = 0;
        $head = $this->head;

        while ($head->next) {
            $head = $head->next;
            $length++;
        }

        return $length;
    }

    /**
     * 添加节点
     * @param int $position
     * @param int $data
     * @return bool
     */
    public function add($position = 0, $data = 0)
    {
        $length = $this->getLength();

        if (0 > $position || $position > $length ) {
            return false;
        }

        $head = $this->head;

        for ($i = 0; $i < $position; $i++) {
            $head = $head->next;
        }

        $node = new Node($data);

        $node->next = $head->next;
        $head->next = $node;

        return true;
    }

    /**
     * 更新节点上的值
     * @param int $position
     * @param int $data
     * @return bool
     */
    public function update($position = 0, $data = 0)
    {
        $length = $this->getLength();
        $head = $this->head;

        if (0 > $position || $position > $length) {
            return false;
        }

        for ($i = 0; $i <= $position; $i++) {
            $head = $head->next;
        }

        $head->data = $data;

        return true;
    }

    /**
     * 删除某个节点
     * @param int $position
     * @return bool
     */
    public function del($position = 0)
    {
        $length = $this->getLength();
        $head = $this->head;

        if (0 > $position || $position > $length) {
            return false;
        }

        for ($i = 0; $i < $position; $i++) {
            $head = $head->next;
        }

        $deleteNode = $head->next;

        $head->next = $deleteNode->next;

        unset($deleteNode);

        return true;
    }

    /**
     * 展示所有节点数据
     */
    public function show()
    {
        $index = 0;
        $head = $this->head;

        while ($head->next) {
            echo $index.'-'.$head->next->data.PHP_EOL;

            $index++;
            $head = $head->next;
        }
    }
}
