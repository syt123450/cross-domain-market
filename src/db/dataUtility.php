<?php




//$ary = getData("db272.TopProduct", ['storeID' => 1, 'productID' => 1], ['projection' => ['rate' => 1, '_id' => 0]]);
//var_dump($ary);


/**
 * Function used to get all storeID with the storeName
 * @param $stores
 * @return array with structure:
 *  [
 *      [
 *          "storeID" : <id>,
 *          "storeName" : <storeName>
 *      ]
 *  ]
 */
    function getStoreNameList($stores){
        $ret = array();
        if ($stores !== null){
            foreach ($stores as $store){
                $store = json_decode(json_encode($store), true);
                $temp = array();
                $temp["storeID"] = $store["StoreID"];
                $temp["storeName"] = $store["StoreName"];
                $ret[] = $temp;
            }
        }
        return $ret;
    }

/**
 * Used to get All store related Information
 * @param $stores
 * @return array with structure:
 *  [
 *      [
 *          "storeID" : <id>,
 *          "storePicUrl" : <Store Banner Path>
 *          "storeName" : <storeName>
 *      ]
 *  ]
 */
    function getStoreData($stores){
        $ret = array();
        if ($stores !== null){
            foreach ($stores as $store){
                $store = json_decode(json_encode($store), true);
                $temp = array();
                $temp["storeID"] = $store["StoreID"];
                $temp["storePicUrl"] = $store["StoreLogoLarge"];
                $temp["storeName"] = $store["StoreName"];
                $ret[] = $temp;
            }
        }
        return $ret;
    }

/**
 * By checking storeID, find the specific store data
 * @param $stores   nested array contains all stores data
 * @param $storeID
 * @return mixed    array object contains target store data
 */
    function findTargetStore($stores, $storeID){
        foreach ($stores as $store){
            $store = json_decode(json_encode($store), true);
            if ($store["StoreID"] ==$storeID) {
                return $store;
            }
        }
    }

/**
 * Generate a banner array for the specified store
 * @param $store    array object contains all data of the specified store
 * @return array    generated array contains all banner path
 */
    function getStoreADList($store){
        $ret = array();

        foreach ($store['StoreBanner'] as $banner){
            $temp = array();
            $temp["adSrc"] = $banner;
            $ret[] =$temp;
        }

        return $ret;
    }

/**
 * Process top 5 products data for front-end use
 * @param $top5Products
 * @return array    nested array contains all top 5 products necessary data
 *  [
 *      [
 *          "commodityID" : <productID>,
 *          "commodityPicUrl" : <URL to product picture>,
 *          "commodityPrice" : <productPrice>,
 *          "commodityName" : <productName>,
 *          "commodityStore" : <product Host StoreName>,
 *          "commodityStoreID" : <product Host StoreID>,
 *      ]
 *  ]
 */
    function getTop5Data($top5Products){
        $ret = array();
        if ($top5Products !== null){
            foreach ($top5Products as $product){
                $product = json_decode(json_encode($product), true);
                $temp = array();
                $temp["commodityID"] = $product["productID"];
                $temp["commodityPicUrl"] = $product["smallPicUrl"];
                $temp["commodityPrice"] = $product["priceNew"];
                $temp["commodityName"] = $product["productName"];
                $temp["commodityStore"] = $product["storeName"];
                $temp["commodityStoreID"] = $product["storeID"];
                $ret[] = $temp;
            }
        }
        return $ret;
    }

/**
 * Process top 5 products data for front-end usage without any host store info
 * @param $top5Products
 * @return array
 *  [
 *      [
 *          "commodityID" : <productID>,
 *          "commodityPicUrl" : <URL to product picture>,
 *          "commodityPrice" : <productPrice>,
 *          "commodityName" : <productName>,

 *      ]
 *  ]
 */
    function getTop5DataNoStore($top5Products){
        $ret = array();
        if ($top5Products !== null){
            foreach ($top5Products as $product){
                $product = json_decode(json_encode($product), true);
                $temp = array();
                $temp["commodityID"] = $product["productID"];
                $temp["commodityPicUrl"] = $product["smallPicUrl"];
                $temp["commodityPrice"] = $product["priceNew"];
                $temp["commodityName"] = $product["productName"];
                $ret[] = $temp;
            }
        }
        return $ret;
    }

/**
 * By provided user information (userID), check the recent viewed products of the user
 * @param $user     UserID
 * @return array|mixed
 */
    function getRecentViewProducts($user){
        require_once ('mongoConn.php');
        // Catch general data first
        $recentViewedProducts = getData("db272.User", ['userID' => $user], ['projection' => ['recentViewed' => 1, '_id' => 0]]);

        // Catch the 1st object from returned array, i.e. the only one find from the database by the userID
        $recentViewedProducts = $recentViewedProducts[0];

        // Convert object to json then to php array
        if ($recentViewedProducts !== null) {
            $recentViewedProducts = json_decode(json_encode($recentViewedProducts), true);
        }

        // Catch the "recentViewed" array from the array
        $recentViewedProducts = $recentViewedProducts['recentViewed'];

        // Return the actual data array
        return $recentViewedProducts;
    }

/**
 * Process recent viewed data for front-end use
 * @param $recentViewedProducts
 * @param $size
 * @return array
 *  [
 *      [
 *          "commodityID" : <productID>,
 *          "commodityPicUrl" : <URL to product picture>,
 *          "commodityPrice" : <productPrice>,
 *          "commodityName" : <productName>,
 *          "commodityStore" : <product Host StoreName>,
 *          "commodityStoreID" : <product Host StoreID>,
 *      ]
 *  ]
 */
    function getRecentViewData($recentViewedProducts, $size){
        $ret = array();

        // Determine the size
        if (count($recentViewedProducts) >$size){
            $recentViewedProducts = array_slice($recentViewedProducts, 0, 5);
        }
        if ($recentViewedProducts !== null){
            foreach ($recentViewedProducts as $product){
                $product = json_decode(json_encode($product), true);
                $temp = array();
                $temp["commodityID"] = $product["productID"];
                $temp["commodityPicUrl"] = $product["smallPicUrl"];
                $temp["commodityPrice"] = $product["priceNew"];
                $temp["commodityName"] = $product["productName"];
                $temp["commodityStore"] = $product["storeName"];
                $temp["commodityStoreID"] = $product["storeID"];
                $ret[] = $temp;
            }
        }
        return $ret;
    }

/**
 * Process product list for front-end use (Raw data from CURL)
 * @param $productData
 * @return array
 *  [
 *      [
 *          "commodityID" : <productID>,
 *          "commodityPicUrl" : <URL to product picture>,
 *          "commodityPrice" : <productPrice>,
 *          "commodityName" : <productName>,
 *      ]
 *  ]
 */
    function getProductList($productData){
        $ret = array();
        $pList = json_decode($productData);

        foreach ($pList as $product){
            $product = json_decode(json_encode($product), true);
            $temp = array();
            $temp["commodityID"] = $product["productID"];
            $temp["commodityPicUrl"] = $product["smallPicUrl"];
            $temp["commodityPrice"] = $product["priceNew"];
            $temp["commodityName"] = $product["productName"];
            $ret[] = $temp;
        }

        return $ret;
    }

/**
 * @param $productData
 * @return array
 */
    function getProductDetails($productData){
        $ret = array();
        $pList = json_decode($productData);

        foreach ($pList as $product){
            $product = json_decode(json_encode($product), true);
            $temp = array();
            $temp["commodityID"] = $product["productID"];
            $temp["commodityPicUrl"] = $product["smallPicUrl"];
            $temp["commodityPrice"] = $product["priceNew"];
            $temp["commodityName"] = $product["productName"];
            $ret[] = $temp;
        }

        return $ret;
    }

    function getBasicProductData($productData, $storeUrl, $rate, $commentNum){
        $ret = array();
        $pList = json_decode($productData);
        $product = $pList[0];

        $ret["commodityID"] = $product["productID"];
        $ret["commodityName"] = $product["productName"];
        $ret["commodityPrice"] = $product["priceNew"];
        $ret["commodityPic"] = $storeUrl . $product["largePicUrl"];
        $ret["stock"] = $product["quantity"];
        $ret["commentNumber"] = $commentNum;
        $ret["averageRate"] = $rate;

        foreach ($pList as $product){
            $product = json_decode(json_encode($product), true);
            $temp = array();
            $temp["commodityID"] = $product["productID"];
            $temp["commodityPicUrl"] = $product["smallPicUrl"];
            $temp["commodityPrice"] = $product["priceNew"];
            $temp["commodityName"] = $product["productName"];
            $ret[] = $temp;
        }

        return $ret;
    }

/**
 * Catch product description and process with delimiter "&*&"
 * @param $productData
 * @return array    use delimiter to generate array from origin text contents
 *
 */
    function getDescriptionData($productData){
        $pList = json_decode($productData);
        $product = $pList[0];

        return (explode("&*&", $product["description"]));
    }

/**
 * Catch comment data
 * @param $comments
 * @return array
 *  [
 *      [
 *          "commodityInfo" : <in the format: By ***userName*** on ***timeStamp***>,
 *          "commentContent" : <Detailed comment content>,
 *      ]
 *  ]
 */
    function getCommentData($comments){
        $ret = array();

        foreach ($comments as $comment){
            $comment = json_decode(json_encode($comment), true);
            $temp = array();
            $temp["commentInfo"] = "By " . $comment["userName"] . " on " . $comment["timeStamp"];
            $temp["commentContent"] = $comment["description"];
            $ret[] = $temp;
        }

        return $ret;
    }








