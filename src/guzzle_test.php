<?php
declare(strict_types = 1);
require __DIR__ . '/../vendor/autoload.php';

use Src\HttpClientFactory;

$baseUrl = 'http://api.moemoe.tokyo/anime/v1/master/2018/1';
$httpClient = HttpClientFactory::create();

try {
  $response = $httpClient->get($baseUrl);
  print_r($response);
} catch (\GuzzleHttp\Exception\GuzzleException $e) {
  echo $e->getMessage();
}
