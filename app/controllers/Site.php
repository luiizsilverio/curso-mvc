<?php

namespace app\controllers;

use app\models\User;

require_once __DIR__ . '/../lib/util.php';


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
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $nome  = filter_input(INPUT_POST, 'nome',  FILTER_SANITIZE_SPECIAL_CHARS);
      $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
      $tel   = filter_input(INPUT_POST, 'tel',   FILTER_SANITIZE_SPECIAL_CHARS);

      if (!$nome || !$email) {
        $erro = "Informe o nome e o e-mail";
        require_once __DIR__ . '/../views/cadastro.php';
      }
      else {
        $this->create($nome, $email, $tel);
        header("Location:?router=Site/consulta/");
      }  
    }
    else {
      require_once __DIR__ . '/../views/cadastro.php';
    }
  }
  

  // http://localhost/curso-mvc/?router=site/consulta
  public function consulta() {
    $users = $this->getAll();
    require_once __DIR__ . '/../views/consulta.php';
  }


  // http://localhost/curso-mvc/?router=Site/editar/&id=3
  public function editar() {
    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
      $id   = filter_input(INPUT_GET, "id",   FILTER_SANITIZE_SPECIAL_CHARS);
      $erro = filter_input(INPUT_GET, "erro", FILTER_SANITIZE_SPECIAL_CHARS);
      $user = $this->getById($id);

      if (!$user) {
        require_once __DIR__ . '/../views/home.php';
      } else {
        require_once __DIR__ . "/../views/editar.php";
      }
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $id    = filter_input(INPUT_POST, 'id',    FILTER_SANITIZE_SPECIAL_CHARS);
      $nome  = filter_input(INPUT_POST, 'nome',  FILTER_SANITIZE_SPECIAL_CHARS);
      $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
      $tel   = filter_input(INPUT_POST, 'tel',   FILTER_SANITIZE_SPECIAL_CHARS);
      $voltar = $_POST['voltar']; 

      if ($voltar || !$id) {
        $this->consulta();
      }
      elseif (!$nome || !$email) {
        $erro = "Informe o nome e o e-mail";
        header("Location:?router=Site/editar/&id={$id}&erro={$erro}");
      }
      else {
        $this->update($id, $nome, $email, $tel);
        header("Location:?router=Site/consulta/");
      }
    }
  }


  public function excluir() {
    $id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_SPECIAL_CHARS);

    if ($id)
      $this->delete($id);

    header("Location:?router=Site/consulta/");
  }


  public function confirmaExcluir() {
    $id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_SPECIAL_CHARS);
    $nome = filter_input(INPUT_GET, "nome", FILTER_SANITIZE_SPECIAL_CHARS);
    require_once __DIR__ . '/../views/confirmaDelete.php';   
  }

}