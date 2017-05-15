<?php
/**
 * Created by PhpStorm.
 * User: Chenhua Zhu
 * Date: 2017/2/10 16:57
 */
// MongoDB manager used to connect to database
//$manager = new MongoDB\Driver\Manager("mongodb://localhost:27017");


$ary = getData("db272.TopProduct", ['storeID' => 1, 'productID' => 1], ['projection' => ['comment' => 1, '_id' => 0]]);
var_dump($ary);

/**
 * To catch all data from specified collections
 * @return array
 */
function getAllData($collectionName){
    $manager = new MongoDB\Driver\Manager("mongodb://localhost:27017");

    $query = new MongoDB\Driver\Query([]);
    $rows = $manager->executeQuery($collectionName, $query)->toArray();

    return $rows;
}

/**
 * To catch data by collection namespace, filter and option
 * @param $collectionName
 * @param $filter
 * @param $option
 * @return array
 */
function getData($collectionName, $filter, $option){
    $manager = new MongoDB\Driver\Manager("mongodb://localhost:27017");

    $query = new MongoDB\Driver\Query($filter, $option);
    $readPreference = new MongoDB\Driver\ReadPreference(MongoDB\Driver\ReadPreference::RP_PRIMARY);
    $rows = $manager->executeQuery($collectionName, $query, $readPreference)->toArray();

    return $rows;
}

/**
 * Upsert (update if existed, insert otherwise) items to target collections
 * @param $collectionName   e.g. "db272.TopProduct"
 * @param $filter           e.g. ['x' => 2]
 * @param $sets             e.g. ['y' => 3]     items to be updated
 */
function upsertData($collectionName, $filter, $sets){
    $bulk = new MongoDB\Driver\BulkWrite;
    $bulk->update(
        $filter,
        ['$set' => $sets],
        ['multi' => false, 'upsert' => true]
    );

    $manager = new MongoDB\Driver\Manager('mongodb://localhost:27017');
    $writeConcern = new MongoDB\Driver\WriteConcern(MongoDB\Driver\WriteConcern::MAJORITY, 1000);
    $result = $manager->executeBulkWrite($collectionName, $bulk, $writeConcern);
}




/* ************************** ************************** ************************** ************************** */
/* **************************       Example and Test function start below           ************************** */
/* ************************** ************************** ************************** ************************** */

/**
 * Connectivity test.
 */
function pingServer(){
    $manager = new MongoDB\Driver\Manager("mongodb://localhost:27017");

    try {
        $command = new MongoDB\Driver\Command(['ping' => 1]);
        $cursor = $manager->executeCommand('mydb', $command);
    } catch(MongoDB\Driver\Exception $e) {
        echo $e->getMessage(), "\n";
        exit;
    }

    /*
     * The ping command returns a single result document, so we need to access the
     * first result in the cursor.
     */
    $response = $cursor->toArray()[0];
}

/**
 * Query example
 * @return array
 */
function getTestResult(){
    $manager = new MongoDB\Driver\Manager("mongodb://localhost:27017");

    $filter = [ 'name' => "testMongoDB" ];
    $options = [
        'projection' => ['_id' => 0],
    ];
    $query = new MongoDB\Driver\Query($filter, $options);
//    $rows = $GLOBALS['manager']->executeQuery('mydb.myCol', $query)->toArray();
    $rows = $manager->executeQuery('db272.myCol', $query)->toArray();

    return $rows;

//    foreach ($rows as $row){
//        echo json_encode($row);
//    }
}

/**
 * Query use example to find i_num greater than the $i_num
 * @param $i_num
 * @return array
 */
function getINumGreater($i_num){
    $manager = new MongoDB\Driver\Manager("mongodb://localhost:27017");

    $filter = [ 'i' => ['$gt' => $i_num]];
    $options = [
        'projection' => ['_id' => 0],
    ];

    $query = new MongoDB\Driver\Query($filter, $options);
//    $rows = $GLOBALS['manager']->executeQuery('mydb.myCol', $query)->toArray();
    $rows = $manager->executeQuery('db272.myCol', $query)->toArray();

    return $rows;
}


