<?php
/**
 * Created by PhpStorm.
 * User: Computador-01
 * Date: 29/08/2018
 * Time: 14:50
 */

namespace Hcode;


class Model
{
    private $values = [];

    public function __call($name, $arguments)
    {
        // TODO: Implement __call() method.
        $method = substr($name, 0, 3);
        $fieldName =substr($name, 3, strlen($name));

        switch ($method)
        {
            case "get":
                return (isset($this->values[$fieldName])) ? $this->values[$fieldName] : NULL;
            break;

            case "set":
                $this->values[$fieldName] = $arguments[0];
            break;

        }
    }

    public function setData($data = array())
    {
        foreach ($data as $key => $values) {
            $this-> {"set".$key}($values);
        }
    }
    public function getValues()
    {
        return $this->values;
    }
}