<?php
session_start();
use Helpers\TokenHelper;
use Exceptions\HttpNotFoundException;
use Exceptions\TokenMismatchException;
use Exceptions\EntityNotFoundException;
use Exceptions\CustomThrowableException;
use Exceptions\HttpMethodNotAllowedException;
use Exceptions\HttpUnprocessableEntityException;

try
{
    $container = require('../app/bootstrap.php');

    $dispatcher = require('../app/routes.php');

    if($_SERVER['REQUEST_METHOD'] === 'POST')
    {
        $token = $_POST['_token'] ?? null;
        if(TokenHelper::validateToken($token) === false)
        {
            throw new TokenMismatchException();
        }
    }

    $route = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], $_SERVER['REQUEST_URI']);

    echo match ($route[0]) {
        FastRoute\Dispatcher::NOT_FOUND => throw new HttpNotFoundException,
        FastRoute\Dispatcher::METHOD_NOT_ALLOWED => throw new HttpMethodNotAllowedException,
        FastRoute\Dispatcher::FOUND => (function ($container) use ($route) {
            $controller = $route[1];
            $parameters = $route[2];
            return $container->call($controller, $parameters);
        })($container)
    };
} catch (EntityNotFoundException | TokenMismatchException | HttpUnprocessableEntityException | HttpNotFoundException |
HttpMethodNotAllowedException $th)
{
    http_response_code($th->getCode());
    echo $th;
} catch (Throwable $th) 
{
    http_response_code(500);
    echo new CustomThrowableException($th);
}