<?php
/**
 * Created by PhpStorm.
 * User: ss
 * Date: 2017/4/6
 * Time: 下午1:26
 */

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use Dflydev\FigCookies\Cookie;
use Dflydev\FigCookies\SetCookie;
use Dflydev\FigCookies\FigRequestCookies;
use Dflydev\FigCookies\FigResponseCookies;

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
    $userData = checkUsr($userInfo, $userPassword);
    if ($userData['checkResult'] ==true){
        $userAry = $userData['checkMessage'];

        $response = FigResponseCookies::set($response, SetCookie::create('userID')
            ->withValue($userAry['userID'])
            ->withPath('/')
        );
        $response = FigResponseCookies::set($response, SetCookie::create('userName')
            ->withValue($userAry['userName'])
            ->withPath('/')
        );
    }
    $responseJson = json_encode($userData);
    $response->getBody()->write($responseJson);

    return $response;
});

$app->POST('/login/checkThirdParty', function (Request $request, Response $response) {

    $this->logger->info('User Third Party Login.');
    $uniqueID = ($request->getParsedBody())["uniqueID"];

    $this->logger->info("The uniqueID is: " . $uniqueID);

    $userData = handleThirdPartyLogin($uniqueID);

    try {
        $userAry = $userData['checkMessage'];
        if (isEmpty($userAry)){
            $userAry = $userData['createMessage'];
        }
    } catch (Exception $what){
        $userAry = $userData['createMessage'];
    }

    $response = FigResponseCookies::set($response, SetCookie::create('userID')
        ->withValue($userAry['userID'])
        ->withPath('/')
    );
    $response = FigResponseCookies::set($response, SetCookie::create('userName')
        ->withValue($uniqueID)
        ->withPath('/')
    );

    $responseJson = json_encode($userData);
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

    $msg = $storeData["createMessage"];
    $userID = $msg["userID"];
    $response = FigResponseCookies::set($response, SetCookie::create('userID')
        ->withValue($userID)
        ->withPath('/')
    );
    $response = FigResponseCookies::set($response, SetCookie::create('userName')
        ->withValue($userName)
        ->withPath('/')
    );

    $responseJson = json_encode($storeData);
    $response->getBody()->write($responseJson);

    return $response;
});

$app->GET('/login/logout', function(Request $request, Response $response) {

    $this->logger->info("Deleting the cookie of user...");

    $response = FigResponseCookies::set($response, SetCookie::create('userID')
        ->withValue(-1)
        ->withExpires('Tue, 15-Jan-2013 21:47:38 GMT')
        ->withPath('/')
    );
    $response = FigResponseCookies::set($response, SetCookie::create('userName')
        ->withValue("")
        ->withExpires('Tue, 15-Jan-2013 21:47:38 GMT')
        ->withPath('/')
    );

    $this->logger->info("Deletion Complete.");

    //do some to response to delet the cookie
    return $response;
});