<?php
declare(strict_types = 1);
require __DIR__ . '/../vendor/autoload.php';

use GuzzleHttp\Exception\RequestException;
use Src\HttpClientResponseEntity;
use Src\HttpClientFactory;
use Psr\Http\Message\ResponseInterface;

$baseUrl = 'http://api.moemoe.tokyo/anime/v1/master/2018/1';
$httpClient = HttpClientFactory::create();

try {
  $response = $httpClient->get($baseUrl);
//  print_r($response);

  $promise = $httpClient->getAsync($baseUrl);
  $promise->then(
    function (ResponseInterface $res) {
      $httpClientResponseEntity = new HttpClientResponseEntity(
        $res->getStatusCode(),
        $res->getHeaders(),
        json_decode($res->getBody()->getContents())
      );
      print_r($httpClientResponseEntity);
    },
    function (RequestException $e) {
      echo $e->getMessage().PHP_EOL;
      echo $e->getRequest()->getMethod();
    }
  );
  $promise->wait();
} catch (\GuzzleHttp\Exception\GuzzleException $e) {
  echo $e->getMessage();
}
