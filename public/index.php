<?php

ini_set('display_errors', 'On');
error_reporting(E_ALL | E_STRICT);    

    require '../vendor/autoload.php';

    $app = new \Slim\Slim(array(
        'view' => new \PHPView\PHPView(),
        'templates.path' => __DIR__ . "/../views/"));
    $app->get('/hello/:name', function ($name) {
        echo "Hello, " . $name;
    });
    $app->get('/viewtest', function() use ($app){
        $app->render("richwashere.phtml", array("page" => "richwashere.phtml"));
    });
    $app->get('/', function () {
        echo "Hello World!";
    });
    $app->run();
    
?>