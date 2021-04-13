<?php

namespace App;

use App\db\Database;

class Router
{

  public $db;
  public $get_routes;
  public $post_routes;

  public function __constructor()
  {
    $this->db = new Database();
  }

  public function get($path, $fn)
  {
    $this->get_routes[$path] = $fn;
  }

  public function post($path, $fn)
  {
    $this->post_routes[$path] = $fn;
  }


  public function resolve()
  {
    $path = $_SERVER['PATH_METHOD'] ?? "/";
    $method = $_SERVER['REQUEST_METHOD'];

    $fn = $method === 'GET' ? $this->get_routes[$path] : $this->post_routes[$path];

    if (!$fn) header('Location: /404.php');

    call_user_func($fn, $this);
  }

  public function renderView($page, $params = [])
  {

    foreach ($params as $param => $value) {
      $$param = $value;
    }

    ob_start();

    include_once(__DIR__ . "/views/$page.php");

    $content = ob_get_clean();

    include_once(__DIR__ . '/views/_layout.php');
  }
}
