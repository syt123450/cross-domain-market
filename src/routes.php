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

// Require Dflydev/Fig-Cookies Library for cookie handling
require_once('../vendor/dflydev/fig-cookies/src/Dflydev/FigCookies/Cookie.php');
require_once('../vendor/dflydev/fig-cookies/src/Dflydev/FigCookies/Cookies.php');
require_once('../vendor/dflydev/fig-cookies/src/Dflydev/FigCookies/FigRequestCookies.php');
require_once('../vendor/dflydev/fig-cookies/src/Dflydev/FigCookies/FigResponseCookies.php');
require_once('../vendor/dflydev/fig-cookies/src/Dflydev/FigCookies/SetCookie.php');
require_once('../vendor/dflydev/fig-cookies/src/Dflydev/FigCookies/SetCookies.php');
require_once('../vendor/dflydev/fig-cookies/src/Dflydev/FigCookies/StringUtil.php');

require_once('controllers/restController.php');
require_once('controllers/pageLoadController.php');
require_once('controllers/top5Controller.php');
require_once('controllers/commodityController.php');
require_once ('controllers/loginController.php');
require_once ('controllers/storeController.php');

// To determine if to use mock
if ($app->getContainer()['mock']) {
    require_once('mock/mongoConn_mock.php');
    require_once('mock/getPageLoadData_mock.php');
    require_once('mock/getTop5Data_mock.php');
    require_once('mock/getStoreProduct_mock.php');
    require_once('mock/loginHandler_mock.php');
//    require_once('db/loginHandler.php');
    require_once ('mock/commodity_mock.php');
} else {
    require_once('db/mongoConn.php');
    require_once('db/curlConn.php');
    require_once('db/dataUtility.php');
    require_once('db/getPageLoadData.php');
    require_once('db/loginHandler.php');
}