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

    require_once __DIR__ . '/../views/cadastro.php';
  }
  
  // http://localhost/curso-mvc/?router=site/consulta
  public function consulta() {
    $users = $this->getAll();

    require_once __DIR__ . '/../views/consulta.php';
  }

  // http://localhost/curso-mvc/?router=Site/editar/&id=3
  public function editar() {
    $id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_SPECIAL_CHARS);
    $user = $this->getById($id);

    if ($user)
      require_once __DIR__ . "/../views/editar.php";
    else
      echo "<h4>Usuário não encontrado!</h4>";
  }

}