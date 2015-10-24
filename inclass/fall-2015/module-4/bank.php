<?php

class BankAccount
{
    /**
     * The name of the person that owns this account
     * @var string
     */
    public $owner;

    /**
     * How much money this person has
     * @var float
     */
    protected $bankBalance;

    /**
     * Add some money to your account
     * @param float $amount How much you want to deposit
     * @return float
     */
    public function deposit($amount)
    {
        $this->bankBalance += $amount;

        return $this->bankBalance;
    }

    /**
     * Take some money out of your account
     * @param float $amount How much to take out of your account?
     * @todo: add validation to this to make sure they have enough money!
     *        Throw an Exception if they are broke!
     * @throws Exception
     * @return float
     */
    public function withdraw($amount)
    {
        if ($this->bankBalance < $amount) {
            throw new Exception('Go away');
        }

        if ($this->owner == 'Samir') {
            throw new Exception('Toobroke');
        }

        $this->bankBalance = $this->bankBalance - $amount;

        return $this->bankBalance;
    }
}


try {

    $myAccount = new BankAccount();
    $myAccount->owner = 'Samir';
    $myAccount->deposit(20);
    $myAccount->withdraw(20);

} catch (Exception $e) {

    echo 'An error occurred: ' . $e->getMessage();
}


//echo '<pre>';
//print_r( $e);
//die();

//echo '<pre>';
//print_r($myAccount);
//die();
