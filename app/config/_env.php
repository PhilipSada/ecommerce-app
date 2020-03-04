<?php



define('BASE_PATH', realpath(__DIR__.'/../../'));

//from the composer(after installing vlucas/phpdotenv)
require_once __DIR__ .'/../../vendor/autoload.php';

$dotEnv = Dotenv\Dotenv::createImmutable(BASE_PATH);

$dotEnv->load();

//to include the stripe.php to this project
require_once __DIR__.'/_stripe.php';

?>