<?php

declare(strict_types=1);
require_once __DIR__ . '/vendor/autoload.php';
require 'bootstrap.php';

use App\User;
use App\Ads;

$user = new User();
$ads = new Ads();

// $user->create(1,'Azizbek','Chief','male','+99891 005 8110');
// $user->deleteUser(1);
// $user->updateUser(1,"Bekki","Player","male","+99890 100 1010");
// var_dump($user->getUser(1));

// $ads->createAds(1,'Novostroyka','Yangi',1,1,'1','1','1','1');
// $ads->deleteAds(1);
// $ads->updateAds(2,10,'Novostroyka','Yangi','1',1,'1',1,1,'1');
// var_dump($ads->getAds(2));