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
    $usrName = ($request->getParsedBody())["usrName"];
    $this->logger->info($usrName);
    $storeData = checkNewUsrName($usrName);
    $responseJson = json_encode($storeData);
    $response->getBody()->write($responseJson);

    return $response;
});

$app->POST('/login/checkLogin', function (Request $request, Response $response) {

    $this->logger->info('Check the usrName and usrPassword.');
    $usrName = ($request->getParsedBody())["usrName"];
    $usrPassword = ($request->getParsedBody())["usrPassword"];
    $this->logger->info("The usrName is: " . $usrName);
    $this->logger->info("The usrPassword is: " . $usrPassword);
    $storeData = checkUsr($usrName, $usrPassword);
    $responseJson = json_encode($storeData);
    $response->getBody()->write($responseJson);

    return $response;
});

$app->POST('/login/create', function (Request $request, Response $response) {

    $this->logger->info('create new usr.');
    $usrName = ($request->getParsedBody())["usrName"];
    $usrPassword = ($request->getParsedBody())["usrPassword"];
    $usrEmail = ($request->getParsedBody())["usrEmail"];
    $this->logger->info("The usrName is: " . $usrName);
    $this->logger->info("The usrPassword is: " . $usrPassword);
    $this->logger->info("The usrEmail is: " . $usrEmail);
    $storeData = createUsr($usrName, $usrPassword, $usrEmail);
    $responseJson = json_encode($storeData);
    $response->getBody()->write($responseJson);

    return $response;
});