<?php


use App\Router;
use App\controllers\TeamsController;

require_once '../vendor/autoload.php';

$router = new Router();

$router->get('/', [TeamsController::class, 'index']);
$router->get('/teams', [TeamsController::class, 'index']);
$router->get('/teams/create', [TeamsController::class, 'create']);
$router->get('/teams/update', [TeamsController::class, 'update']);

$router->post('/teams/create', [TeamsController::class, 'create']);
$router->post('/teams/update', [TeamsController::class, 'update']);
$router->post('/teams/delete', [TeamsController::class, 'delete']);

$router->resolve();
