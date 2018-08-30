<?php
/**
 * Created by PhpStorm.
 * User: miraishigematsu
 * Date: 2018/08/30
 * Time: 13:13
 */
declare(strict_types = 1);

namespace Src;


class HttpClientFactory
{
  public static function create(array $config = []): HttpClientInterface {
    return new GuzzleHttpClient($config);
  }
}