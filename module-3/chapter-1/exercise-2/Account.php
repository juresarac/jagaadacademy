<?php
class Account {
    private $id;
    private $name;
    private $balance;

    public function __construct($id, $name, $balance) {
        $this->id = $id;
        $this->name = $name;
        $this->balance = $balance;
    }

    public function credit($amount) {
        $this->balance += $amount;
        echo "$amount credited to {$this->name}. Current balance: {$this->balance}\n";
    }

    public function debit($amount) {
        if ($this->balance >= $amount) {
            $this->balance -= $amount;
            echo "$amount debited from {$this->name}. Current balance: {$this->balance}\n";
        } else {
            echo "Insufficient balance. Current balance: {$this->balance}\n";
        }
    }

    public function transferTo($anotherAccount, $amount) {
        if ($this->balance >= $amount) {
            $this->debit($amount);
            $anotherAccount->credit($amount);
            echo "$amount transferred from {$this->name} to {$anotherAccount->name}\n";
        } else {
            echo "Insufficient balance. Current balance: {$this->balance}\n";
        }
    }

    public function getBalance() {
        echo "Current balance of {$this->name}: {$this->balance}\n";
    }
}

// Example usage:
$account1 = new Account(1, "John Doe", 5000);
$account2 = new Account(2, "Jane Smith", 3000);

$account1->getBalance();
$account2->getBalance();

$account1->credit(1000);
$account1->debit(500);
$account1->transferTo($account2, 2000);

$account1->getBalance();
$account2->getBalance();
