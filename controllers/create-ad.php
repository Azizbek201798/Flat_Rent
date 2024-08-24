<?php

declare(strict_types=1);

$branches = (new \App\Branch())->getBranches();

loadView('dashboard/create_ad', ['branches' => $branches]);