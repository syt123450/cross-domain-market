<?php




//$ary = getData("db272.TopProduct", ['storeID' => 1, 'productID' => 1], ['projection' => ['rate' => 1, '_id' => 0]]);
//var_dump($ary);


/**
 * Function used to get all storeID with the storeName
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

    function findTargetStore($stores, $storeID){
        foreach ($stores as $store){
            $store = json_decode(json_encode($store), true);
            if ($store["StoreID"] ==$storeID) {
                return $store;
            }
        }
    }

    function getStoreADList($store){
        $ret = array();

        foreach ($store['StoreBanner'] as $banner){
            $temp = array();
            $temp["adSrc"] = $banner;
            $ret[] =$temp;
        }

        return $ret;
    }

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

    function getTop5DataNoStoreName($top5Products){
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
                $ret[] = $temp;
            }
        }
        return $ret;
    }

    function getRecentViewProducts($user){
        require_once ('mongoConn.php');
        // Catch general data first
        $recentViewedProducts = getData("db272.User", ['userID' => $user], ['projection' => ['recentViewed' => 1, '_id' => 0]]);

        // Catch the 1st object from array
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

    function getDescriptionData($productData){
        $pList = json_decode($productData);
        $product = $pList[0];

        return (explode("&*&", $product["description"]));
    }

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








