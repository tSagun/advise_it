<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once('vendor/autoload.php');
//session_start();
//$_SESSION['id'] = 1;

$f3 = Base::instance();
$con = new Controller($f3);
$dataLayer = new DataLayer();

$f3->route('GET /', function() {
    //echo '<h1>Hello world</h1>';
    $GLOBALS['con']->home();
});

$f3->route('GET /planning', function () {
    //echo '<h1>hello world</h1>';
    $GLOBALS['con']->plan();
});

$f3->run();