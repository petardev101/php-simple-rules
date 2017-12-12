<?php

//never abbreviate!
class Trnsltr
{

}

//adds up quickly to a poorly built app. $x for name is difficult to remember
foreach ( $x in $people )
{

}

//be explicit and use UserRepository
class UserRepo
{
    public function fetch($billingId) //change fetch to fetchByBillingId
    {
        
    }
}

//be explicit, but not too explicit
class Order
{
    public function shipOrder()
    {
        
    }
}

$order->shipOrder(); //could change method to ship to avoid repeating order