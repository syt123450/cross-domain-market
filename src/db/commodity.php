<?php
/**
 * Created by PhpStorm.
 * User: Chenhua Zhu
 * Date: 2017/5/5 11:46
 */

/**
 * Prepare comments for the front end.
 * @param $storeID
 * @param $commodityID
 * @param $pageID
 * @return array
 */
function getComment($storeID, $commodityID, $pageID) {

    //use the storeID commodityID and pageID to get commentData

    $commentPackage =getComments($storeID, $commodityID, $pageID, 5);

    return $commentPackage;
}

function addComment($userID, $storeID, $commodityID, $commentContent) {

    //use the commodityID, userID, commentContent to add comment

    $addResult = addNewComment($userID, $storeID, $commodityID, $commentContent, 5);

    return $addResult;
}

function addRate($userID, $storeID, $commodityID, $rate) {

    //use the commodityID, userID, rate to add rate

    $addResult = addNewRate($userID, $storeID, $commodityID, $rate);

    return $addResult;
}

function addToCart($userID, $storeID, $commodityID) {

    //use the userID and commodityID to add the commodity for usr
    // TBA
    $addResult = array (
        "addResult" => true,
        "addMessage" => ""
    );

    return $addResult;
}