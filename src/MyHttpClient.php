<?php
/**
 * Created by PhpStorm.
 * User: miraishigematsu
 * Date: 2018/08/26
 * Time: 22:30
 */

namespace Src;

use GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Message\UriInterface;
use Psr\Http\Message\ResponseInterface;

class MyHttpClient
{
  private $client = null;

  public function __construct()
  {
    $this->client = new \GuzzleHttp\Client();
  }

  /**
   * @param string|UriInterface $uri     URI object or string.
   * @param array               $options Request options to apply.
   *
   * @return ResponseInterface
   * @throws GuzzleException
   */
  public function get(string $uri, array $options = []) {
    return $this->client->request('GET', $uri, $options);
  }
}