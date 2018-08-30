<?php
/**
 * Created by PhpStorm.
 * User: miraishigematsu
 * Date: 2018/08/30
 * Time: 14:13
 */

namespace Src;


class HttpClientResponseEntity
{
  public $statusCode = 0;
  public $headers = [];
  public $body = [];

  public function __construct(int $statusCode, array $headers, array $body)
  {
    $this->statusCode = $statusCode;
    $this->headers = $headers;
    $this->body = $body;
  }
}