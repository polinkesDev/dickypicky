<?php

declare(strict_types=1);

function dd(mixed $value) { // "dump-and-die" function
    echo "<pre>";
        print_r($value);
    echo "</pre>";
    die(); // stop load the page
}

function esc(mixed $value): string
{
    return  htmlspecialchars((string) $value);
}
