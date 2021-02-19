<?php

namespace Mr687\Wamazing\Classes;

use Mr687\Wamazing\Supports\Request;

class Chat extends Request
{
  protected $path = 'chat';
  protected $fields = [
    'to' => 'phone',
    'file' => 'file',
    'message' => 'html',
  ];

  public function sendText(array $data = [])
  {
    $this->_type = self::MESSAGE_TYPE_TEXT;
    return $this->post(
      "{$this->path}/send",
      $this->_data ?? $data
    );
  }

  public function sendDocument(array $data = [])
  {
    $this->_type = self::MESSAGE_TYPE_DOCUMENT;
    return $this->post(
      "{$this->path}/sendDocument",
      $this->_data ?? $data
    );
  }

  public function sendImage(array $data = [])
  {
    $this->_type = self::MESSAGE_TYPE_DOCUMENT;
    return $this->post(
      "{$this->path}/sendMedia",
      $this->_data ?? $data
    );
  }
}
