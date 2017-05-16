<?php
/**
 * Created by PhpStorm.
 * User: ss
 * Date: 2017/4/6
 * Time: 下午1:30
 */

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$app->POST('/commodity/addComment', function (Request $request, Response $response) {

    $this->logger->info('Add comment for commodity.');
    $userID = ($request->getCookieParams())["userID"];
    $storeID = ($request->getParsedBody())["storeID"];
    $commodityID = ($request->getParsedBody())["commodityID"];
    $commentContent = ($request->getParsedBody())["commentContent"];
    $this->logger->info("The userID is: " . $userID);
    $this->logger->info("The storeID is: " . $storeID);
    $this->logger->info("The commodity ID is: " .  $commodityID);
    $this->logger->info("The commentContent is: " . $commentContent);
    $addResult = addComment($userID, $storeID, $commodityID, $commentContent);
    $responseJson = json_encode($addResult);
    $response->getBody()->write($responseJson);

    return $response;
});

$app->POST('/commodity/addToCart', function (Request $request, Response $response) {

    $this->logger->info('Add commodity to shopping cart.');
    $userID = ($request->getCookieParams())["userID"];
    $storeID = ($request->getParsedBody())["storeID"];
    $commodityID = ($request->getParsedBody())["commodityID"];
    $this->logger->info("The usr name is: " . $userID);
    $this->logger->info("The storeID is: " . $storeID);
    $this->logger->info("The commodityID is: " . $commodityID);
    $addResult = addToCart($userID, $storeID, $commodityID);
    $responseJson = json_encode($addResult);
    $response->getBody()->write($responseJson);

    return $response;
});

$app->POST('/commodity/addRate', function (Request $request, Response $response) {

    $this->logger->info('Add rate for commodity.');
    $userID = ($request->getCookieParams())["userID"];
    $storeID = ($request->getParsedBody())["storeID"];
    $commodityID = ($request->getParsedBody())["commodityID"];
    $rate = ($request->getParsedBody())["rate"];
    $this->logger->info("The usr name is: " . $userID);
    $this->logger->info("The storeID is: " . $storeID);
    $this->logger->info("The commodityID is: " . $commodityID);
    $this->logger->info("The rate is: " . $rate);
    $addResult = addRate($userID, $storeID, $commodityID, $rate);
    $responseJson = json_encode($addResult);
    $response->getBody()->write($responseJson);

    return $response;
});

$app->POST('/commodity/getComment', function (Request $request, Response $response) {

    $this->logger->info('Get comment.');
    $storeID = ($request->getParsedBody())["storeID"];
    $commodityID = ($request->getParsedBody())["commodityID"];
    $pageID = ($request->getParsedBody())["pageID"];
    $this->logger->info("The storeID is: " . $storeID);
    $this->logger->info("The commodityID is: " . $commodityID);
    $this->logger->info("The pageID is: " . $pageID);
    $commentData = getComment($storeID, $commodityID, $pageID);
    $responseJson = json_encode($commentData);
    $response->getBody()->write($responseJson);

    return $response;
});