<?php

declare(strict_types=1);

/** 
 * @var int $id 
*/

$branches = (new \App\Branch())->getBranches();
loadView('single-ad', ['branches' => $branches]);