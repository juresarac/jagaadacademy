<?php
declare(strict_types=1);

namespace Jure\Accounts\App\Views;

use Jure\Accounts\Controllers\AccountController;

require_once __DIR__ . '/vendor/autoload.php';


$controller = new AccountController();
$accounts = $controller->getAllAccounts();