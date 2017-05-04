<?php
/**
 * Created by PhpStorm.
 * User: ss
 * Date: 2017/3/31
 * Time: 下午4:50
 */

/* In case we don't have all requirements */
require_once('mongoConn.php');
require_once('curlConn.php');
require_once('dataUtility.php');

/**
 *
 * @param $usrName
 * @return array
 */
function getIndexPageLoadData($userID) {
    // Get all store related data
    $stores = getAllData("db272.Store");
    $storeNameList = getStoreNameList($stores);
    $storeData = getStoreData($stores);

    // Get all Top 5 data
    $top5Products = getData("db272.TopProduct", [], ['sort' => ['viewed' => -1], 'limit' => 5]);
    $top5Data = getTop5Data($top5Products);

    // Get all recent view data
    $recentViewProducts = getRecentViewProducts($userID);
    $recentViewData = getRecentViewData($recentViewProducts, 5);

    $indexLoadData = array(
        "storeNameList" => $storeNameList,
        "top5Data" => $top5Data,
        "recentViewData" => $recentViewData,
        "storeData" => $storeData
    );

    return $indexLoadData;
}

function getStorePageLoadData($storeID) {
    //use the storeID to get data

    // Get all store data
    $stores = getAllData("db272.Store");
    $storeNameList = getStoreNameList($stores);

    // Find the target store data by ID
    $targetStore =  findTargetStore($stores, $storeID);

    // Catch different data based on the target store
    //store advertise picture, each store has three unique picture
    $storeADList = getStoreADList($targetStore);

    // Get product list by CURL
    // Find CURL URL from DB
    $productData = curlData($targetStore["ProductList"]);
    $productList = getProductList($productData);

    //total number of the product
    $storeProductNumber = count($productData);

    $top5Products = getData("db272.TopProduct", ['storeID' => $storeID], ['sort' => ['viewed' => -1], 'limit' => 3]);
    $top5DataNoStore = getTop5DataNoStore($top5Products);

    $storeLoadData = array(
        "productNumber" => $storeProductNumber,
        "storeNameList" => $storeNameList,
        "storeADList" => $storeADList,
        "productList" => $productList,
        "top5Data" => $top5DataNoStore
    );

    return $storeLoadData;
}

function getLoginPageLoadData() {
    $stores = getAllData("db272.Store");
    $storeNameList = getStoreNameList($stores);

    $loginLoadData = array(
        "storeNameList" => $storeNameList
    );

    return $loginLoadData;
}

function getContactPageLoadData() {

    $stores = getAllData("db272.Store");
    $storeNameList = getStoreNameList($stores);

    $contactLoadData = array(
        "storeNameList" => $storeNameList
    );

    return $contactLoadData;
}

function getCommodityPageLoadData($storeID, $commodityID) {
    //use $commodityID to get data

    $stores = getAllData("db272.Store");
    $storeNameList = getStoreNameList($stores);

    // Find the target store data by ID
    $targetStore =  findTargetStore($stores, $storeID);

    // Collection product information from both sub-site and main database
    // Curl sub-site for detailed information
    $productData = curlData($targetStore["ProductList"] . "?productID=" . $commodityID);
    // Search database for rating and comments
    $ratingData = getData("db272.TopProduct", ['storeID' => 1, 'productID' => 1], ['projection' => ['rate' => 1, '_id' => 0]]);
    $comments = getData("db272.TopProduct", ['storeID' => 1, 'productID' => 1], ['projection' => ['comment' => 1, '_id' => 0]]);
    $comments = $comments[0];
    $comments = json_decode(json_encode($comments), true);
    $comments = $comments["comment"];

    $basicCommodityInfo = getBasicProductData($productData, $targetStore["Domain"], $ratingData["rate"], count($comments));


    $descriptionData = getDescriptionData($productData);

    $commentData = getCommentData($comments);

    $commodityLoadData = array(
        "storeNameList" => $storeNameList,
        "basicCommodityInfo" => $basicCommodityInfo,
        "descriptionData" => $descriptionData,
        "commentData" => $commentData
    );

    return $commodityLoadData;
}