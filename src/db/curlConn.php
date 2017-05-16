<?php
/**
 * Created by PhpStorm.
 * User: Chenhua Zhu
 * Date: 2017/4/25 16:56
 */

    function curlData($url){
        // create curl resource
        $ch = curl_init();

        // set url
        curl_setopt($ch, CURLOPT_URL, $url);

        //return the transfer as a string
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        // $output contains the output string
        $output = curl_exec($ch);

        // close curl resource to free up system resources
        curl_close($ch);

        return $output;
    }

//$ary = curlData("http://cmpe272.zchholmes.cc/Template/allProduct.php" . "?productID=" . 1);
//var_dump($ary);