<?php

namespace Mr687\Wamazing\Supports;

use Exception;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;
use Mr687\Wamazing\Traits\Serialize;

class Request
{
  use Serialize;

  protected $_client;
  protected $_headers;

  protected $_data;
  protected $_type;

  protected $uri = 'https://wamazing.asia/api/';

  const MESSAGE_TYPE_TEXT = 'text';
  const MESSAGE_TYPE_DOCUMENT = 'document';
  const MESSAGE_TYPE_IMAGE = 'image';

  public function __construct()
  {
    $this->_client = Http::baseUrl($this->uri);
    $this->_data['from'] = $this->phoneSerialize(config('wamazing.device'));
    $this->_headers = [
      'x-token-access' => config('wamazing.token'),
      'accept' => 'application/json'
    ];
    $this->_type = self::MESSAGE_TYPE_TEXT;
  }

  public function headers(array $headers = []): Request
  {
    $this->_headers = array_merge(
      $this->_headers ?? [],
      $headers
    );
    return $this;
  }

  public function post($method, array $fields = [])
  {
    foreach ($fields as $key => $value) {
      $this->{$key}($value);
    }

    return $this->result(
      $this->_client
        ->withHeaders($this->_headers)
        ->post($method, $this->_data)
    );
  }

  protected function result(Response $response)
  {
    return $response->throw()->json();
  }

  public function getFields()
  {
    return property_exists($this, 'fields') ?
      $this->fields : [];
  }

  public function __call($method, $args)
  {
    if (!$this->getFields())
      throw new Exception("Error: Property fields or method getFields is required.");

    if (
      array_key_exists($method, $this->getFields())
    ) {
      $this->_data[$method] = $this->format($args[0], $this->getFields()[$method]);
      return $this;
    }
  }

  protected function format($value, $format)
  {
    if ($format == 'phone')
      return $this->phoneSerialize($value);
    if ($format == 'html')
      return $this->htmlSerialize($value);
    return $value;
  }
}
