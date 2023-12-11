<?php
declare(strict_types=1);

namespace Jure\Accounts\Controllers;

use Jure\Accounts\Models\AccountModel;

class AccountController
{
    private AccountModel $model;

    public function __construct()
    {
        $this->model = new AccountModel();
    }

    public function getAllAccounts(): array
    {

        $accounts = $this->model->findAllAccounts();
        require_once __DIR__ . '/../Views/transfer.php';
        return $accounts;
    }
}
