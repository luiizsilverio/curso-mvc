<?php

namespace app\models;

use app\models\Connection;

class User extends Connection {
    
  public function create() {
    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $tel = filter_input(INPUT_POST, 'tel', FILTER_SANITIZE_SPECIAL_CHARS);

    if (!empty($nome) && !empty($email)) {
      $conn = $this->connect();
      $sql = "INSERT INTO tb_person VALUES (default, :nome, :email, :tel)";
      $query = $conn->prepare($sql);
      $query->bindParam(':nome', $nome);
      $query->bindParam(':email', $email);
      $query->bindParam(':tel', $tel);
      $query->execute();
    }
  }

  public function getAll() {
    $conn = $this->connect();
    $sql = "SELECT * FROM tb_person ORDER BY nome";
    $query = $conn->prepare($sql);
    $query->execute();
    $result = $query->fetchAll();
    return $result;
  }

  public function getById($id) {
    $conn = $this->connect();
    $sql = "SELECT * FROM tb_person WHERE id = :id";
    $query = $conn->prepare($sql);
    $query->bindParam(':id', $id);
    $query->execute();
    $result = $query->fetchAll();
    if (count($result) > 0)
      return $result[0];
    else
      return false;
  }

  public function update() {

  }

  public function delete() {

  }
}