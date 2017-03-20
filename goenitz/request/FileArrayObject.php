<?php
/**
 * Created by PhpStorm.
 * User: tianyi
 * Date: 3/20/2017
 * Time: 21:26
 */

namespace Goenitz\Request;


class FileArrayObject extends ArrayObject
{
    /**
     * @param $name
     * @return File|null
     */
    function __get($name)
    {
        if (isset($this->data[$name])) {
            return new File($this->data[$name]);
        }
        return null;
    }

    public function toArray()
    {
        return array_map(function ($file) {
            return new File($file);
        }, $this->data);
    }
}