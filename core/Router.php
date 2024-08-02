<?php

namespace core;

class Router {

  private $controller = 'Site';
  private $method = 'home';
  private $param = [];

  public function __construct() {
    $router = $this->url();
    print_r( $router );
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