<?php
/**
 * Created by PhpStorm.
 * User: Chenhua Zhu
 * Date: 2017/5/15 13:32
 */

$isFromMock = 0;
echo ("<br/>");
if ($isFromMock ==1) {
    require_once('../src/mock/mongoConn_mock.php');
    require_once('../src/mock/getPageLoadData_mock.php');
    require_once('../src/mock/getTop5Data_mock.php');
    require_once('../src/mock/getStoreProduct_mock.php');
    require_once('../src/mock/loginHandler_mock.php');
    require_once ('../src/mock/commodity_mock.php');
    echo ("It's from MOCK.<br/>");
}
else {
    require_once('../src/db/mongoConn.php');
    require_once('../src/db/curlConn.php');
    require_once('../src/db/dataUtility.php');
    require_once('../src/db/getPageLoadData.php');
    require_once('../src/db/loginHandler.php');
    require_once('../src/db/commodity.php');
    require_once('../src/db/getStoreProduct.php');
    require_once('../src/db/getTop5Data.php');
    echo ("It's from PODUCTION.<br/>");
}

echo ("<br/><br/>");
$ary = createUsr("studentUser","cmpe272pw","zhu.chenhua@sjsu.edu");
var_dump($ary);