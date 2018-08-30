<?php
/**
 * Created by PhpStorm.
 * User: miraishigematsu
 * Date: 2018/08/30
 * Time: 13:21
 */
declare(strict_types=1);

namespace Src;


use Psr\Http\Message\ResponseInterface;
use GuzzleHttp\Exception\GuzzleException;

interface HttpClientInterface
{
  /**
   * Guzzle->Client->get() のラッパー
   *
   * @param string $uri
   * @param array $options Request options to apply.
   *
   * @return ResponseInterface
   * @throws GuzzleException
   */
  public function get(string $uri = '', array $options = []);

  /**
   * Guzzle->Client->head() のラッパー
   *
   * @param string $uri
   * @param array $options Request options to apply.
   *
   * @return HttpClientResponseEntity
   * @throws GuzzleException
   */
  public function head(string $uri = '', array $options = []);


  /**
   * Guzzle->Client->put() のラッパー
   *
   * @param string $uri
   * @param array $options Request options to apply.
   *
   * @return HttpClientResponseEntity
   * @throws GuzzleException
   */
  public function put(string $uri = '', array $options = []);

  /**
   * Guzzle->Client->post() のラッパー
   *
   * @param string|UriInterface $uri URI object or string.
   * @param array $options Request options to apply.
   *
   * @return HttpClientResponseEntity
   * @throws GuzzleException
   */
  public function post(string $uri = '', array $options = []);

  /**
   * Guzzle->Client->patch() のラッパー
   *
   * @param string|UriInterface $uri URI object or string.
   * @param array $options Request options to apply.
   *
   * @return HttpClientResponseEntity
   * @throws GuzzleException
   */
  public function patch(string $uri = '', array $options = []);


  /**
   * Guzzle->Client->delete() のラッパー
   *
   * @param string|UriInterface $uri URI object or string.
   * @param array $options Request options to apply.
   *
   * @return HttpClientResponseEntity
   * @throws GuzzleException
   */
  public function delete(string $uri = '', array $options = []);
}