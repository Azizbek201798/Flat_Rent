<?php

    declare(strict_types=1);

    $ads = (new App\Ads())->getAds();
    // dd($ads);
    loadView('home',['ads' => $ads]);