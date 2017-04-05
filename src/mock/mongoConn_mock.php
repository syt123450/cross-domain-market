<?php
/**
 * Created by PhpStorm.
 * User: Chenhua Zhu
 * Date: 2017/2/18 10:24
 */

function pingServer(){

};

function getTestResult(){

    $ret = array(array(
        "name" => "mock",
        "type" => "type_mock",
        "count" => "1",
        "version" => array("v3.2","v3.0","v2.6"),
        "info" => array(
            "x" => "203",
            "y" => "102"
        )
    ));
    return $ret;
};

function getINumGreater($i_num){
    $ret = array(
        array("i" => 4),
        array("i" => 5),
        array("i" => 6),
        array("i" => 7),
        array("i" => 8),
        array("i" => 9),
    );
    return $ret;
};