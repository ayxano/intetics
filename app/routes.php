<?php
use FastRoute\RouteCollector;
$dispatcher = FastRoute\simpleDispatcher(function (RouteCollector $r) {
    $r->addRoute('GET', '/', [Controller\PageController::class, 'index']);
    $r->addRoute('POST', '/post', [Controller\PageController::class, 'addPost']);
    $r->addRoute('GET', '/post/{id}', [Controller\PageController::class, 'showPost']);
});
return $dispatcher;