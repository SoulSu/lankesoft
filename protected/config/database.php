<?php

$connectionString = 'mysql:host=localhost;dbname=db_lankesoft';
$user = 'root';
$password = '';
// sina app
/*
用户名　 :  SAE_MYSQL_USER
密　　码 :  SAE_MYSQL_PASS
主库域名 :  SAE_MYSQL_HOST_M
从库域名 :  SAE_MYSQL_HOST_S
端　　口 :  SAE_MYSQL_PORT
数据库名 :  SAE_MYSQL_DB
 */
if (defined('SAE_MYSQL_USER')) {
    $connectionString = 'mysql:host=' . SAE_MYSQL_HOST_M . ';port=' . SAE_MYSQL_PORT . ';dbname=' . SAE_MYSQL_DB;
    $user = SAE_MYSQL_USER;
    $password = SAE_MYSQL_PASS;
}


// This is the database connection configuration.
return array(
//	'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
    // uncomment the following lines to use a MySQL database

    'connectionString' => $connectionString,
    'emulatePrepare' => true,
    'username' => $user,
    'password' => $password,
    'charset' => 'utf8',

);