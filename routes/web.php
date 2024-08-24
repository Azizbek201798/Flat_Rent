<?php

declare(strict_types=1);

use App\Router;
use Controllers\AdController;

Router::get('/', fn()=> loadController('home'));
Router::get('/ads/{id}', function (int $id) {
    loadController('showAd', ['id'=>$id]);
});

Router::get('/login', fn()=> loadView('auth/login'));
Router::get('/register', fn()=> loadView('auth/register'));

Router::get('/ads/{id}', fn($id)=> (new AdController())->show($id));

Router::get('/ads/create', fn()=> loadController('create-ad'));
Router::post('/ads/create', fn()=>(new AdController())->create());

Router::get('/logout', fn()=>(new \App\User())->logout());

Router::post('/login', fn()=> loadController('auth/login'));
Router::post('/register', fn()=> loadController('auth/register'));

Router::get('/ads/create', fn()=> loadController('create-ad'));
Router::post('/ads/create', fn()=> loadController('createAd'));

Router::get('/status/create', fn()=> loadView('dashboard/create_status'));
Router::post('/status/create', fn()=> (new \App\Status())->createStatus($_POST['status']) && loadController('home'));

Router::get('/branch/create', fn()=> loadView('dashboard/create_branch'));
Router::post('/branch/create', fn()=> (new \App\Branch())->createBranch($_POST['title'],$_POST['address']) && loadController('home'));

Router::get('/branches', fn()=> loadController('home'));

Router::errorResponse(404, 'Not Found');