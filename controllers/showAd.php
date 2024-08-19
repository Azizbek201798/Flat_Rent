<?php

declare(strict_types=1);

// @var TYPE_NAME $id 

$ads = new App\Ads();
$ad = $ads->getAd($id);

loadView('single-ad', ['ad' => $ad]);