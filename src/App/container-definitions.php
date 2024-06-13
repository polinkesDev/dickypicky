<?php

declare(strict_types=1);

use Framework\TemplateEngine;
use App\Config\Paths;

return [ // array of factory functions
    TemplateEngine::class => fn() => new TemplateEngine(Paths::VIEW)
];