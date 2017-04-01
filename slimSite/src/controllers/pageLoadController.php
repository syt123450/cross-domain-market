<?php
/**
 * Created by PhpStorm.
 * User: ss
 * Date: 2017/3/31
 * Time: 下午4:52
 */

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$app->GET('/initialize/index', function (Request $request, Response $response) {

    $usrName = $request->getCookieParams()["name"];

    $indexData = getIndexPageLoadData($usrName);
    $responseJson = json_encode($indexData);

    $response->getBody()->write($responseJson);

    return $response;
});

$app->GET('/initialize/store', function (Request $request, Response $response) {

});

$app->GET('/initialize/commodity', function (Request $request, Response $response) {

});