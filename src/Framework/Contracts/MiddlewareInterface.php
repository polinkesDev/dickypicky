<?php

declare(strict_types=1);

namespace Framework\Contracts;

interface MiddlewareInterface
{
    // process() method processes the request
    // process() runs before a controller handles the request
    // the common feature in middleware ia the ability to initiate the next middleware

    // similar to routes, we're going to loop through every middleware class

    public function process(callable $next);
}