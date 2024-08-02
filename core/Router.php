<?php

namespace core;

class Router {

  private $controller = 'Site';
  private $method = 'home';
  private $param = [];

  public function __construct() {
    $router = $this->url();
    
    if (file_exists('app/controllers/' . ucfirst($router[0]) . '.php')) {
      echo $router[0] . ' existe!';
    } else {
      echo $router[0] . ' não existe!';
    }
  }

  private function url() {
    // armazena a rota na variável router, definida em .htaccess
    $parse_url = explode("/", filter_input(INPUT_GET, 'router', FILTER_SANITIZE_URL));
    return $parse_url;
    // na posição 0, temos o nome da classe
    // na posição 1, temos o nome do método
    // na posição 2, temos o parâmetro informado na rota
  }


}