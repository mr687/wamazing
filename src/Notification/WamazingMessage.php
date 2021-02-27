<?php

namespace Mr687\Wamazing\Notification;

use Illuminate\Support\Str;

class WamazingMessage
{
  protected $_to;
  protected $_content;
  protected $_device;

  public function __call($name, $arguments)
  {
    $method = strtolower(substr($name, 0, 3));
    $property = '_' . Str::camel(substr($name, 3));
    if (property_exists($this, $property)) {
      if ($method == 'get') {
        return $this->{$property};
      } elseif ($method == 'set') {
        $this->{$property} = $arguments[0];
        return $this;
      }
    }
  }
}
