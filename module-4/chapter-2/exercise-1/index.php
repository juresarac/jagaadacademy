<?php

require_once "vendor/autoload.php";

use Dotenv\Dotenv;
use Jure\Lesson1\DB;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->safeLoad();

try{
    $pdo = new DB();
    $pdo->fillAuthorAndBooks();
} catch (PDOException $exception){
    echo $exception->getMessage();
    die;
}
