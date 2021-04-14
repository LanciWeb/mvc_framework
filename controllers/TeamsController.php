<?php

namespace App\controllers;

use App\Router;

class TeamsController
{

  public function index(Router $router)
  {
    if ($_SERVER['REQUEST_METHOD'] !== 'GET') $router->renderView('404');

    $search = $_GET['search'] ?? null;

    $teams = $router->db->getTeams($search);

    $router->renderView('teams/index', ['teams' => $teams, 'search' => $search]);
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
