<?php
// Routes
/*
 * Default return slim welcome page for not find stuff properly
 */
$app->get('/[{name}]', function ($request, $response, $args) {
    // Sample log message
    $this->logger->info("Slim-Skeleton '/' route");

    // Render index view
//    return $this->renderer->render($response, 'index.phtml', $args);
    return $this->renderer->render($response, 'index.html', $args);

});

require_once('controllers/restController.php');
require_once('controllers/pageLoadController.php');

// To determine if to use mock
if ($app->getContainer()['mock']) {
    require_once('mock/mongoConn_mock.php');
    require_once('mock/getPageLoadData_mock.php');
} else {
    require_once('db/mongoConn.php');
    require_once('db/getPageLoadData.php');
}