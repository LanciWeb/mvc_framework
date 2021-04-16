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
  public $imageFile;
  public $logo;


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

      if ($this->imageFile && $this->imageFile['tmp_name']) {
        if (!is_dir(__DIR__ . '/../public/images/teams')) {
          mkdir(__DIR__ . '/../public/images/teams');
        }

        if ($this->logo) unlink(__DIR__ . '/../public/' . $this->logo);

        $fileName = $this->imageFile['name'];
        $filePath = "images/teams/$this->name/$fileName";
        $folder = dirname(__DIR__ . "/../public/$filePath");
        if (!is_dir($folder)) mkdir($folder);
        move_uploaded_file($this->imageFile['tmp_name'], $filePath);

        $this->logo = $filePath;
      }

      try {
        if ($this->id) Database::$db->updateTeam($this);
        else Database::$db->createTeam($this);
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
