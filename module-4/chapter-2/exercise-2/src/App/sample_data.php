<?php
declare(strict_types=1);

use Jure\Accounts\App\DB;

require_once __DIR__ . '/../../vendor/autoload.php';
require_once  __DIR__ . '/../App/DB.php';

try {
    $dbInstance = DB::getInstance();
    $pdo = $dbInstance->getConnection();
    $dbInstance->generateSampleData();
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    die;
}
echo "Connected";