<?php

namespace App\db;

use PDO;
use App\db\Config;

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

    $this->pdo = new PDO($dsn);

    $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    self::$db = $this;
  }
}
