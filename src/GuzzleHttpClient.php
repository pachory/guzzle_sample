<?php
/**
 * Created by PhpStorm.
 * User: miraishigematsu
 * Date: 2018/08/26
 * Time: 22:30
 */
declare(strict_types = 1);

namespace Src;

use GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Message\UriInterface;
use Psr\Http\Message\ResponseInterface;

/**
 * Guzzle のラッパークラス
 *
 * Class MyHttpClient
 *
 * Guzzle の以下のメソッドはマジックメソッドの __call() で
 * Guzzle->client->request か Guzzle->client->requestAsync() に
 * 振り分けられているっぽい。
 *
 * request() に振り分けられるメソッド達
 * - get(), head(), put(), post(), patch(), delete()
 *
 * requestAsync() に振り分けられるメソッド達
 * - getAsync(), headAsync(), putAsync(), postAsync(), patchAsync(), deleteAsync()
 *
 * 結局の所、request() か requestAsync() しか呼び出してないので、上記メソッドを使う場合は直接実行してやってもよさそう。
 *
 * @package Src
 */
class GuzzleHttpClient implements HttpClientInterface
{
  private $client = null;

  public function __construct(array $config = [])
  {
    $this->client = new \GuzzleHttp\Client($config);
  }

  /**
   * Guzzle->Client->get() のラッパー
   *
   * @param string|UriInterface $uri     URI object or string.
   * @param array               $options Request options to apply.
   *
   * @return HttpClientResponseEntity
   * @throws GuzzleException
   */
  public function get(string $uri = '', array $options = []): HttpClientResponseEntity {
    $response = $this->client->request('GET', $uri, $options);
    return $this->convertToResponseEntity($response);
  }

  /**
   * Guzzle->Client->getAsync() のラッパー
   *
   * @param string $uri
   * @param array $options $options Request options to apply.
   * @return \GuzzleHttp\Promise\PromiseInterface
   */
  public function getAsync(string $uri = '', array $options = []) {
    return $this->client->requestAsync('GET', $uri, $options);
  }

  /**
   * ResponseEntity の構造体へレスポンスの戻り値を変換する
   *
   * @param ResponseInterface $response
   * @return HttpClientResponseEntity
   */
  private function convertToResponseEntity(ResponseInterface $response): HttpClientResponseEntity {
    return new HttpClientResponseEntity(
      $response->getStatusCode(),
      $response->getHeaders(),
      $response->getBody()->getContents()
    );
  }

}