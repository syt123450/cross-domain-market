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
            "storeID" => "storeID1",
            "commodityID" => "ID1",
            "commodityPicUrl" => "img/home/top5/1.jpg",
            "commodityPrice" => "$12.33",
            "commodityName" => "Tilley LTM3 Airflo Hat",
            "commodityStore" => "By SHOP PUMA"
        ),
        array(
            "storeID" => "storeID1",
            "commodityID" => "ID2",
            "commodityPicUrl" => "img/home/top5/2.jpg",
            "commodityPrice" => "$25.69",
            "commodityName" => "Winter Beanie Knit",
            "commodityStore" => "By SHOP 361"
        ),
        array(
            "storeID" => "storeID1",
            "commodityID" => "ID3",
            "commodityPicUrl" => "img/home/top5/3.jpg",
            "commodityPrice" => "$18.35",
            "commodityName" => "Corpsman Hat US Navy",
            "commodityStore" => "By SHOP LI-NING"
        ),
        array(
            "storeID" => "storeID1",
            "commodityID" => "ID4",
            "commodityPicUrl" => "img/home/top5/4.jpg",
            "commodityPrice" => "$22.46",
            "commodityName" => "John Waxed Mesh",
            "commodityStore" => "By SHOP NIKE"
        ),
        array(
            "storeID" => "storeID1",
            "commodityID" => "ID5",
            "commodityPicUrl" => "img/home/top5/5.jpg",
            "commodityPrice" => "$24.95",
            "commodityName" => "Barmah Leather Hat",
            "commodityStore" => "By SHOP ADIDAS"
        ),
    );

    $recentViewData = array(
        array(
            "storeID" => "storeID1",
            "commodityID" => "ID1",
            "commodityPicUrl" => "img/home/top5/1.jpg",
            "commodityPrice" => "$12.33",
            "commodityName" => "Tilley LTM3 Airflo Hat",
            "commodityStore" => "By SHOP PUMA"
        ),
        array(
            "storeID" => "storeID1",
            "commodityID" => "ID2",
            "commodityPicUrl" => "img/home/top5/2.jpg",
            "commodityPrice" => "$25.69",
            "commodityName" => "Winter Beanie Knit",
            "commodityStore" => "By SHOP 361"
        ),
        array(
            "storeID" => "storeID1",
            "commodityID" => "ID3",
            "commodityPicUrl" => "img/home/top5/3.jpg",
            "commodityPrice" => "$18.35",
            "commodityName" => "Corpsman Hat US Navy",
            "commodityStore" => "By SHOP LI-NING"
        ),
        array(
            "storeID" => "storeID1",
            "commodityID" => "ID4",
            "commodityPicUrl" => "img/home/top5/4.jpg",
            "commodityPrice" => "$22.46",
            "commodityName" => "John Waxed Mesh",
            "commodityStore" => "By SHOP NIKE"
        ),
        array(
            "storeID" => "storeID1",
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

function getStorePageLoadData($storeID)
{

    //use the storeID to get data

    //total number of the product
    $storeProductNumber = 100;

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

    //store advertise picture, each store has three unique picture
    $storeADList = array(
        array(
            "adSrc" => "../img/store/banner/banner-1.jpg"
        ),
        array(
            "adSrc" => "../img/store/banner/banner-2.jpg"
        ),
        array(
            "adSrc" => "../img/store/banner/banner-3.jpg"
        )
    );

    $productList = array(
        array(
            "commodityID" => "ID1",
            "commodityPicUrl" => "../img/store/products/1.jpg",
            "commodityPrice" => "$12.33",
            "commodityName" => "tilley LTM3 Airflo Hat"
        ),
        array(
            "commodityID" => "ID2",
            "commodityPicUrl" => "../img/store/products/2.jpg",
            "commodityPrice" => "$25.69",
            "commodityName" => "Winter Beanie Knit"
        ),
        array(
            "commodityID" => "ID3",
            "commodityPicUrl" => "../img/store/products/3.jpg",
            "commodityPrice" => "$18.35",
            "commodityName" => "Corpsman Hat US Navy"
        ),
        array(
            "commodityID" => "ID4",
            "commodityPicUrl" => "../img/store/products/4.jpg",
            "commodityPrice" => "$12.33",
            "commodityName" => "Tilley LTM3 Airflo Hat"
        ),
        array(
            "commodityID" => "ID5",
            "commodityPicUrl" => "../img/store/products/5.jpg",
            "commodityPrice" => "$9.69",
            "commodityName" => "Winter Beanie Knit"
        ),
        array(
            "commodityID" => "ID6",
            "commodityPicUrl" => "../img/store/products/6.jpg",
            "commodityPrice" => "$18.35",
            "commodityName" => "Corpsman Hat US Navy"
        ),
        array(
            "commodityID" => "ID7",
            "commodityPicUrl" => "../img/store/products/7.jpg",
            "commodityPrice" => "$22.46",
            "commodityName" => "John Waxed Mesh"
        )
    );

    $top5Data = array(
        array(
            "commodityID" => "ID1",
            "commodityPicUrl" => "../img/store/products/1.jpg",
            "commodityPrice" => "$12.33",
            "commodityName" => "tilley LTM3 Airflo Hat"
        ),
        array(
            "commodityID" => "ID2",
            "commodityPicUrl" => "../img/store/products/2.jpg",
            "commodityPrice" => "$25.69",
            "commodityName" => "Winter Beanie Knit"
        ),
        array(
            "commodityID" => "ID3",
            "commodityPicUrl" => "../img/store/products/3.jpg",
            "commodityPrice" => "$18.35",
            "commodityName" => "Corpsman Hat US Navy"
        )
    );

    $storeLoadData = array(
        "productNumber" => $storeProductNumber,
        "storeNameList" => $storeNameList,
        "storeADList" => $storeADList,
        "productList" => $productList,
        "top5Data" => $top5Data
    );

    return $storeLoadData;
}

function getLoginPageLoadData()
{

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

    $loginLoadData = array(
        "storeNameList" => $storeNameList
    );

    return $loginLoadData;
}

function getContactPageLoadData()
{

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

    $contactLoadData = array(
        "storeNameList" => $storeNameList
    );

    return $contactLoadData;
}

function getCommodityPageLoadData($storeID, $commodityID)
{
    //use $storeID and $commodityID to get data

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

    $basicCommodityInfo = array(
        "commodityID" => "ID1",
        "commodityName" => "John Deere Men's Waxed Cotton Camo Mesh",
        "commodityPrice" => "$ 18.28",
        "commodityPic" => "../img/products/1.jpg",
        "stock" => "5",
        "commentNumber" => "100", //total number of the product
        "averageRate" => "4.3"
    );

    $descriptionData = array(
        "Size: One Size",
        "",
        "Front: 65% Cotton, 35% Polyester; Back: 100% Nylon",
        "Imported",
        "Hand Wash",
        "This cap has a curved bill",
        "This cap has a snap closure",
        "",
        "John Deere baseball cap with waxed twill trademark logo and camo mesh back.",
        "",
        "Product Dimensions: 1 x 1 x 1 inches",
        "Shipping Weight: 1 pounds (View shipping rates and policies)",
        "Origin: China",
        "ASIN: B01N0CBB18",
        "Item model number: 13080332CH"
    );

    $commentData = array(
        array(
            "commentInfo" => "By Matt on July 3, 2015",
            "commentContent" => "I try to write a lot of reviews but I don't know if I've ever written one about a hat. Well, this hat is awesome. A great subdued style and well constructed. It seems like ball caps are either tall, ugly trucker hats best suited for old men and hipsters, or they are unstructured dishrags that look sloppy.In my opinion this hat is the perfect in-between: structured to look sharp but not tall like a trucker hat. I was so happy with it I bought a second to keep on hand when/if I wear this one out. No joke."
        ),
        array(
            "commentInfo" => "By JAGF on March 13, 2016",
            "commentContent" => "I love, love, LOVE this cap! I wear a ll of the time whenever I feel like my hairs gross or isn't cooperating with me. It's so simple yet cute! I was actually planning to iron on a patch on the front of it, but I love it so much just plain that I might have to order another black cap so I can iron on my patch onto that one!"
        ),
        array(
            "commentInfo" => "By Norman on April 16, 2015",
            "commentContent" => "It's great just what I wanted! it is not as many people said shallow it almost touches my ears and I have a big head, though of normal proportions. It is not as some people said child sized they probably didn't understand that the excess strap tucks in a pocket (very nice touch). As a matter of fact it can go much bigger than my head to a comical degree."
        ),
        array(
            "commentInfo" => "By F. M. Green on May 23, 2016",
            "commentContent" => "love the ball cap. Thre orange goes with the Home Depot apron. I just toss the cap in the washer on cold worth like colors and in the dryer, it can out fine, no shrinkage at all.The visited hellos keep the sun of my face, but I still use sunglasses and sunscreen. I also purchased the navy ball cap to look cool with my jersey baseball shirt which had navy sleeves."
        )
    );

    $commodityLoadData = array(
        "storeNameList" => $storeNameList,
        "basicCommodityInfo" => $basicCommodityInfo,
        "descriptionData" => $descriptionData,
        "commentData" => $commentData
    );

    return $commodityLoadData;
}