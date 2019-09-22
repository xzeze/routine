<?php

/**
 * 线性表
 * 顺序排列
 * 实现一个线性表的顺序存储 可以按照地址进行插入数据 更新 删除等操作
 * 顺序存储：在内存地址中 是有顺序且连续的一块数据
 */

class Line
{
    /**
     * 数据存储
     */
    private $item = [];

    /**
     *
     * @param int $position
     * @param int $data
     * @return bool
     */
    public function add($position = 0, $data = 0)
    {
        $length = $this->getLength();

        if ($position < 0 || $position > $length) {
            return false;
        }

        // 如果添加元素在尾部
        if ($position == $length) {
            $this->item[$length] = $data;
            return true;
        }

        // 添加的位置在其他位置 需要对数据进行移动
        for ($i = $length - 1; $i >= $position; $i--) {
            $this->item[$i + 1] = $this->item[$i];
        }

        $this->item[$position] = $data;

        return true;
    }

    /**
     * 删除固定位置位置上的元素
     * @param int $position
     * @return bool|mixed
     */
    public function del($position = 0)
    {
        // 获取数组长度
        $length = $this->getLength();

        // 要删除的下标在合法范围之内
        if ($position < 0 || $position > ($length - 1)) {
            return false;
        }

        // 获取要删除的数据
        $value = $this->item[$position];

        if ($position == ($length - 1)) { // 如果要删除的是最后一个元素
            unset($this->item[$position]);
            return $value;
        }

        // 要删除的数据不在最后一个元素
        for ($i = $position; $i < $length - 1; $i++) {
            $this->item[$i] = $this->item[$i + 1];
        }

        // 删除最后一个元素 因为整体前移 所以多出来一个空位
        unset($this->item[$length - 1]);

        return $value;
    }

    /**
     * 更新某个元素上的数据
     * @param int $position
     * @param int $data
     * @return bool|mixed
     */
    public function update($position = 0, $data = 0)
    {
        // 获取当前数组长度
        $length = $this->getLength();

        // 判断位置是否合法
        if ($position < 0 || $position > ($length - 1)) {
            return false;
        }

        // 获取之前的数据
        $oldData = $this->item[$position];

        // 跟新成最新的数据
        $this->item[$position] = $data;

        return $oldData;
    }

    /**
     * 通过位置获取数据
     * @param int $position
     * @return bool|mixed
     */
    public function getValueByIndex($position = 0)
    {
        // 获取数组长度
        $length = $this->getLength();

        if ($position < 0 || $position > ($length - 1)) {
            return false;
        }

        return $this->item[$position];
    }

    /**
     * 根据数据获取对应的下标
     * @param int $value
     * @return bool|int
     */
    public function getIndexByValue($value = 0)
    {
        $length = $this->getLength();

        // 位置默认值为假
        $index = false;

        for ($i = 0; $i < $length; $i++) {
            if ($value == $this->item[$i]) {
                $index = $i;
            }
        }

        return $index;
    }

    /**
     * 删除线性表
     * @return bool
     */
    public function clean()
    {
        unset($this->item);

        return true;
    }

    /**
     * 获取当前存储的长度
     * @return int
     */
    public function getLength()
    {
        return count($this->item);
    }

    /**
     * 查看线性表元素
     */
    public function show()
    {
        $length = $this->getLength();

        for ($i = 0; $i < $length; $i++) {
            echo $i . '-' . $this->item[$i] . PHP_EOL;
        }
    }
}
