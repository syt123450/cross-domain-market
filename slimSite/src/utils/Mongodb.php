<?php
/**
 * Created by PhpStorm.
 * User: Chenhua Zhu
 * Date: 2017/2/22 17:09
 */

namespace src\utils;


class Mongodb{
    private $host;
    private $port;
    private $db;

    public function __construct($h, $p, $d) {
        $this->setHost($h);
        $this->setPort($p);
        $this->setDb($d);
    }

    /**
     * @return mixed
     */
    public function getHost() {
        return $this->host;
    }

    /**
     * @param mixed $host
     */
    public function setHost($host) {
        $this->host = $host;
    }

    /**
     * @return mixed
     */
    public function getPort() {
        return $this->port;
    }

    /**
     * @param mixed $port
     */
    public function setPort($port) {
        $this->port = $port;
    }

    /**
     * @return mixed
     */
    public function getDb() {
        return $this->db;
    }

    /**
     * @param mixed $db
     */
    public function setDb($db) {
        $this->db = $db;
    }


}