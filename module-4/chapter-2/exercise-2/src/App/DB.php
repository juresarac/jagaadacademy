<?php
declare(strict_types=1);
namespace Jure\Accounts\App;

use Dotenv\Dotenv;
use Faker\Factory;
use PDO;
use PDOException;

class DB
{
    private static ?DB $instance = null;
    private PDO $pdo;

    private function __construct()
    {
        $dotenv = Dotenv::createImmutable(__DIR__ . '/../../src');
        $dotenv->safeLoad();
        $dbHost = $_ENV['DB_HOST'] ?? '';
        $dbName = $_ENV['DB_NAME'] ?? '';
        $dbUsername = $_ENV['DB_USERNAME'] ?? '';
        $dbPassword = $_ENV['DB_PASSWORD'] ?? '';

        try {
            $this->pdo = new PDO('mysql:host=' . $dbHost . ';dbname=' . $dbName, $dbUsername, $dbPassword);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch (PDOException $e) {
            echo "Error connecting to the database: " . $e->getMessage() . "\n";
            echo "File: " . $e->getFile() . "\n";
            echo "Line: " . $e->getLine() . "\n";
            die();
        }

    }

    public static function getInstance(): ?DB
    {
        if (!self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function getConnection(): PDO
    {
        return $this->pdo;
    }

    public function generateSampleData(): void
    {
        $faker = Factory::create('de_DE');

        try {
            $this->pdo->beginTransaction();

            for ($i = 0; $i < 100; $i++) {
                $accountNumber = $faker->bankAccountNumber;
                $balance = $faker->randomFloat(2, 100, 10000);
                $sql = "INSERT INTO accounts(account_number, balance) VALUES (:account_number, :balance)";
                $stmt = $this->pdo->prepare($sql);

                $stmt->bindParam(':account_number', $accountNumber);
                $stmt->bindParam(':balance', $balance);

                $stmt->execute();
                echo $accountNumber . "\n";
            }

            $this->pdo->commit();
        } catch (PDOException $e) {
            $this->pdo->rollBack();
            echo "Error inserting data: " . $e->getMessage();
        }
    }
}