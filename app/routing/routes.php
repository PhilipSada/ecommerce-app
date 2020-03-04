<?php


use App\Controllers\IndexController;
require_once __DIR__ .'/../controllers/BaseController.php';
require_once __DIR__ .'/../controllers/IndexController.php';


$router = new AltoRouter;


$router->map('GET', '/', 'App\Controllers\IndexController@show', 'home');
$router->map('GET', '/featured', 'App\Controllers\IndexController@featuredProducts', 'featured_product');
$router->map('GET', '/product-picks', 'App\Controllers\IndexController@getProducts', 'get_product');
$router->map('POST', '/load-more', 'App\Controllers\IndexController@loadMoreProducts', 'load_more_product');

$router->map('GET', '/product/men', 'App\Controllers\ProductController@showMenMainPage', 'men_main_page');
$router->map('GET', '/product/women', 'App\Controllers\ProductController@showWomenMainPage', 'women_main_page');
$router->map('GET', '/product/[i:id]', 'App\Controllers\ProductController@show', 'product');
$router->map('GET', '/product-details/[i:id]', 'App\Controllers\ProductController@get', 'product_details');
//special product pages with filters
$router->map('GET', '/product/category/[i:id]', 'App\Controllers\ProductController@showMore', 'show_more_product');
$router->map('GET', '/product/category/more/[i:id]', 'App\Controllers\ProductController@getMore', 'get_more_product');

$router->map('GET', '/search-result', 'App\Controllers\SearchController@search', 'search_result');
$router->map('GET', '/get-result', 'App\Controllers\SearchController@get', 'get_result');

//cart route 
$router->map('POST', '/cart', 'App\Controllers\CartController@addItem', 'add_cart_item');
$router->map('GET', '/cart', 'App\Controllers\CartController@show', 'view_cart');
$router->map('GET', '/cart/items', 'App\Controllers\CartController@getCartItems', 'get_cart_items');
$router->map('POST', '/cart/update-qty', 'App\Controllers\CartController@updateQuantity', 'update_cart_quantity');
$router->map('POST', '/cart/remove-item', 'App\Controllers\CartController@removeItem', 'remove_cart_item');
$router->map('POST', '/cart/payment', 'App\Controllers\CartController@checkout', 'handle_payment');
$router->map('GET', '/cart/payment-confirmation', 'App\Controllers\CartController@paymentConfirmation', 'payment_confirmation');

//authentication

$router->map('GET', '/register', 'App\Controllers\AuthController@showRegisterForm', 'register');
$router->map('POST', '/register', 'App\Controllers\AuthController@register', 'register_me');

$router->map('GET', '/login', 'App\Controllers\AuthController@showLoginForm', 'login');
$router->map('POST', '/login', 'App\Controllers\AuthController@login', 'log_me_in');

$router->map('GET', '/logout', 'App\Controllers\AuthController@logout', 'logout');



require_once __DIR__ .'/admin_routes.php';
?>