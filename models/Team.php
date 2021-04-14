<?php

namespace App\models;

use App\db\Database;
use Exception;

class Team
{

  public $id;
  public $name;
  public $city;
  public $points;
  public $goal_diff;


  public function __construct()
  {
  }

  public function load($data)
  {
    foreach ($data as $key => $value) {
      $this->$key = $value ?? null;
    }
  }

  public function save()
  {

    $errors = [];

    if (!$this->name) $errors['name'] = "Il nome squadra è obbligatorio";

    if (empty($errors)) {
      try {
        Database::$db->createTeam($this);
      } catch (Exception $e) {
        echo '<pre>';
        var_dump($e->getMessage());
        echo '</pre>';
        exit;
      }
    }

    return $errors;
  }
}
