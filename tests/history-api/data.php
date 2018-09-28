<?php
require './config.php';
require './Router.php';

if (false === isset($_POST['route'])) {
    return;
}

$pattern  = '/^' . preg_quote(HTTP_BASE, '/') . '(.*?)\/?(?:\?.*?)?$/';
$route    = preg_replace($pattern, '\1', $_POST['route']);
$router   = Router::getInstance();
$response = $router
    ->setRoutes(json_decode(file_get_contents('./routes.json'), true))
    ->handle($route);
$router   = null;

unset($pattern, $route, $router);

if (200 === $response['status']) {
    ob_start();
    echo json_encode($response['data']);
    $json = ob_get_clean();

    header('Content-type:application/json');

    echo $json;

    unset($json);
} else {
    http_response_code($response['status']);
}

unset($response);
