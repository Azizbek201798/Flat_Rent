<?php

declare(strict_types=1);

namespace App;

class Status
{
    private \PDO $pdo; 
    public function __construct(){
        $this->pdo = DB::connect();
    }
}