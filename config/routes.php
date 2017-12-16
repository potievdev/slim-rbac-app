<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$app->get('/write', function (Request $request, Response $response) {
    $request->withAttribute('userId', 1);
    return $response;
});

$app->get('/edit', function (Request $request, Response $response) {
    $request->withAttribute('userId', 1);
    return $response;
});