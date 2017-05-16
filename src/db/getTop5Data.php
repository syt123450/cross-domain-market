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

    // Based on keyword to search for proper result
    if ($top5KeyWord == "highestRated"){
        // Rated times from high to low
        $top5Products = getData("db272.TopProduct", [], ['sort' => ['rated' => -1], 'limit' => 5]);
    }
    else if ($top5KeyWord == "mostCommented"){
        // Rates value from high to low
        $top5Products = getData("db272.TopProduct", [], ['sort' => ['rate' => -1], 'limit' => 5]);
    }
    else if ($top5KeyWord == "highestPrice"){
        // Price from high to low
        $top5Products = getData("db272.TopProduct", [], ['sort' => ['priceNew' => -1], 'limit' => 5]);
    }
    else if ($top5KeyWord == "lowestPrice"){
        // Price from low to high
        $top5Products = getData("db272.TopProduct", [], ['sort' => ['priceNew' => 1], 'limit' => 5]);
    }
    else {
        // Default to return most viewed product
        $top5Products = getData("db272.TopProduct", [], ['sort' => ['viewed' => -1], 'limit' => 5]);
    }

    // Reformat the output
    $top5Data = getTopData($top5Products);

    return $top5Data;
}

function getTop5DataOfStore($top5KeyWord, $storeID) {

    // Based on keyword to search for proper result
    if ($top5KeyWord == "highestRated"){
        // Rated times from high to low
        $top5Products = getData("db272.TopProduct", ['storeID' => (int)$storeID], ['sort' => ['rated' => -1], 'limit' => 3]);
    }
    else if ($top5KeyWord == "mostCommented"){
        // Rates value from high to low
        $top5Products = getData("db272.TopProduct", ['storeID' => (int)$storeID], ['sort' => ['rate' => -1], 'limit' => 3]);
    }
    else if ($top5KeyWord == "highestPrice"){
        // Price from high to low
        $top5Products = getData("db272.TopProduct", ['storeID' => (int)$storeID], ['sort' => ['priceNew' => -1], 'limit' => 3]);
    }
    else if ($top5KeyWord == "lowestPrice"){
        // Price from low to high
        $top5Products = getData("db272.TopProduct", ['storeID' => (int)$storeID], ['sort' => ['priceNew' => 1], 'limit' => 3]);
    }
    else {
        // Default to return most viewed product
        $top5Products = getData("db272.TopProduct", ['storeID' => (int)$storeID], ['sort' => ['viewed' => -1], 'limit' => 3]);
    }

    // Reformat the output
    $top5Data = getTopDataNoStore($top5Products);

    return $top5Data;
}