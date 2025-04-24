<?php
/*
challenge 1 -> total of 20pts

1. Create a class called `BankTransaction` that has the following properties: (2pts)

- `bank_name`    note: example  BDO
- `transaction`  note: the value for this is 'D' for deposit or 'W' for withdraw
- `account_no`   note: example ACN0000001
- `amount`       note: the value for this is the amount to deposit or to withdraw
- `savings_amount` note: Balance amount money savings.

*/
class BankTransaction {
// 2. The `account_no` `amount` and savings_amount property should be `private`. And savings_amount  default is 10000. (2pts)    
    public $bank_name;
    public $transaction;
    private $account_no;
    private $amount;
    private $savings_amount = 10000;
    
// 3. Create a constructor that takes in the bank_name,transaction,account_no and amount as arguments and sets the values of the properties. (3pts)

    public function __construct($bank_name, $transaction, $account_no, $amount) {
        $this->bank_name = $bank_name;
        $this->transaction = $transaction;
        $this->account_no = $account_no;
        $this->amount = $amount;
    }

/*
4. Create a method called `getInfo` that will show the following: (3pts)

   Bank Name: BDO
   Customer Account No: ACNO0000001
   Type of Transaction: W
   Current Balance: 10000
   Amount: 3000
*/
    public function getInfo() {
        echo "Bank Name: {$this->bank_name}\n";
        echo "Customer Account No: {$this->account_no}\n";
        echo "Type of Transaction: {$this->transaction}\n";
        echo "Current Balance: {$this->savings_amount}\n";
        echo "Amount: {$this->amount}\n";
    }

// 5. Create a method called `newBalance` that returns the new balance after  deposit or withdraw (4pts)
    public function newBalance() {
        if ($this->transaction == 'D') {
            $newBalance = $this->savings_amount + $this->amount;
            echo "New Balance: {$newBalance}\n\n";
        } elseif ($this->transaction == 'W') {
            $newBalance = $this->savings_amount - $this->amount;
            echo "New Balance: {$newBalance}\n\n";
        } else {
            echo "Unable to process this transaction! Invalid Transaction type!\n\n";
        }
    }
}

$customer1 = new BankTransaction("BDO", "W", "ACNO0000001", 3000);
echo "Object: customer1\n";
$customer1->getInfo();
$customer1->newBalance();

$customer2 = new BankTransaction("BPI", "D", "ACNO0000002", 3000);
echo "Object: customer2\n";
$customer2->getInfo();
$customer2->newBalance();

$customer3 = new BankTransaction("METROBANK", "AB", "ACNO0000003", 3000);
echo "Object: customer3\n";
$customer3->getInfo();
$customer3->newBalance();

/*
6. Create 3 new instances/objects of the `BankTransaction` class and call the `getInfo`  and `newBalance` method (5pts)


Sample Output:

Object: customer1

Bank Name: BDO
Customer Account No: ACNO0000001
Type of Transaction: W
Current Balance: 10000
Amount: 3000
New Balance: 7000

Object customer2

Bank Name: BPI
Customer Account No: ACNO0000002
Type of Transaction: D
Current Balance: 10000
Amount: 3000
New Balance: 13000

Object customer3

Bank Name: METROBANK
Customer Account No: ACNO0000003
Type of Transaction: AB
Current Balance: 10000
Amount: 3000
Unable to process this transaction! Invalid Transaction type!

*/

?>


