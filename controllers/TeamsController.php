<?php

namespace App\controllers;

use App\Router;
use App\models\Team;

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
    $team = [];
    $errors = [];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      extract($_POST);
      $data['name'] = $name;
      $data['city'] = $city;
      $data['points'] = $points;
      $data['goal_diff'] = $goal_diff;

      $team = new Team();
      $team->load($data);
      $errors = $team->save();
      if (empty($errors)) header('Location: /teams?success=creata');
    }

    $router->renderView('teams/create', ['team' => $team, 'errors' => $errors]);
  }

  public function update(Router $router)
  {
  }


  public function delete(Router $router)
  {
  }
}
