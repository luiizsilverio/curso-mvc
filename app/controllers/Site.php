<?php

namespace app\controllers;

use app\models\User;

class Site extends User {
    
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
    $user = $this->create();
    echo $user;

    require_once __DIR__ . '/../views/cadastro.php';
  }
  
  // http://localhost/curso-mvc/?router=site/consulta
  public function consulta() {
    $users = $this->getAll();
    require_once __DIR__ . '/../views/consulta.php';
  }

}