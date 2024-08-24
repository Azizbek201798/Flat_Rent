<?php

$name = $_POST['status'];
if ($_POST['status']){
    (new \App\Status())->createStatus($name);
    header("Location: /");
}