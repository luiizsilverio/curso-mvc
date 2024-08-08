<?php

namespace app\models;

use app\models\Connection;

class User extends Connection {
    
  public function create($nome, $email, $tel) {
    $conn = $this->connect();
    $sql = "INSERT INTO tb_person VALUES (default, :nome, :email, :tel)";
    $query = $conn->prepare($sql);
    $query->bindParam(':nome', $nome);
    $query->bindParam(':email', $email);
    $query->bindParam(':tel', $tel);
    $query->execute();
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

  public function update($id, $nome, $email, $tel) {
    $conn = $this->connect();
    $sql = "UPDATE tb_person SET nome = :nome, email = :email, tel = :tel WHERE id = :id";
    $query = $conn->prepare($sql);
    $query->bindParam(':nome', $nome);
    $query->bindParam(':email', $email);
    $query->bindParam(':tel', $tel);
    $query->bindParam(':id', $id);
    $query->execute();
  }

  public function delete($id) {
    $conn = $this->connect();
    $sql = "DELETE FROM tb_person WHERE id = :id";
    $query = $conn->prepare($sql);
    $query->bindParam(':id', $id);
    $query->execute();
  }
}