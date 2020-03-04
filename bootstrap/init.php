<?php


use App\Classes\Database;
use App\RouteDispatcher;


//start session if not already started
if(!isset($_SESSION)) session_start();


require_once __DIR__."/../app/config/_env.php";
require_once __DIR__."/../app/routing/routes.php";

//instantiate the database class

new Database;

//set custom error handler

set_error_handler([new \App\Classes\ErrorHandler(), 'handleErrors']);

//instantiate the route-dispatcher class
new RouteDispatcher($router);


?>