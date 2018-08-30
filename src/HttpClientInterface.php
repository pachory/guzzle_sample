<?php
/**
 * Created by PhpStorm.
 * User: miraishigematsu
 * Date: 2018/08/30
 * Time: 13:21
 */
declare(strict_types = 1);

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
  public function getAsync(string $uri = '', array $options = []);
}