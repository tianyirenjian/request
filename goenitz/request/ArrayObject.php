<?php
/**
 * Created by PhpStorm.
 * User: tianyi
 * Date: 3/19/2017
 * Time: 13:47
 */

namespace Goenitz\Request;


class ArrayObject
{
    public $data;

    function __construct(array $arrayData)
    {
        $this->data = $arrayData;
    }

    function __get($name)
    {
        if (isset($this->data[$name])) {
            return $this->data[$name];
        }
        return null;
    }
}