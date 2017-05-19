<?php
/**
 * Created by PhpStorm.
 * User: Chenhua Zhu
 * Date: 2017/5/5 13:00
 */

/* In case we don't have all requirements */
require_once('mongoConn.php');
require_once('curlConn.php');
require_once('dataUtility.php');

/**
 * Find proper product information to feedback front-end
 * @param $storeID
 * @param $pageID
 * @return array
 */
function getProductData($storeID, $pageID) {

    //use the storeID and pageID to get productList and total product data

    // Get all store data
    $stores = getAllData("db272.Store");

    // Find the target store data by ID
    $targetStore =  findTargetStore($stores, $storeID);

    // Find product information
    $productData = curlData($targetStore["ProductList"]);
    $productList = getProductList($targetStore["Domain"], $productData);

    //total number of the product
    $storeProductNumber = count($productList);

    $productList = getDisplayProductList($productList, $pageID, $storeProductNumber);

    $productListData = array (
        "productNumber" => $storeProductNumber,
        "pageID" => $pageID,
        "productList" => $productList
    );

    return $productListData;
}