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
//    $top5Products = getData("db272.TopProduct", [], ['sort' => ['viewed' => -1], 'limit' => 5]);
//    $top5Data = getTopData($top5Products);
    $top5Data = getTop5Data("");

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

function getIndexPageLoadDataWithoutUserID() {
    // Get all store related data
    $stores = getAllData("db272.Store");
    $storeNameList = getStoreNameList($stores);
    $storeData = getStoreData($stores);

    // Get all Top 5 data
//    $top5Products = getData("db272.TopProduct", [], ['sort' => ['viewed' => -1], 'limit' => 5]);
//    $top5Data = getTopData($top5Products);
    $top5Data = getTop5Data("");

    $indexLoadData = array(
        "storeNameList" => $storeNameList,
        "top5Data" => $top5Data,
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
    $productList = getProductList($targetStore["Domain"], $productData);

    //total number of the product
    $storeProductNumber = count($productList);

    // Default to return as the pageID=1
    $productList = getDisplayProductList($productList, 1, $storeProductNumber);

    $top5Products = getData("db272.TopProduct", ['storeID' => (int)$storeID], ['sort' => ['viewed' => -1], 'limit' => 3]);
    $top5DataNoStore = getTopDataNoStore($top5Products);

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

    // Get Store data
    $stores = getAllData("db272.Store");
    $storeNameList = getStoreNameList($stores);

    // Find the target store data by ID
    $targetStore =  findTargetStore($stores, $storeID);

    // Collection product information from both sub-site and main database
    // Curl sub-site for detailed information
    $productData = curlData($targetStore["ProductList"] . "?productID=" . $commodityID);

    /* Try to catch product data from DB */
    $product_db = getData("db272.TopProduct", ['storeID' => (int)$storeID, 'productID' => (int)$commodityID], ['projection' => ['_id' => 0]]);
    if (empty($product_db)){
        // Empty, then init
        $viewed = 0;
        $rated = 0;
        $rate_avg =0;
        $rate_like =0;
        $rate_price =0;
        $rate_quality =0;
        $comments = array();
    }
    else {
        // Existed, catch from existed
        $product_db = json_decode(json_encode($product_db[0]), true);
        $viewed = $product_db["viewed"];
        $rated = $product_db["rated"];
        $rate_avg = $product_db["rate_avg"];
        $rate_like = $product_db["rate_like"];
        $rate_price = $product_db["rate_price"];
        $rate_quality = $product_db["rate_quality"];
        $comments = $product_db["comment"];
    }



    /* Update product viewed history in DB */
    $pList = json_decode($productData);
    $product = json_decode(json_encode($pList[0]), true);

    // Update viewed history on TopProduct
    $collectionName = "db272.TopProduct";
    $filter = [ 'storeID' => (int)$storeID, 'productID' => (int)$commodityID ];
    $sets = [
        "storeID" => (int)$targetStore["StoreID"],
        "storeName" => $targetStore["StoreName"],
        "productID" => (int)$product["productID"],
        "productName" => $product["productName"],
        "priceNew" => (float)$product["priceNew"],
        "largePicUrl" => $targetStore["Domain"] . $product["largePicUrl"],
        "smallPicUrl" => $targetStore["Domain"] . $product["smallPicUrl"],
        "viewed" => (int)($viewed +1),
        "rated" => (int)$rated,
        "rate_avg" => (float)$rate_avg,
        "rate_like" => (float)$rate_like,
        "rate_price" => (float)$rate_price,
        "rate_quality" => (float)$rate_quality,
        "comment" => $comments
    ];
    upsertData($collectionName, $filter, $sets);


    /* Prepare Data for return  */
    // Generate basic commodity information
    $basicCommodityInfo = getBasicProductData($productData, $targetStore["Domain"], $rate_avg, count($comments));

    // Generate description data
    $descriptionData = getDescriptionData($productData);

    // Fix to 5 comment
//    $commentData = getComments($storeID, $commodityID, 1, 5);
    $comments = array_reverse($comments);
    $commentNum = count($comments);
    if (count($comments) >5){
        $comments = array_slice($comments, 0, 5);
    }
    $commentData = getCommentData($comments);


    $commodityLoadData = array(
        "storeNameList" => $storeNameList,
        "basicCommodityInfo" => $basicCommodityInfo,
        "descriptionData" => $descriptionData,
        "commentNumber" => $commentNum,
        "commentData" => $commentData,
        "averageRate" => $rate_avg
    );

    return $commodityLoadData;
}