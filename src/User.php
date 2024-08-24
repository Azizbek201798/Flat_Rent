<?php

declare(strict_types=1);
namespace App;
use PDO;

class User
{
    private PDO $pdo;

    public function __construct()
    {
        $this->pdo = DB::connect();
    }

    public function createUser(
        string $username,
        string $position,
        string $gender,
        string $phone
    ): false|array {
        $query = "INSERT INTO users (username, position, gender, phone, created_at)
                  VALUES (:username, :position, :gender, :phone, NOW())";
        $stmt  = $this->pdo->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':position', $position);
        $stmt->bindParam(':gender', $gender);
        $stmt->bindParam(':phone', $phone);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getUser(int $id)
    {
        $query = "SELECT * FROM users WHERE id = :id";
        $stmt  = $this->pdo->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateUser(
        int    $id,
        string $username,
        string $position,
        string $gender,
        string $phone
    ): void {
        $query = "UPDATE users SET username = :username, position = :position, gender = :gender, phone = :phone, updated_at = NOW()
                  WHERE id = :id";
        $stmt  = $this->pdo->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':position', $position);
        $stmt->bindParam(':gender', $gender);
        $stmt->bindParam(':phone', $phone);
        $stmt->execute();
    }

    public function deleteUser(int $id): void
    {
        $query = "DELETE FROM users WHERE id = :id";
        $stmt  = $this->pdo->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }

// Authorization;
   public function login(string $email)
   {

    $stmt = $this->pdo->prepare("SELECT * FROM `users` WHERE `email` = :email");
       $stmt->bindParam(':email', $email);
       $stmt->execute();

       return $stmt->fetch(PDO::FETCH_ASSOC);
   }

   public function logout()
   {
       session_destroy();
       redirect('/login');
   }

   public function register(string $username, string $email, string $password):bool
   {
       if ($this->isUserExists()) {
           $_SESSION["login_error"] = 'User already exists';
           header("Location: /register");
           return false;
       }

       $user = $this->create($username, $email, $password);
       if ($user) {
           $_SESSION['user'] = $user['email'];
           redirect('/');
       }
       return true;
   }

   public function isUserExists(): bool
   {
       if (isset($_POST['email'])) {
           $email = $_POST['email'];
           $stmt = $this->pdo->prepare("SELECT * FROM `users` WHERE `email` = :email");
           $stmt->bindParam(':email', $email);
           $stmt->execute();
           return (bool)$stmt->fetch();
       }
       return false;
   }

   public function create(string $username, string $email, string $password)
   {
           $stmt = $this->pdo->prepare("INSERT INTO `users` (`username`,`email`, `password`) VALUES (:username,:email, :password)");
           $stmt->bindParam(':username', $username);
           $stmt->bindParam(':email', $email);
           $stmt->bindParam(':password', $password);
           $stmt->execute();

           $stmt = $this->pdo->prepare("SELECT * FROM `users` WHERE `email` = :email");
           $stmt->bindParam(':email', $email);
           $stmt->execute();

           return $stmt->fetch(PDO::FETCH_ASSOC);
   }
}