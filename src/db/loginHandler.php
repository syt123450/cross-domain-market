<?php
/**
 * Created by PhpStorm.
 * User: Chenhua Zhu
 * Date: 2017/5/3 17:29
 */

/* In case we don't have all requirements */
require_once('mongoConn.php');
require_once('curlConn.php');
require_once('dataUtility.php');

function checkUsr($usrInfo, $usrPassword) {

    //use the usrName/usrEmail, usrPassword to validate
    $checkResult = validateUser($usrInfo, $usrPassword);

    return $checkResult;
}

function checkNewUsrName($usrName) {

    //use the usrName to check whether this name has been registered.

    $checkResult = validateNewUser($usrName);

    return $checkResult;
}

function createUsr($userName, $password, $email) {

    //use the usrName, usrPassword, usrEmail to create new usr

    $createResult = createNewUser($userName, $password, $email);

    return $createResult;
}