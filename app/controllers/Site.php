<?php

namespace app\controllers;

class Site {
    
  // http://localhost/curso-mvc/?router=site/home
  public function home() {
    require_once __DIR__ . '/../views/home.php';
  }

  // http://localhost/curso-mvc/?router=site/galeria/motos
  public function galeria($foto) {
    $image = $foto;
    require_once __DIR__ . '/../views/galeria.php';
  }

  // http://localhost/curso-mvc/?router=site/cadastro
  public function cadastro() {
    require_once __DIR__ . '/../views/cadastro.php';
  }
  
  // http://localhost/curso-mvc/?router=site/consulta
  public function consulta() {
    require_once __DIR__ . '/../views/consulta.php';
  }

}