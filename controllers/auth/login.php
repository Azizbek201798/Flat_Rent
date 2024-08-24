<?php

declare(strict_types=1);

use App\User;

if (isset($_POST['email']) && isset($_POST['password'])) {

    $user = new User();
    $new_user = $user->login($_POST['email']);

    if ($new_user && password_verify($_POST['password'], $new_user['password'])) {
        $_SESSION['user'] = $new_user['email'];
        header("Location: /");
        exit();
    } else {
        $_SESSION["login_error"] = 'Email or password is incorrect';
        header("Location: /login");
    }

}