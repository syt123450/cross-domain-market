<?php
/**
 * Created by PhpStorm.
 * User: ss
 * Date: 2017/4/6
 * Time: 下午1:35
 */

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$app->POST('/store/product', function (Request $request, Response $response) {

    $this->logger->info("GET commodity List for store.");
    $storeID = ($request->getParsedBody())["storeID"];
    $pageID = ($request->getParsedBody())["pageID"];
    $this->logger->info("The page id is: " . $pageID);
    $this->logger->info("The store id is: " . $storeID);
    $top5Data = getProductData($storeID, $pageID);
    $responseJson = json_encode($top5Data);
    $response->getBody()->write($responseJson);

    return $response;
});