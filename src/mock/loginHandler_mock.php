<?php
/**
 * Created by PhpStorm.
 * User: ss
 * Date: 2017/4/6
 * Time: 下午2:20
 */

function checkUsr($usrInfo, $usrPassword) {

    //use the usrName, usrPassword to validate

    $checkResult = array(
        "checkResult" => true,
        "checkMessage" => array(
            "userID" => 2,
	        "userName" => "tester",
	        "email" => "someone@gmail.com"
            )
    );

    return $checkResult;
}

function checkNewUsrName($usrName) {

    //use the usrName to check whether this name has been registered.

    $checkResult = array(
        "checkResult" => true,
        "checkMessage" => ""
    );

    return $checkResult;
}

function createUsr($usrName, $usrPassword, $usrEmail) {

    //use the usrName, usrPassword, usrEmail to create new usr

    $createResult = array(
        "createResult" => true,
        "createMessage" => array(
            "userID" => 2
        )
    );

    return $createResult;
}

function handleThirdPartyLogin($uniqueID){

    $loginResult = array(
        "loginResult" => true,
        "loginMessage" => array(
            "userID" => 2
        )
    );


    return $loginResult;
}