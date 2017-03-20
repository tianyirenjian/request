<?php
/**
 * Created by PhpStorm.
 * User: tianyi
 * Date: 3/20/2017
 * Time: 21:28
 */

namespace Goenitz\Request;


class File
{
    private $attr;
    function __construct(array $file)
    {
        $this->attr = $file;
    }

    public function getSize()
    {
        return $this->attr['size'];
    }

    public function getOriginalFileName()
    {
        return $this->attr['name'];
    }

    public function getOriginalExtension()
    {
        return pathinfo($this->getOriginalFileName(), PATHINFO_EXTENSION);
    }

    public function getTempName()
    {
        return $this->attr['tmp_name'];
    }

    public function getType()
    {
        return $this->attr['type'];
    }

    public function getError()
    {
        return $this->attr['error'];
    }

    public function save($to)
    {
        return @move_uploaded_file($this->getTempName(), $to);
    }
}