<?php

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

use Illuminate\Http\Request;

$app->get('/', function (Request $req) {
    $data = $req->all();
    if (isset($data['flow'])) {
        $data['flow'] .= ' middle ->';
    } else {
        $data['flow'] = ' middle ->';
    }

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'http://docker.backend');

    try {
        $response = curl_exec($ch);
    } catch (Exception $e) {
        return $e->getMessage();
    }

    curl_close($ch);

    return json_decode($response);
});
