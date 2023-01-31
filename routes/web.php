<?php

use GuzzleHttp\Client;
use GuzzleHttp\Message\Request;
use GuzzleHttp\Message\Response;
use Guzzle\Http\Exception\BadResponseException;
use Illuminate\Support\Facades\Http;

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
  echo "1234";
    // return $router->app->version();
});


$router->get('/api/reports/bp/{bp_id}', function ($bp_id) {
  $client = new GuzzleHttp\Client();

  try {

    $url = "http://dstural24.ru/rest/830/53srxyraol4lsclh/bi.bp.json?bp_id=$bp_id&hookSeted";
    $response = $client->request('GET', $url);


    return response()->json([
      'code' => $response->getStatusCode(),
      'message' => $response->getBody()->getContents()
    ]);

  } catch (Guzzle\Http\Exception\BadResponseException $e) {
    return response()->json(['error' => [
      'code' => $response->getStatusCode(),
      'message' => $e->getMessage(),
    ]]);
  }

});

$router->get('/api/reports/deals/{category_id}', function ($category_id) {
  $client = new GuzzleHttp\Client();

  try {
    // $response = $client->request('GET', "http://numbersapi.com/".$id);
    $response = $client->request('GET', "http://dstural24.ru/rest/830/53srxyraol4lsclh/bi.deals.json?category_id=$category_id&hookSeted");


    return response()->json([
      'code' => $response->getStatusCode(),
      'message' => $response->getBody()->getContents()
    ]);

  } catch (Guzzle\Http\Exception\BadResponseException $e) {
    return response()->json(['error' => [
      'code' => $response->getStatusCode(),
      'message' => $e->getMessage(),
    ]]);
  }

});
