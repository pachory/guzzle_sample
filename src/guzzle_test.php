<?php
require __DIR__ . '/../vendor/autoload.php';

use Src\MyHttpClient;

$baseUrl = 'http://requestbin.fullcontact.com/1cvaiea1/';
$httpClient = new MyHttpClient();

try {
  $response = $httpClient->get($baseUrl);
  print_r($response);
} catch (\GuzzleHttp\Exception\GuzzleException $e) {
  echo $e->getMessage();
}
