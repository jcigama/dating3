<?php

//Turn on error reporting -- this is critical!
ini_set('display_errors', 1);
error_reporting(E_ALL);

//Start a session
session_start();

//Require the autoload file
require_once('vendor/autoload.php');

//Create an instance of the Base class
$f3 = Base::instance();
$f3->set('DEBUG', 3);

//Home Page
$f3->route('GET /', function() {
    $view = new Template();
    echo $view->render('views/home.html');
});

//Personal Info Page
$f3->route('GET /personal', function() {
    $view = new Template();
    echo $view->render('views/personal-info.html');
});

//Profile Page
$f3->route('POST /profile', function() {

    $_SESSION['personal'] = $_POST;

    $view = new Template();
    echo $view->render('views/profile.html');
});

//Interests Page
$f3->route('POST /interests', function() {

    $_SESSION['profile'] = $_POST;

    $view = new Template();
    echo $view->render('views/interests.html');
});

//Summary Page
$f3->route('POST /summary', function() {
    $_SESSION['interests'] = $_POST;
    if (isset($_POST) && count($_POST) > 0) {

        $_SESSION['interests'] =  implode(", ", $_SESSION['interests']['interests']);
    }
    else {
        $_SESSION['interests'] =  "none";
    }

//    var_dump($_SESSION['interests']);

    $view = new Template();
    echo $view->render('views/summary.html');
});


//Run fat free
$f3->run();