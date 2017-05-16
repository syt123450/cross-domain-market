<?php
/**
 * Created by PhpStorm.
 * User: ss
 * Date: 2017/4/6
 * Time: 下午1:21
 */

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$app->POST('/top5/home', function (Request $request, Response $response) {

    $this->logger->info('GET top5 commodity information for homepage.');
    $top5KeyWord = ($request->getParsedBody())["keyWord"];
    $this->logger->info("The keyWord of top5 is: " . $top5KeyWord);
    $top5Data = getTopData($top5KeyWord);
    $responseJson = json_encode($top5Data);
    $response->getBody()->write($responseJson);

    return $response;

});

$app->POST('/top5/store', function (Request $request, Response $response) {

    $this->logger->info("GET top5 commodity information for specific store.");
    $top5KeyWord = ($request->getParsedBody())["keyWord"];
    $storeID = ($request->getParsedBody())["storeID"];

    $this->logger->info("The keyWord of top5 is: " . $top5KeyWord);
    $this->logger->info("The store id is: " . $storeID);

    $top5Data = getTop5DataOfStore($top5KeyWord, $storeID);

    $this->logger->info(count($top5Data));

    $responseJson = json_encode($top5Data);
    $this->logger->info($responseJson);
    $response->getBody()->write($responseJson);

    return $response;
});

?>