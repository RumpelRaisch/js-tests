<?php
$s = '';

if (
    false === empty($_SERVER['HTTPS']) &&
    'off' !== $_SERVER['HTTPS'] ||
    443   ==  $_SERVER['SERVER_PORT']
) {
    $s = 's';
}

$root  = pathinfo($_SERVER['SCRIPT_NAME'])['dirname'] . '/';
$query = '';

define(
    'HTTP_BASE',
    "http{$s}://{$_SERVER['HTTP_HOST']}" . $root
);

if (false === empty($_SERVER['QUERY_STRING'])) {
    $query = preg_quote('?' . $_SERVER['QUERY_STRING'], '/');
}

$root    = preg_quote($root, '/');
$pattern = '/^' . $root . '(.*?)' . $query . '$/';

define('ROUTE', preg_replace($pattern, '\1', $_SERVER['REQUEST_URI']));

define(
    'DEBUG',
    [
        'route'    => ROUTE,
        'base'     => HTTP_BASE,
        '$_GET'    => $_GET,
        '$_POST'   => $_POST,
        '$_COOKIE' => $_COOKIE,
        '$_FILES'  => $_FILES,
        '$_SERVER' => $_SERVER,
        '$_ENV'    => $_ENV,
    ]
);

unset($s, $root, $query, $pattern);
