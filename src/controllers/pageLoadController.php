<?php
/**
 * Created by PhpStorm.
 * User: ss
 * Date: 2017/3/31
 * Time: 下午4:52
 */

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use Dflydev\FigCookies\SetCookie;

$app->GET('/initialize/index', function (Request $request, Response $response) {

    $this->logger->info('GET indexPage information.');
    $userID = $request->getCookieParams()["userID"];

    $indexData = getIndexPageLoadData($userID);
    $responseJson = json_encode($indexData);

    $response->getBody()->write($responseJson);

    try {
        $this->logger->info(">>> 0 <<<");


        $setCookie = SetCookie::create('lu')
            ->withValue('Rg3vHJZnehYLjVg7qi3bZjzg')
            ->withExpires('Tue, 15-Jan-2013 21:47:38 GMT')
            ->withMaxAge(500)
            ->rememberForever()
            ->withPath('/')
            ->withDomain('.example.com')
            ->withSecure(true)
            ->withHttpOnly(true)
        ;

        $this->logger->info(">>> 1 <<<");

//        $setCookies = Dflydev\FigCookies\SetCookies::fromResponse($response);

        $this->logger->info(">>> 2 <<<");
    } catch(Exception $what) {
        $this->logger->info(">>> 3 <<<");
        $this->logger->info($what->getMessage());
    }

    return $response;
});

$app->POST('/initialize/store', function (Request $request, Response $response) {

    $this->logger->info('GET storePage information.');
    $storeID = ($request->getParsedBody())["storeID"];
    $this->logger->info($storeID);
    $storeData = getStorePageLoadData($storeID);
    $responseJson = json_encode($storeData);
    $response->getBody()->write($responseJson);

    return $response;
});

$app->POST('/initialize/commodity', function (Request $request, Response $response) {

    $this->logger->info('GET commodityPage information.');
    $storeID = ($request->getParsedBody())["storeID"];
    $commodityID = ($request->getParsedBody())["commodityID"];
    $this->logger->info($commodityID);
    $this->logger->info($storeID);
    $commodityData = getCommodityPageLoadData($storeID, $commodityID);
    $responseJson = json_encode($commodityData);
    $response->getBody()->write($responseJson);

    return $response;

});

$app->GET('/initialize/login', function (Request $request, Response $response) {
    $this->logger->info("Get loginPage data");
    $loginData = getLoginPageLoadData();
    $responseJson = json_encode($loginData);
    $response->getBody()->write($responseJson);

    return $response;
});

$app->GET('/initialize/contact', function (Request $request, Response $response) {

    $this->logger->info("Get contactPage data");
    $contactData = getContactPageLoadData();
    $responseJson = json_encode($contactData);
    $response->getBody()->write($responseJson);

    return $response;
});