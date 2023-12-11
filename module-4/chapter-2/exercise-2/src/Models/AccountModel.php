<?php
declare(strict_types=1);

namespace Jure\Accounts\Models;

use Jure\Accounts\App\DB;
use PDO;
use PDOException;

class AccountModel
{
    private $db;

    public function __construct()
    {
        $this->db = DB::getInstance()->getConnection();
    }

    public function findAllAccounts(): array
    {
        $sql = "SELECT * FROM accounts";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $accounts = [];

        while ($account = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $accounts[] = $account;
        }

        return $accounts;
    }

    public function findAccountById(int $id): ?array
    {
        $sql = "SELECT * FROM accounts WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        try{
            $stmt->execute([':id' => $id]);
            $account = $stmt->fetch(PDO::FETCH_ASSOC);
        }catch (PDOException $e){
            echo "Error finding your account: " . $e->getMessage();
            die();
        }

        return $account ?: null;
    }
}
