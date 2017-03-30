<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

/*
 * GET test function
 */
$app->GET('/hello/{name}', function (Request $request, Response $response) {
    $this->logger->info('GET hello {name} test api');
    $name = $request->getAttribute('name');
    $this->logger->info('name:'.$name);
    $response->getBody()->write("Hello, $name! It's ".date('Y-m-d H:i:s'));

    phpinfo();

    return $response;
});

/*
 * GET function used to test mongodb connecion
 * it returns one collection that existed in the db
 */
$app->GET('/api/get', function ($request, $response) {
    $this->logger->info('GET api database connection test');

    $response->getBody()->write(json_encode(getTestResult()));
//    $response->getBody()->write(getTestResult());

    echo $this->mongodb->getHost();
    return $response;
});

/*
 * POST function used to test mongodb connection
 */
$app->POST('/api/post', function ($request, $response) {
    $this->logger->info('POST api database connection test');

    $i_num = $request->getParsedBody()['i_num'];
//    $this->logger->info('i_num:'.$i_num);
//    $response->getBody()->write('the parameter is '.$i_num.' </br>');

    $response->getBody()->write(json_encode(getINumGreater(intval($i_num))));   // use intval() to conform an int parameter

    return $response;
});

/*
 * POST function used to test mongodb connection
 */
$app->POST('/api/posta', function ($request, $response) {
    $this->logger->info('POST api database connection test');

    $i_num = $request->getParsedBody()['i_num'];
//    $i_num +=$i_num;
    $this->logger->info('i_num:'.$i_num);
    $response->getBody()->write('parameter $i_num is '.$i_num);

    return $response;
});
