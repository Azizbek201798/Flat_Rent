<?php

declare(strict_types=1);

use App\User;

if ($_POST['username'] && $_POST['email'] && $_POST['password']) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password = password_hash($password, PASSWORD_DEFAULT);

    $user = new User();
    $new_user = $user->register($username, $email, $password);
    if ($new_user) {
        header("location: /");
    }else{
        echo "Something went wrong";
    }

}