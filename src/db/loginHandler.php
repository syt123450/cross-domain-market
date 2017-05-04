<?php
/**
 * Created by PhpStorm.
 * User: Chenhua Zhu
 * Date: 2017/5/3 17:29
 */

function checkUsr($usrInfo, $usrPassword) {

    //use the usrName/usrEmail, usrPassword to validate

    $checkResult = array(
        "checkResult" => true,
        "checkMessage" => ""
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
        "createMessage" => ""
    );

    return $createResult;
}