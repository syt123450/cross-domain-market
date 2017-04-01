<?php
/**
 * Created by PhpStorm.
 * User: ss
 * Date: 2017/3/31
 * Time: 下午4:50
 */

function getIndexPageLoadData($usrName)
{

    //use usrName to get data

    $storeNameList = array(
        array(
            "storeID" => "ID1",
            "storeName" => "SHOP PUMA"
        ),
        array(
            "storeID" => "ID2",
            "storeName" => "SHOP 361"
        ),
        array(
            "storeID" => "ID3",
            "storeName" => "SHOP LI-NING"
        ),
        array(
            "storeID" => "ID4",
            "storeName" => "SHOP NIKE"
        ),
        array(
            "storeID" => "ID5",
            "storeName" => "SHOP ADIDAS"
        )
    );

    $top5Data = array(
        array(
            "commodityID" => "ID1",
            "commodityPicUrl" => "img/home/top5/1.jpg",
            "commodityPrice" => "$12.33",
            "commodityName" => "Tilley LTM3 Airflo Hat",
            "commodityStore" => "By SHOP PUMA"
        ),
        array(
            "commodityID" => "ID2",
            "commodityPicUrl" => "img/home/top5/2.jpg",
            "commodityPrice" => "$25.69",
            "commodityName" => "Winter Beanie Knit",
            "commodityStore" => "By SHOP 361"
        ),
        array(
            "commodityID" => "ID3",
            "commodityPicUrl" => "img/home/top5/3.jpg",
            "commodityPrice" => "$18.35",
            "commodityName" => "Corpsman Hat US Navy",
            "commodityStore" => "By SHOP LI-NING"
        ),
        array(
            "commodityID" => "ID4",
            "commodityPicUrl" => "img/home/top5/4.jpg",
            "commodityPrice" => "$22.46",
            "commodityName" => "John Waxed Mesh",
            "commodityStore" => "By SHOP NIKE"
        ),
        array(
            "commodityID" => "ID5",
            "commodityPicUrl" => "img/home/top5/5.jpg",
            "commodityPrice" => "$24.95",
            "commodityName" => "Barmah Leather Hat",
            "commodityStore" => "By SHOP ADIDAS"
        ),
    );

    $recentViewData = array(
        array(
            "commodityID" => "ID1",
            "commodityPicUrl" => "img/home/top5/1.jpg",
            "commodityPrice" => "$12.33",
            "commodityName" => "Tilley LTM3 Airflo Hat",
            "commodityStore" => "By SHOP PUMA"
        ),
        array(
            "commodityID" => "ID2",
            "commodityPicUrl" => "img/home/top5/2.jpg",
            "commodityPrice" => "$25.69",
            "commodityName" => "Winter Beanie Knit",
            "commodityStore" => "By SHOP 361"
        ),
        array(
            "commodityID" => "ID3",
            "commodityPicUrl" => "img/home/top5/3.jpg",
            "commodityPrice" => "$18.35",
            "commodityName" => "Corpsman Hat US Navy",
            "commodityStore" => "By SHOP LI-NING"
        ),
        array(
            "commodityID" => "ID4",
            "commodityPicUrl" => "img/home/top5/4.jpg",
            "commodityPrice" => "$22.46",
            "commodityName" => "John Waxed Mesh",
            "commodityStore" => "By SHOP NIKE"
        ),
        array(
            "commodityID" => "ID5",
            "commodityPicUrl" => "img/home/top5/5.jpg",
            "commodityPrice" => "$24.95",
            "commodityName" => "Barmah Leather Hat",
            "commodityStore" => "By SHOP ADIDAS"
        ),
    );

    $storeData = array(
        array(
            "storeID" => "ID1",
            "storePicUrl" => "img/home/store/store1.jpg",
            "storeName" => "SHOP LI-NING"
        ),
        array(
            "storeID" => "ID2",
            "storePicUrl" => "img/home/store/store2.jpg",
            "storeName" => "SHOP NIKE"
        ),
        array(
            "storeID" => "ID3",
            "storePicUrl" => "img/home/store/store3.jpg",
            "storeName" => "SHOP PUMA"
        ),
        array(
            "storeID" => "ID4",
            "storePicUrl" => "img/home/store/store4.jpg",
            "storeName" => "SHOP ADIDAS"
        ),
        array(
            "storeID" => "ID5",
            "storePicUrl" => "img/home/store/store5.jpg",
            "storeName" => "SHOP 361"
        )
    );

    $indexLoadData = array(
        "storeNameList" => $storeNameList,
        "top5Data" => $top5Data,
        "recentViewData" => $recentViewData,
        "storeData" => $storeData

    );

    return $indexLoadData;
}