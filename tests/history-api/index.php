<?php
require './config.php';
require './Router.php';

$data     = ['title' => '', 'text' => '',];
$router   = Router::getInstance();
$response = $router
    ->setRoutes(json_decode(file_get_contents('./routes.json'), true))
    ->handle(ROUTE);
$router   = null;

if (200 === $response['status']) {
    $data = $response['data'];
} else {
    http_response_code($response['status']);

    $data['title'] = $response['status'] . ' ' . $response['statusText'];
    $data['text']  = $response['status'] . ' ' . $response['statusText'];
}

unset($router, $response);

require './html.php';
