<?php
/**
 * Created by PhpStorm.
 * User: tianyi
 * Date: 3/19/2017
 * Time: 13:13
 */

namespace Goenitz\Request;


class Request
{
    private $data;
    private $trim;
    private $blankToNull;

    function __construct($trim = true, $blankToNull = true)
    {
        $this->trim = $trim;
        $this->blankToNull = $blankToNull;

        $this->data['get'] = new ArrayObject($this->transform($_GET));
        $this->data['post'] = new ArrayObject($this->transform($_POST));
        $this->data['request'] = new ArrayObject($this->transform($_REQUEST));
        $this->data['server'] = new ArrayObject($this->transform($_SERVER));
        $this->data['cookie'] = new ArrayObject($this->transform($_COOKIE));
        if (isset($_SESSION)) {
            $this->data['session'] = new ArrayObject($this->transform($_SESSION));
        }
    }

    private function transform($variables)
    {
        $array = [];
        foreach ($variables as $key => $value) {
            if (is_array($value)) {
                $value = $this->transform($value);
            }
            if (is_string($value)) {
                if ($this->trim) {
                    $value = trim($value);
                }
                if ($this->blankToNull && $value == '') {
                    $value = null;
                }
            }
            $array[$key] = $value;
        }
        return $array;
    }

    function __get($name)
    {
        if (isset($this->data[$name])) {
            return $this->data[$name];
        }
        return null;
    }

    function __call($name, $arguments)
    {
        if (in_array($name, ['get', 'post', 'request', 'server', 'cookie', 'session'])) {
            $value = $this->data[$name]->{$arguments[0]};
            if (is_null($value) && isset($arguments[1])) {
                $value = $arguments[1];
            }
            return $value;
        }
        return null;
    }
}