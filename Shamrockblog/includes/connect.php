<?php

ob_start();
session_start();
// with a little guidance c/o http://www.phpeveryday.com/articles/PDO-Activation-PHP-Data-Objects-Extension-P546.html
// also http://www.daveismyname.com/
// prettified with http://www.beta.phpformatter.com
//++++++++++++++++++++++++++++++++++++++++++

//credentials
define('DBHOST', 'localhost');
define('DBNAME', 'stmarthablog');
define('DBUSER', 'root');
define('DBPASS', 'C00per75)3791');

$db = new PDO("mysql:host=" . DBHOST . ";port=3306;dbname=" . DBNAME, DBUSER, DBPASS);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//default time zone for posts in db
date_default_timezone_set('America/Kentucky/Louisville');


//create classes to autoload

function __autoload($class)
{

    $class = strtolower($class);

    $classpath = 'classes/class.' . $class . '.php';
    if (file_exists($classpath)) {
        require_once $classpath;
    }

    $classpath = '../classes/class.' . $class . '.php';
    if (file_exists($classpath)) {
        require_once $classpath;
    }

    $classpath = '../../classes/class.' . $class . '.php';
    if (file_exists($classpath)) {
        require_once $classpath;
    }
}

$user = new User($db);
?>