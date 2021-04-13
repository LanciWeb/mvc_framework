<?php

namespace App\db;

use PDO;
use App\db\Config;
use Exception;

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

  public function getTeams()
  {
    $query = 'SELECT * FROM teams ORDER BY points DESC, goal_diff DESC, name DESC';

    $statement = $this->pdo->prepare($query);

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
}
