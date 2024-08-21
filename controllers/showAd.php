<?php

declare(strict_types=1);

/** 
 * @var string $id 
*/

$ad = (new \App\Ads())->getAd($id);
$ad->image = "../assets/images/ads/$ad->image";

loadView('single-ad', ['ad' => $ad]);