<?php
/**
 * Created by PhpStorm.
 * User: ss
 * Date: 2017/4/6
 * Time: 下午1:26
 */

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$app->POST('/login/checkName', function (Request $request, Response $response) {

    $this->logger->info('Check the name user want to register.');
    $usrName = ($request->getParsedBody())["userName"];
    $this->logger->info($usrName);
    $storeData = checkNewUsrName($usrName);
    $responseJson = json_encode($storeData);
    $response->getBody()->write($responseJson);

    return $response;
});

$app->POST('/login/checkLogin', function (Request $request, Response $response) {

    $this->logger->info('Check the userInfo and userPassword.');
    $userInfo = ($request->getParsedBody())["userInfo"];
    $userPassword = ($request->getParsedBody())["userPassword"];
    $this->logger->info("The userInfo is: " . $userInfo);
    $this->logger->info("The userPassword is: " . $userPassword);
    $storeData = checkUsr($userInfo, $userPassword);
    $responseJson = json_encode($storeData);
    $response->getBody()->write($responseJson);

    return $response;
});

$app->POST('/login/create', function (Request $request, Response $response) {

    $this->logger->info('create new user.');
    $userName = ($request->getParsedBody())["userName"];
    $userPassword = ($request->getParsedBody())["userPassword"];
    $userEmail = ($request->getParsedBody())["userEmail"];
    $this->logger->info("The userName is: " . $userName);
    $this->logger->info("The userPassword is: " . $userPassword);
    $this->logger->info("The userEmail is: " . $userEmail);
    $storeData = createUsr($userName, $userPassword, $userEmail);
    $responseJson = json_encode($storeData);
    $response->getBody()->write($responseJson);

    return $response;
});