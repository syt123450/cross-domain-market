<?php
/**
 * Created by PhpStorm.
 * User: Chenhua Zhu
 * Date: 2017/5/5 13:00
 */
function getProductData($storeID, $pageID) {

    //use the storeID and pageID to get productList and total product data

    $storeProductNumber = 100;

    $productList = array(
        array(
            "commodityID" => "ID7",
            "commodityPicUrl" => "../img/store/products/7.jpg",
            "commodityPrice" => "$22.46",
            "commodityName" => "John Waxed Mesh"
        ),
        array(
            "commodityID" => "ID6",
            "commodityPicUrl" => "../img/store/products/6.jpg",
            "commodityPrice" => "$18.35",
            "commodityName" => "Corpsman Hat US Navy"
        ),
        array(
            "commodityID" => "ID5",
            "commodityPicUrl" => "../img/store/products/5.jpg",
            "commodityPrice" => "$9.69",
            "commodityName" => "Winter Beanie Knit"
        ),
        array(
            "commodityID" => "ID4",
            "commodityPicUrl" => "../img/store/products/4.jpg",
            "commodityPrice" => "$12.33",
            "commodityName" => "Tilley LTM3 Airflo Hat"
        ),
        array(
            "commodityID" => "ID3",
            "commodityPicUrl" => "../img/store/products/3.jpg",
            "commodityPrice" => "$18.35",
            "commodityName" => "Corpsman Hat US Navy"
        ),
        array(
            "commodityID" => "ID2",
            "commodityPicUrl" => "../img/store/products/2.jpg",
            "commodityPrice" => "$25.69",
            "commodityName" => "Winter Beanie Knit"
        ),
        array(
            "commodityID" => "ID1",
            "commodityPicUrl" => "../img/store/products/1.jpg",
            "commodityPrice" => "$12.33",
            "commodityName" => "tilley LTM3 Airflo Hat"
        )
    );

    $productListData = array (
        "productNumber" => $storeProductNumber,
        "pageID" => $pageID,
        "productList" => $productList
    );

    return $productListData;
}