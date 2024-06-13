<?php

declare(strict_types=1);

// This file should be added in a composer manually, because it contains function
// Middlewares should always be created in the App

namespace App\Config;

use Framework\App;
use App\Middleware;

function registerMiddleware(App $app)
{
    $app->addMiddleware(Middleware\TemplateDataMiddleware::class);
}