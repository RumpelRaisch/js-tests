<?php
$s = '';

if (
    false === empty($_SERVER['HTTPS']) &&
    'off' !== $_SERVER['HTTPS'] ||
    443   ==  $_SERVER['SERVER_PORT']
) {
    $s = 's';
}

define(
    'HTTP_BASE',
    "http{$s}://{$_SERVER['HTTP_HOST']}" . pathinfo($_SERVER['SCRIPT_NAME'])['dirname'] . '/'
);

define(
    'DEBUG',
    [
        'base'     => HTTP_BASE,
        '$_GET'    => $_GET,
        '$_POST'   => $_POST,
        '$_COOKIE' => $_COOKIE,
        '$_FILES'  => $_FILES,
        '$_SERVER' => $_SERVER,
        '$_ENV'    => $_ENV,
    ]
);

require '../../helper/LoremIpsum.php';
require 'html.php';
