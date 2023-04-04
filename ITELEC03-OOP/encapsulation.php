<?php

class BankAccount {
  private $balance;

  public function __construct($balance) {
    $this->balance = $balance;
  }

  public function deposit($amount) {
    $this->balance += $amount;
  }

  public function withdraw($amount) {
    if ($amount <= $this->balance) {
      $this->balance -= $amount;
    } else {
      echo "Insufficient balance!";
    }
  }

  public function getBalance() {
    return $this->balance;
  }
}

// Create object
$account1 = new BankAccount(5000);

// Deposit money
$account1->deposit(2000);

// Withdraw money
$account1->withdraw(3000);

// Get balance
echo "Current balance: " . $account1->getBalance();

?>

<!-- In this example, we have a BankAccount class with a private property (balance) and three public methods (deposit, withdraw, and getBalance). The balance property is encapsulated so it cannot be accessed or modified directly. Instead, we use the public methods to interact with the balance property.

We create an instance of the BankAccount class ($account1) and call its methods to deposit money, withdraw money, and get the current balance. The withdraw method checks if the requested amount is less than or equal to the current balance before deducting it from the balance. If the requested amount is greater than the current balance, it displays an error message. -->