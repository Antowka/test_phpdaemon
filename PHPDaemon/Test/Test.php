<?php

namespace PHPDaemon\Test;
use PHPDaemon\Core\AppInstance;
use PHPDaemon\Clients\MySQL;

/**
 * Created by IntelliJ IDEA.
 * User: anton
 * Date: 21.01.16
 * Time: 17:40
 */
class Test extends AppInstance {

    private $mySQLPool;

    public function init() {
        $this->mySQLPool = MySQL\Pool::getInstance();
        D(" ******************* REQUEST INIT *********************** ");
    }

    public function beginRequest($req, $upstream) {
        $this->mySQLPool->getConnection(function($db) {

            D(" ******************* CREATE Mysql Connect *********************** ");

            //Выборка маленкого результата
            $sql = "SELECT test_id FROM test WHERE test_id = 1";
            $db->query($sql, function($db, $success){
                D(" ******************* Query SMALL result *********************** ");
                D($db->resultRows);
            });

            //Выборка большого результата (колбек не срабатывает)
            $sql = "SELECT text FROM test WHERE test_id = 1";
            $db->query($sql, function($db, $success){
                D(" ******************* Query BIG result *********************** ");
                D($db->resultRows);
            });
        });
    }
}