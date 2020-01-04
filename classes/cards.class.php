<?php

interface PaymentInterface  {
    public function payNow();
}
interface LogInInterface  {
    public function loginFirst();
}

class PayPal implements PaymentInterface, LogInInterface{
    public function loginFirst(){}
    public function payNow(){}
    public function paymentProcess(){
        $this->loginFirst();
        $this->payNow();
    }

}

class BankTransfer implements PaymentInterface, LogInInterface{
    public function loginFirst(){}
    public function payNow(){}
    public function paymentProcess(){
        $this->loginFirst();
        $this->payNow();
    }

}
class Visas implements PaymentInterface{
    public function payNow(){}
    public function paymentProcess(){
        
        $this->payNow();
    }
}
class Cash implements PaymentInterface{
    public function payNow(){}
    public function paymentProcess(){
       
        $this->payNow();
    }
}

class BuyProduct{
    //указав интерфейс перед именем переменной можно использовать разные классы для взаимодействия
    public function pay(PaymentInterface $paymentType){
        $paymentType->paymentProcess();
    }
}

$paymentType = new Cash();
$buyProducts = new BuyProduct();
//таким образом мы имеем доступ ко всей информации в классе Cash
$buyProducts->pay($paymentType);