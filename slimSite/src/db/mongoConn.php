<?php
/**
 * Created by PhpStorm.
 * User: Chenhua Zhu
 * Date: 2017/2/10 16:57
 */
// MongoDB manager used to connect to database
//$manager = new MongoDB\Driver\Manager("mongodb://localhost:27017");

/*
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

/*
 * Query use example
 * return as an array
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

/*
 * Query use example to find i_num greater than the $i_num
 * return as an array
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
