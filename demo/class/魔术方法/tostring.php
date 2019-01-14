<?php

/**
 * __tostring()
 * 当对象被输出的时候调用
 */

class Student{
    public function __toString()
    {
        return "This is A Student Object,can't be echo";
        // TODO: Implement __toString() method.
    }
}

$ret=new Student();
echo $ret;
