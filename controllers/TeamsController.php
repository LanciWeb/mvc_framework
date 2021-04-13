<?php

namespace App\controllers;

use App\Router;

class TeamsController
{

  public function index(Router $router)
  {
    if ($_SERVER['REQUEST_METHOD'] !== 'GET') $router->renderView('404');

    //TODO fetch teams
    $teams = [];

    $router->renderView('teams/index', ['teams' => $teams]);
  }
  public function create(Router $router)
  {
  }
  public function update(Router $router)
  {
  }
  public function delete(Router $router)
  {
  }
}
