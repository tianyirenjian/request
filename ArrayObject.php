<?php
/**
 * Created by PhpStorm.
 * User: tianyi
 * Date: 3/19/2017
 * Time: 13:47
 */

namespace Goenitz\Request;


class ArrayObject implements \ArrayAccess
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

    public function toArray()
    {
        return $this->data;
    }

    /**
     * Whether a offset exists
     * @link http://php.net/manual/en/arrayaccess.offsetexists.php
     * @param mixed $offset <p>
     * An offset to check for.
     * </p>
     * @return boolean true on success or false on failure.
     * </p>
     * <p>
     * The return value will be casted to boolean if non-boolean was returned.
     * @since 5.0.0
     */
    public function offsetExists($offset)
    {
        return isset($this->data[$offset]);
    }

    /**
     * Offset to retrieve
     * @link http://php.net/manual/en/arrayaccess.offsetget.php
     * @param mixed $offset <p>
     * The offset to retrieve.
     * </p>
     * @return mixed Can return all value types.
     * @since 5.0.0
     */
    public function offsetGet($offset)
    {
        return $this->__get($offset);
    }

    public function offsetSet($offset, $value)
    {
        throw new \Exception($offset . ' is read-only.');
    }

    public function offsetUnset($offset)
    {
        throw new \Exception($offset . ' is read-only.');
    }
}