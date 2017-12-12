<?php

class BankAccounts
{
    protected $accounts;

    public function __construct($accounts)
    {
        $this->accounts = $accounts;
    }

    // public function filterBy($accountType)
    // {   
    //     $filtered = [];

    //     //0
    //     foreach ($this->accounts as $accounts)
    //     {
    //         //1
    //         if ($accounts->type() == $accountType) {
    //             //2
    //             if ($accounts->isActive()) {
    //                 //3 levels of indentation
    //                 $filtered[] = $accounts;
    //             }
    //         }
    //     }

    //     return $filtered;
    // }

    //REFACTORED METHOD
    public function filterBy($accountType)
    {
        return array_filter($this->accounts, function($account) use ($accountType)
        {
            return $account->isOfType($accountType, $account);  
        });
    }
} 

class Account
{
    protected $type;

    private function __construct($type)
    {
        $this->type = $type; 
    }

    public static function open($type)
    {
        return new static($type);
    }
    
    public function isOfType($accountType)
    {
        return $this->type() == $accountType && $this->isActive();
    }

    private function type()
    {
        return $this->type;
    }

    private function isActive()
    {
        return true; //hard coded for demo
    }

}

$accounts = [
    Account::open('checking'),
    Account::open('savings'),
    Account::open('checking'),
    Account::open('savings')
];

$accounts = new BankAccounts($accounts);

$savings = $accounts->filterBy('savings');

var_dump($savings);



