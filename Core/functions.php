<?php

use Core\Response;
use Core\Session;

function dd($value)
{
    echo "<pre>";
    var_dump($value);
    echo "</pre>";

    die();
}

function urlIs($url): bool
{
    return $_SERVER['REQUEST_URI'] === $url;
}

function abort($code = 404)
{
    http_response_code($code);

    require base_path("views/{$code}.php");

    die();
}

function authorize($condition, $status = Response::FORBIDDEN): void
{
    if (!$condition) {
        abort($status);
    }
}

function base_path($path): string
{
    return BASE_PATH . $path;
}

function view($path, $attributes = []): void
{
    extract($attributes);

    require base_path('views/' . $path);
}

function redirect($path)
{
    header("location: {$path}");
    exit();
}

function old($key, $default = '')
{
    return Session::get('old')[$key] ?? $default;
}