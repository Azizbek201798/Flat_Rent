<?php

declare(strict_types=1);

namespace App;

class Branch
{
    private \PDO $pdo;
    public function __construct(){
        $this->pdo = DB::connect();
    }
}