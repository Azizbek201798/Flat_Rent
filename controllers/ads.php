<?php

use App\Ads;

$ads = new Ads();
$allAds = $ads->getAds();

//view('pages/ads.php');