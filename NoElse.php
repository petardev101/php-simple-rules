<?php

//TWO: Never use the `else` keyword and use a DEFENSIVE approach to check what doesn't work first

public function store()
{
    $input = Request::all();
    $validation = Validator::make($input, ['username' => 'required']);

    if (date('l') == 'Friday') {
        throw new Exception('We do not work on Fridays!!');
    }
    if ($validation->fails()) {
        Redirect::back()->withInput()->withErrors($validation);    
    }
    Post::create($input);
    
    return Redirect::home();

//DONT DO
public function signUp($subscription)
{
    if ($subscription == 'monthly') {
        $this->createMonthlySubscription();
    } elseif ($subscription == 'forever') {
        $this->createForeverSubscription();
    }
}

//Refactor with interface and polymorphism
public function signUp2(Subscription $subscription)
{
    $subscription->create();
}

function factory($type)
{
    if ($type == 'forever') {
        return new ForeverSubscription;
    }
    return new MonthlySubscription;
}

$subscription = getSubscriptionType($type);

signUp2($subscription);