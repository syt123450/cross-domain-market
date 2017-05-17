<?php
require_once('mongoConn.php');
require_once('curlConn.php');

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
    function getTopData($top5Products){
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
    function getTopDataNoStore($top5Products){
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
        $recentViewedProducts = getData("db272.User", ['userID' => (int)$user], ['projection' => ['recentViewed' => 1, '_id' => 0]]);

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
    function getProductList($storeUrl, $productData){
        $ret = array();
        $pList = json_decode($productData);

        foreach ($pList as $product){
            $product = json_decode(json_encode($product), true);
            $temp = array();
            $temp["commodityID"] = $product["productID"];
            $temp["commodityPicUrl"] = $storeUrl . $product["smallPicUrl"];
            $temp["commodityPrice"] = $product["priceNew"];
            $temp["commodityName"] = $product["productName"];
            $ret[] = $temp;
        }

        return $ret;
    }

/**
 * Based on page number to return proper product list data
 * @param $productData
 * @param $pageID
 * @param $totalNumber
 * @return array
 */
    function getProductListByPage($productData, $pageID, $numberPerPage){
        $ret = array();

        $totalProductNumber = count($productData);
        $productData = array();

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

        $ret["productNumber"]=$totalProductNumber;
        $ret["pageID"]=$pageID;
        $ret["productList"]=$productData;

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
        $product = json_decode(json_encode($pList[0]), true);

        $ret["commodityID"] = $product["productID"];
        $ret["commodityName"] = $product["productName"];
        $ret["commodityPrice"] = $product["priceNew"];
        $ret["commodityPic"] = $storeUrl . $product["largePicUrl"];
        $ret["stock"] = $product["quantity"];
        $ret["commentNumber"] = $commentNum;
        $ret["averageRate"] = $rate;

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
        $product = json_decode(json_encode($pList[0]), true);

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

/**
 * Find comments based on the requirements of front-end
 * @param $storeID
 * @param $commodityID
 * @param $pageID
 */
    function getComments($storeID, $commodityID, $pageID, $numPerPage){
        $ret = array();

        $comments = getData("db272.TopProduct", ['storeID' => (int)$storeID, 'productID' => (int)$commodityID], ['projection' => ['comment' => 1, '_id' => 0]]);
        $comments = json_decode(json_encode($comments[0]), true);
        $comments = $comments["comment"];
        $comments = array_reverse($comments);

        $numOfComments = count($comments);
        $commentData = array();

        if ($numOfComments <=0){
            $commentData = array();
        }
        else {
            /* Decide if the last page */
            $lastID = $numPerPage * $pageID;
            // Out of range
            if ($lastID - $numOfComments >=$numPerPage){
                $commentData = array();
            }
            else {
                $startIdx = $lastID -$numPerPage;

                if ($lastID - $numOfComments >0){
                    $endIdx = $numOfComments -1;
                }
                else {
                    $endIdx = $lastID -1;
                }

                for ($i =$startIdx; $i <$endIdx; $i++){
                    $comment = json_decode(json_encode($comments[$i]), true);
                    $temp = array();
                    $temp["commentInfo"] = "By " . $comment["userName"] . " on " . $comment["timeStamp"];
                    $temp["commentContent"] = $comment["description"];
                    $commentData[] = $temp;
                }
            }

            $ret["commentNumber"] = $numOfComments;
            $ret["commentData"] = $commentData;
            $ret["pageID"] = $pageID;

        }

        return $ret;
    }

/**
 * Add new comment for a product
 * Update comment information and return new comments set
 * @param $userID
 * @param $storeID
 * @param $commodityID
 * @param $commentContent
 * @param $numPerPage
 * @return array
 */
    function addNewComment($userID, $storeID, $commodityID, $commentContent, $numPerPage){
        $collectionName = "db272.TopProduct";

        // Find user by userID
        $userData = getData("db272.User", ['userID' => $userID], []);
        $userData = json_decode(json_encode($userData[0]), true);

        // Find comments
        $comments = getData("db272.TopProduct", ['storeID' => (int)$storeID, 'productID' => (int)$commodityID], ['projection' => ['comment' => 1, '_id' => 0]]);
        $comments = json_decode(json_encode($comments[0]), true);
        $comments = $comments["comment"];


        // Update comments
        $newComment = array(
            "userID" => $userID,
            "userName" => $userData["userName"],
            "timeStamp" => date("m/d/Y h:i:sa"),
            "description" => $commentContent
        );
        $comments[] = $newComment;

        // Reverse comments array (so we have TIME order DESC)
        $comments = array_reverse($comments);

        if (count($comments) >$numPerPage){
            $limitComments = array_slice($comments, 0, $numPerPage);
        }
        else {
            $limitComments = $comments;
        }

        // Reverse comments to be update (so we have data stored with TIME order ASC)
        $comments = array_reverse($comments);

        $filter = [ 'storeID' => (int)$storeID, 'productID' => (int)$commodityID ];
        $sets = [
            "comment" => $comments
        ];
        upsertData($collectionName, $filter, $sets);

        $commentData = array();

        foreach ($limitComments as $comment){
            $comment = json_decode(json_encode($comment), true);
            $temp = array();
            $temp["commentInfo"] = "By " . $comment["userName"] . " on " . $comment["timeStamp"];
            $temp["commentContent"] = $comment["description"];
            $commentData[] = $temp;
        }

        return $addResult = array(
            "addResult" => true,
            "addMessage" => "",
            "commentNumber" => count($comments),
            "commentData" => $commentData
        );
    }

    function addNewRate($userID, $storeID, $commodityID, $like, $price, $quality){
        // Find rate and rated
        $rates = getData("db272.TopProduct", ['storeID' => (int)$storeID, 'productID' => (int)$commodityID], ['projection' => ['rated' => 1, 'rate_avg' => 1, 'rate_like' => 1, 'rate_quality' => 1, 'rate_price' => 1, '_id' => 0]]);
        $rates = json_decode(json_encode($rates[0]), true);

        $curRated = $rates["rated"];
        $likeRate = $rates["rate_like"];
        $qualityRate = $rates["rate_quality"];
        $priceRate = $rates["rate_price"];
        $avgRate = $rates["rate_avg"];

        // Calculate new rate and rated
        $newRated = $curRated +1;
        $newLikeRate = ($likeRate * $curRated + $like) / $newRated;
        $newQualityRate = ($qualityRate * $curRated + $quality) / $newRated;
        $newPriceRate = ($priceRate * $curRated + $price) / $newRated;
        $newAvgRate = ($newLikeRate + $newQualityRate + $newPriceRate) / 3;

        // Update database
        $sets = [
            "rated" => $newRated,
            "rate_avg" => $newAvgRate ,
            "rate_like" => $newLikeRate,
            "rate_quality" => $newQualityRate,
            "rate_price" => $newPriceRate
        ];

        $filter = [ 'storeID' => (int)$storeID, 'productID' => (int)$commodityID ];

        upsertData('db272.TopProduct' , $filter, $sets);

        return array(
            "addResult" => true,
            "addMessage" => "",
            "averageRate" => $newAvgRate
        );
    }


/**
 * Validate username/email and password for a user
 * @param $userinfo
 * @param $password
 * @return array
 *  [
 *      "checkResult" : <boolean value of the result>,
 *      "checkMessage" : <Message related to the validation>,
 *  ]
 */
    function validateUser($userinfo, $password){
        $ret = array();

        $resultByNameAry = getData("db272.User",
            ['userName' => $userinfo, 'password' => $password],
            ['projection' => ['userName' => 1, 'userID' => 1, 'email' => 1, '_id' => 0]]);
        $resultByEmailAry = getData("db272.User",
            ['email' => $userinfo, 'password' => $password],
            ['projection' => ['userName' => 1, 'userID' => 1, 'email' => 1, '_id' => 0]]);

        if (count($resultByNameAry) ==1) {
            $tempUser = $resultByNameAry[0];
            $tempUser = json_decode(json_encode($tempUser), true);

            if (count($resultByEmailAry) ==0){
                $ret["checkResult"] = true;
                $ret["checkMessage"] = $tempUser;
            }
            else {
                $ret["checkResult"] = true;
                $ret["checkMessage"] = $tempUser;
            }
        }
        else if (count($resultByEmailAry) ==1){
            $tempUser = $resultByNameAry[0];
            $tempUser = json_decode(json_encode($tempUser), true);
            if (count($resultByNameAry) ==0){
                $ret["checkResult"] = true;
                $ret["checkMessage"] = $tempUser;
            }
            else {
                $ret["checkResult"] = true;
                $ret["checkMessage"] = $tempUser;
            }
        }
        else if (count($resultByNameAry) ==0 && count($resultByEmailAry) ==0){
            $ret["checkResult"] = false;
            $ret["checkMessage"] = "Invalid Username or Password: " . $userinfo;
        }
        else {
            $ret["checkResult"] = false;
            $ret["checkMessage"] = "Too many results with: " . $userinfo;
        }

        return $ret;
    }

/**
 * Validate if the new user name is available for front end
 * @param $userName
 * @return array
 *  [
 *      "checkResult" : <boolean value of the result>,
 *      "checkMessage" : <Message related to the validation>,
 *  ]
 */
    function validateNewUser($userName){
        $ret = array();
        $resultByNameAry = getData("db272.User", ['userName' => $userName], []);
        if (count($resultByNameAry) ==0){
            $ret["checkResult"] = true;
            $ret["checkMessage"] = "Valid UserName.";
        }
        else {
            $ret["checkResult"] = false;
            $ret["checkMessage"] = "UserName Existed: " . $userName;
        }

        return $ret;
    }

/**
 * Create new user
 * @param $userName
 * @param $password
 * @param $email
 */
    function createNewUser($userName, $password, $email){
        $ret = array();

        // Decide the new userID
        $idAry = getData("db272.User", [], ['sort' => ['userID' => -1], 'limit' => 1, 'projection' => ['userID' => 1, '_id' => 0]]);
        $newUserID = json_decode(json_encode($idAry[0]), true);
        $newUserID = $newUserID['userID'] +1;

        // New user
        $sets = [
            "userID" => $newUserID,
	        "userName" => $userName,
	        "password" => $password,
	        "email" => $email,
	        "ifOwner" => 0,
            "recentViewed" => array()
        ];

        $filter = [ 'userID' => (int)$newUserID];

        upsertData('db272.User' , $filter, $sets);

        $ret = array(
            "createResult" => true,
            "createMessage" => $filter
        );

        return $ret;
    }

/**
 * Check by userName if a user existed
 * @param $userName
 * @return bool     true if user existed; false otherwise
 */
    function isUserExisted($userName){
        $ret = false;
        $resultByNameAry = getData("db272.User", ['userName' => $userName], []);
        if (count($resultByNameAry) !=0){
            $ret = true;
        }
        return $ret;
    }


//$ary = addNewComment(1, 1, 6, "7New Comment",5);
//var_dump($ary);