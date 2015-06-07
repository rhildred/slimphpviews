<?php
    
ini_set('display_errors', 'On');
error_reporting(E_ALL);
    require '../vendor/autoload.php';
$app = new \Slim\Slim();
$app->get('/hello/:name', function ($name) {
    echo "Hello, " . $name;
});
$app->get('/', function () {
    echo "Hello World!";
});
$app->run();

?>