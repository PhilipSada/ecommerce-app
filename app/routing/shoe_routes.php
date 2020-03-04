<?php


$router->map('GET', '/product/category/[i:id]', 'App\Controllers\ShoeController@show', 'shoes');
$router->map('GET', '/product/category/shoes/[i:id]', 'App\Controllers\ShoeController@get', 'get_shoes');



?>