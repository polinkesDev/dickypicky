<?php

// Ways to change php settings:
    //   1. Globally: php.ini file in xampp
    //   2. Locally: ini_get | ini_set functions

    //ini_set('memory_limit', '255M');

    // phpinfo();
    //echo ini_get('memory_limit');

include __DIR__ . "/../src/App/functions.php";

// Access the application instance:
$app = include __DIR__ . '/../src/App/bootstrap.php';

$app->run();

dd($app);