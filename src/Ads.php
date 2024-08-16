<?php

namespace App;
use PDO;
class Ads{
    private PDO $pdo;
    public function __construct(){
        $this->pdo = DB::connect();
    }

    public function createAds(
        int $user_id,
        string $title,
        string $describtion,
        int $status_id,
        int $branch_id,
        string $address,
        string $price,
        string $rooms,
        string $branch,
    )
    {
        $query = "INSERT INTO ads(user_id,title,describtion,status_id,branch_id,address,price,rooms,branch,created_at) 
                  VALUES (:user_id,:title,:describtion,:status_id,:branch_id,:address,:price,:rooms,:branch,NOW());";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(":user_id",$user_id);
        $stmt->bindParam(":title",$title);
        $stmt->bindParam(":describtion",$describtion);
        $stmt->bindParam(":status_id",$status_id);
        $stmt->bindParam(":branch_id",$branch_id);
        $stmt->bindParam(":address",$address);
        $stmt->bindParam(":price",$price);
        $stmt->bindParam(":rooms",$rooms);
        $stmt->bindParam(":branch",$branch);
        $stmt->execute();

        return $stmt->fetch();
    }

    public function getAds(int $id){
        $query = "SELECT * FROM ads WHERE id = :id;";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(":id",$id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateAds(int $id,int $user_id,string $title,string $describtion,string $status_id,int $branch_id,string $address,float $price, int $rooms, string $branch){
        $query =  "UPDATE ads 
                   SET user_id = :user_id, title = :title, describtion = :describtion, status_id = :status_id, branch_id = :branch_id, address = :address, price = :price, rooms = :rooms, branch = :branch 
                   WHERE id = :id;";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(":id",$id);
        $stmt->bindParam(":user_id",$user_id);
        $stmt->bindParam(":title",$title);
        $stmt->bindParam(":describtion",$describtion);
        $stmt->bindParam(":status_id",$status_id);
        $stmt->bindParam(":branch_id",$branch_id);
        $stmt->bindParam(":address",$address);
        $stmt->bindParam(":price",$price);
        $stmt->bindParam(":rooms",$rooms);
        $stmt->bindParam(":branch",$branch);
        $stmt->execute();
    }

    public function deleteAds(int $id){
        $query = "DELETE FROM ads WHERE id=:id;";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(":id",$id);
        $stmt->execute();
    }
}