<?php

/**
 * 线性表 顺序存储
 * Class LineOrder
 */

class LineOrder
{
    private $data = [];
    private $length = 0;

    /**
     * 清空
     * @return bool
     */
    public function doEmpty()
    {
        unset($this->data);
        $this->length = 0;

        return true;
    }

    /**
     * 获取当前长度
     * @return int
     */
    public function getLength()
    {
        return $this->length;
    }

    /**
     * 判断是否为空
     * @return bool
     */
    public function isEmpty()
    {
        return 0 == $this->length;
    }

    /**
     * 获取指定下标的值
     * @param int $index
     * @return int|mixed
     */
    public function getValue($index = 0)
    {
        if (1 > $index || $index > $this->length) {
            return -1;
        }

        return $this->data[$index - 1];
    }

    /**
     * 指定下标设置值
     * @param int $index
     * @param int $value
     * @return bool
     */
    public function setValue($index = 0, $value = 0)
    {
        // 判断下标是否合法
        if (1 > $index) {
            return false;
        }

        // 如果下标大于当前长度 直接放到最后一位
        if ($index > $this->length) {
            $this->data[] = $value;

            $this->length += 1;

            return true;
        }

        for ($i = $this->length; $i >= $index; $i--) {
            $this->data[$i] = $this->data[$i - 1];
        }

        $this->data[$index - 1] = $value;

        $this->length += 1;

        return true;
    }
}
