<?php

namespace App\db;

use PDO;
use App\db\Config;
use Exception;
use App\models\Team;

class Database
{

  private $pdo;

  public static $db;

  public function __construct()
  {
    $this->dbms = Config::$dbms;
    $this->user = Config::$user;
    $this->password = Config::$password;
    $this->port = Config::$port;
    $this->host = Config::$host;
    $this->db_name = Config::$db_name;

    $dsn = "$this->dbms:host=$this->host;port=$this->port;dbname=$this->db_name";

    $this->pdo = new PDO($dsn, $this->user, $this->password);

    $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    self::$db = $this;
  }

  public function getTeams($search)
  {
    $query = 'SELECT * FROM teams ';
    if ($search) $query .= 'WHERE name LIKE :search ';
    $query .= 'ORDER BY points DESC, goal_diff DESC, name DESC';

    $statement = $this->pdo->prepare($query);
    if ($search) $statement->bindValue('search', "%$search%");

    try {
      $statement->execute();
      $teams = $statement->fetchAll(PDO::FETCH_ASSOC);
      return $teams;
    } catch (Exception $e) {
      echo '<pre>';
      var_dump($e->getMessage());
      echo '</pre>';
      exit;
    }
  }

  public function createTeam(Team $team)
  {
    $statement = $this->pdo->prepare('INSERT INTO teams (name, city, points, goal_diff) VALUES (:name, :city, :points, :goal_diff)');

    $statement->bindValue('name', $team->name);
    $statement->bindValue('city', $team->city);
    $statement->bindValue('points', $team->points);
    $statement->bindValue('goal_diff', $team->goal_diff);

    try {
      $statement->execute();
    } catch (Exception $e) {
      echo '<pre>';
      var_dump($e->getMessage());
      echo '</pre>';
      exit;
    }
  }
}
