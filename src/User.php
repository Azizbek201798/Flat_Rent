<?php

declare(strict_types=1);

namespace App;

class User
{
    private \PDO $pdo;

    public function __construct()
    {
        $this->pdo = DB::connect();
    }

    public function createUser(
        string $username,
        string $position,
        string $gender,
        string $phone
    ): array|false
    {
        $query = "INSERT INTO users (username, position, gender, phone, created_at) VALUES(:username, :position, :gender, :phone, NOW())";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':position', $position);
        $stmt->bindParam(':gender', $gender);
        $stmt->bindParam(':phone', $phone);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function get(int $id): array|false
    {
        $query = "SELECT * FROM users WHERE id = :id";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update(
        int    $id,
        string $username,
        string $position,
        string $gender,
        string $phone
    ): void
    {
        $query = "UPDATE users SET username = :username, position = :position, gender = :gender, phone = :phone,updated_at = NOW() 
                WHERE id = :id";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':position', $position);
        $stmt->bindParam(':gender', $gender);
        $stmt->bindParam(':phone', $phone);
        $stmt->execute();
    }

    public function delete(int $id): array|false
    {
        $query = "DELETE FROM users WHERE id = :id";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    //Register

    public function register(): void
    {
        if ($this->isUserExists()) {
            $_SESSION["login_error"] = 'User already exists';
            header("Location: /register");
            return;
        }

        $user = $this->createRegister();
        if ($user) {
            $_SESSION['user'] = $user['email'];
            header("Location: /home");
            exit();
        }
    }

    public function isUserExists(): bool
    {
        if (isset($_POST['phone'])) {
            $phone = $_POST['phone'];
            $stmt = $this->pdo->prepare("SELECT * FROM users WHERE phone = :phone");
            $stmt->bindParam(':phone', $phone);
            $stmt->execute();
            return (bool)$stmt->fetch();
        }
        return false;
    }

    public function createRegister()
    {
        if (isset($_POST['username']) && isset($_POST['position']) && isset($_POST['gender']) && isset($_POST['phone'])) {
            $username = $_POST['username'];
            $position = $_POST['position'];
            $gender = $_POST['gender'];
            $phone = $_POST['phone'];

            $query = "INSERT INTO users (username, position, gender, phone) VALUES (:username, :position, :gender, :phone)";
            $stmt = $this->pdo->prepare($query);
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':position', $position);
            $stmt->bindParam(':gender', $gender);
            $stmt->bindParam(':phone', $phone);
            $stmt->execute();

            $stmt = $this->pdo->prepare("SELECT * FROM users WHERE phone = :phone");
            $stmt->bindParam(':phone', $phone);
            $stmt->execute();
            return $stmt->fetch(\PDO::FETCH_ASSOC);
        }
    }

    public function login(): void
    {
        $email = $_REQUEST['email'];
        $password = $_REQUEST['password'];

        $stmt = $this->pdo->prepare("SELECT * FROM `users` WHERE `email` = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user'] = $user['email'];
            header("Location: /");
            exit();
        } else {
            $_SESSION["login_error"] = 'Email or password is incorrect';
            header("Location: /login");
        }
    }

    public function logout()
    {
        session_destroy();
        header("Location: /");
        exit();
    }
}