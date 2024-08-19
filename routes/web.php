<?php

declare(strict_types=1);
use App\Router;

Router::get('/', fn()=>loadController('home'));
Router::get('/ads/{id}', function (int $id){
   loadController('showAd', ['id' => $id]);
});
Router::get('/ads/create',fn() => loadView('admin/create_ad'));
Router::post('/ads/create',fn() => loadController('createAd'));