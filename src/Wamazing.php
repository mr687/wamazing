<?php

namespace Mr687\Wamazing;

use Exception;
use Illuminate\Support\Str;

class Wamazing
{
    public function __call($method, $args)
    {
        return $this->make($method);
    }

    public function __get($name)
    {
        return $this->make($name);
    }

    public function make($name)
    {
        $class = "Mr687\\Wamazing\\Classes\\" . Str::studly($name);
        if (class_exists($class))
            return new $class();
        throw new Exception("Error: Undefined method.");
    }
}
