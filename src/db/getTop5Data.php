<?php
/**
 * Created by PhpStorm.
 * User: Chenhua Zhu
 * Date: 2017/5/5 13:01
 */

/**
 * @param $top5KeyWord
 * @return array
 *
 * top5 data has 5 type of keyWord:
 * 1.mostViewed
 * 2.highestRated
 * 3.highestPrice
 * 4.lowestPrice
 * 5.mostCommented
 */

function getTop5Data($top5KeyWord) {

    //use the top5KeyWord to get top5 data

    $top5Data = array(
        array(
            "commodityID" => "ID5",
            "commodityPicUrl" => "img/home/top5/5.jpg",
            "commodityPrice" => "$24.95",
            "commodityName" => "Barmah Leather Hat",
            "commodityStore" => "By SHOP ADIDAS"

        ),
        array(
            "commodityID" => "ID4",
            "commodityPicUrl" => "img/home/top5/4.jpg",
            "commodityPrice" => "$22.46",
            "commodityName" => "John Waxed Mesh",
            "commodityStore" => "By SHOP NIKE"

        ),
        array(
            "commodityID" => "ID3",
            "commodityPicUrl" => "img/home/top5/3.jpg",
            "commodityPrice" => "$18.35",
            "commodityName" => "Corpsman Hat US Navy",
            "commodityStore" => "By SHOP LI-NING"
        ),
        array(
            "commodityID" => "ID2",
            "commodityPicUrl" => "img/home/top5/2.jpg",
            "commodityPrice" => "$25.69",
            "commodityName" => "Winter Beanie Knit",
            "commodityStore" => "By SHOP 361"
        ),
        array(
            "commodityID" => "ID1",
            "commodityPicUrl" => "img/home/top5/1.jpg",
            "commodityPrice" => "$12.33",
            "commodityName" => "Tilley LTM3 Airflo Hat",
            "commodityStore" => "By SHOP PUMA"
        ),
    );

    return $top5Data;
}

function getTop5DataOfStore($top5KeyWord, $storeID) {

    //use the top5KeyWord and storeID to get data

    $top5Data = array(
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

    return $top5Data;
}