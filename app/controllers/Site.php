<?php

namespace app\controllers;

class Site {
    
  public function home() {
    require_once __DIR__ . '/../views/home.php';


  }

  public function galeria($foto) {
    $image = $foto;

    require_once __DIR__ . '/../views/galeria.php';
    
  }
  
}