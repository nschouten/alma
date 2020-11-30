<?php

Class Payment{

    public function __construct($data){
        $this->id = $data["id"];
        $this->intOrderDate = $data["intOrderDate"];
        $this->fTotal = $data["fTotal"];
        $this->strCCName = $data["strCCName"];
        $this->intCCNumber = $data["intCCNumber"];
        $this->strExp = $data["strExp"];
        $this->intCVV = $data["intCVV"];
        
    }

    public static function getPaymentByID($oID){ 
        
        $payment = DB::query("SELECT orders.*, payment.*
                            FROM orders
                            LEFT JOIN payment on orders.intPaymentID=payment.id
                            WHERE orders.id=".$oID);
                            
        return new Payment($payment[0]);
    }
}