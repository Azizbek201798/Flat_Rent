<?php

namespace App;
use PDO;

class User{

    private PDO $pdo;

    public function __construct(){
        $this->pdo = DB::connect();
    }

    public function createUser(
        int $id,
        string $username,
        string $position,
        string $gender,
        string $phone,
    )
    {
        $query = "INSERT INTO users(id,username,position,gender,phone) VALUES (:id,:username,:position,:gender,:phone);";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(":id",$id);
        $stmt->bindParam(":username",$username);
        $stmt->bindParam(":position",$position);
        $stmt->bindParam(":gender",$gender);
        $stmt->bindParam(":phone",$phone);
        $stmt->execute();

        return $stmt->fetch();
    }

    public function getUser(int $id){
        $query = "SELECT * FROM users WHERE id = :id;";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(":id",$id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateUser(int $id,string $username,string $position,string $gender,string $phone){
        $query =  "UPDATE users SET username = :username, position = :position, gender = :gender, phone = :phone WHERE id = :id;";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(":id",$id);
        $stmt->bindParam(":username",$username);
        $stmt->bindParam(":position",$position);
        $stmt->bindParam(":gender",$gender);
        $stmt->bindParam(":phone",$phone);
        $stmt->execute();
    }

    public function deleteUser(int $id){
        $query = "DELETE FROM users WHERE id=:id;";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(":id",$id);
        $stmt->execute();
    }
}