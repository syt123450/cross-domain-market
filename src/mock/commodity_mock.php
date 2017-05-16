<?php
/**
 * Created by PhpStorm.
 * User: ss
 * Date: 2017/4/6
 * Time: 下午2:42
 */

function getComment($storeID, $commodityID, $pageID) {

    //use the storeID commodityID and pageID to get commentData

    $totalCommentNumber = 100;

    $commentData = array(
        array(
            "commentInfo" => "By F. M. Green on May 23, 2016",
            "commentContent" => "love the ball cap. Thre orange goes with the Home Depot apron. I just toss the cap in the washer on cold worth like colors and in the dryer, it can out fine, no shrinkage at all.The visited hellos keep the sun of my face, but I still use sunglasses and sunscreen. I also purchased the navy ball cap to look cool with my jersey baseball shirt which had navy sleeves."
        ),
        array(
            "commentInfo" => "By JAGF on March 13, 2016",
            "commentContent" => "I love, love, LOVE this cap! I wear a ll of the time whenever I feel like my hairs gross or isn't cooperating with me. It's so simple yet cute! I was actually planning to iron on a patch on the front of it, but I love it so much just plain that I might have to order another black cap so I can iron on my patch onto that one!"
        ),
        array(
            "commentInfo" => "By Matt on July 3, 2015",
            "commentContent" => "I try to write a lot of reviews but I don't know if I've ever written one about a hat. Well, this hat is awesome. A great subdued style and well constructed. It seems like ball caps are either tall, ugly trucker hats best suited for old men and hipsters, or they are unstructured dishrags that look sloppy.In my opinion this hat is the perfect in-between: structured to look sharp but not tall like a trucker hat. I was so happy with it I bought a second to keep on hand when/if I wear this one out. No joke."
        ),
        array(
            "commentInfo" => "By Norman on April 16, 2015",
            "commentContent" => "It's great just what I wanted! it is not as many people said shallow it almost touches my ears and I have a big head, though of normal proportions. It is not as some people said child sized they probably didn't understand that the excess strap tucks in a pocket (very nice touch). As a matter of fact it can go much bigger than my head to a comical degree."
        )
    );

    $commentPackage = array (
        "commentNumber" => $totalCommentNumber,
        "commentData" => $commentData,
        "pageID" => $pageID
    );

    return $commentPackage;
}

function addComment($userID, $storeID, $commodityID, $commentContent) {

    //use the commodityID, userID, commentContent to add comment

    $commentData = array(
        array (
            "commentInfo" => "By Norman on April 16, 2015",
            "commentContent" =>  $commentContent
        ),
        array(
            "commentInfo" => "By F. M. Green on May 23, 2016",
            "commentContent" => "love the ball cap. Thre orange goes with the Home Depot apron. I just toss the cap in the washer on cold worth like colors and in the dryer, it can out fine, no shrinkage at all.The visited hellos keep the sun of my face, but I still use sunglasses and sunscreen. I also purchased the navy ball cap to look cool with my jersey baseball shirt which had navy sleeves."
        ),
        array(
            "commentInfo" => "By JAGF on March 13, 2016",
            "commentContent" => "I love, love, LOVE this cap! I wear a ll of the time whenever I feel like my hairs gross or isn't cooperating with me. It's so simple yet cute! I was actually planning to iron on a patch on the front of it, but I love it so much just plain that I might have to order another black cap so I can iron on my patch onto that one!"
        ),
        array(
            "commentInfo" => "By Matt on July 3, 2015",
            "commentContent" => "I try to write a lot of reviews but I don't know if I've ever written one about a hat. Well, this hat is awesome. A great subdued style and well constructed. It seems like ball caps are either tall, ugly trucker hats best suited for old men and hipsters, or they are unstructured dishrags that look sloppy.In my opinion this hat is the perfect in-between: structured to look sharp but not tall like a trucker hat. I was so happy with it I bought a second to keep on hand when/if I wear this one out. No joke."
        )
    );

    $addResult = array(
        "addResult" => true,
        "addMessage" => "",
        "commentNumber" => 101,
        "commentData" => $commentData
    );

    return $addResult;
}

function addRate($userID, $storeID, $commodityID, $like, $price, $quality) {

    //use the commodityID, userID, rate to add rate

    $averageRate = 4;

    $addResult = array(
        "addResult" => true,
        "addMessage" => "",
        "averageRate" => $averageRate
    );

    return $addResult;
}

function addToCart($userID, $storeID, $commodityID) {

    //use the userID and commodityID to add the commodity for usr

    $addResult = array (
        "addResult" => true,
        "addMessage" => ""
    );

    return $addResult;
}