<?php

/**
 * 逆波兰算法
 */

/**
 * 首先实现一个栈 用来做后续的处理
 */
class Stack
{
    private $stack = [];
    private $top = -1;

    /**
     * 入栈操作
     * @param null $data 要存入的数据
     */
    public function push($data = null)
    {
        $this->stack[++$this->top] = $data;
    }

    /**
     * 出栈操作
     */
    public function pop()
    {
        if (0 > $this->top) {
            return false;
        }

        $curData = $this->stack[$this->top];

        unset($this->stack[$this->top]);

        $this->top--;

        return $curData;
    }

    /**
     * 查看数据
     */
    public function show()
    {
        var_dump($this->stack);
    }

    public function clear()
    {
        unset($this->stack);
        $this->top = -1;
    }

    public function isEmpty()
    {
        if (0 > $this->top) {
            return true;
        }

        return false;
    }
}

class Opera
{
    private $suffixOpera = null;
    private $operation = null;
    private $operationSymbol = ['+', '-', '*', '/'];

    public function __construct($operation = '')
    {
        $this->suffixOpera = new Stack();
        $this->operation = new Stack();

        $suffixOperation = $this->infixToSuffix($operation);
    }

    public function infixToSuffix($infixOperation = '')
    {
        $arr = [];

        $strLen = strlen($infixOperation);

        for ($i = 0; $i < $strLen; $i++) {
            if (empty(trim($infixOperation{$i}))) {
                continue;
            }

            if (in_array($infixOperation{$i}, $this->operationSymbol)) {
                // 判断栈顶是否有值
                if ($this->suffixOpera->isEmpty()) { // 为空
                    $this->suffixOpera->push($infixOperation{$i});
                } else { // 不为空
                    // 判断是否为括号
                    if ('(' == $infixOperation{$i}) {
                        $this->suffixOpera->push($infixOperation{$i});
                    } elseif (')' == $infixOperation{$i}) {

                    }
                }

            } else {
                $arr[] = $infixOperation{$i};
            }
        }
    }

    public function getRes()
    {

    }
}

$operation = new Opera('2 + 3 * (3 -2) + 1');
