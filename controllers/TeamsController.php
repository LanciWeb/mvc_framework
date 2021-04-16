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
      $data['imageFile'] = $_FILES['logo'];

      $team = new Team();
      $team->load($data);
      $errors = $team->save();
      if (empty($errors)) header('Location: /teams?success=creata');
    }

    $router->renderView('teams/create', ['team' => $team, 'errors' => $errors]);
  }

  public function update(Router $router)
  {
    $errors = [];
    $id = $_GET['id'];
    if (!$id) $router->renderView('teams');

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
      $team = new Team();
      $data = $router->db->getTeamById($id);
      $team->load($data);
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      foreach ($_POST as $key => $value) {
        $data[$key] = $value;
      }

      $data['id'] = $id;
      $data['imageFile'] = $_FILES['logo'];
      $team = new Team();
      $team->load($data);
      $errors = $team->save();

      if (empty($errors)) header('Location: /teams?success=modificata');
    }

    $router->renderView('teams/update', ['team' => $team, 'errors' => $errors]);
  }


  public function delete(Router $router)
  {
    if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !$_POST['id']) $router->renderView('404');

    $router->db->deleteTeam($_POST['id']);

    header('Location: /teams?success=eliminata');
  }
}
