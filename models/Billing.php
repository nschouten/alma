<?php

Class Billing{

    public function __construct($data){

        $this->id = $data["id"];
        $this->intOrderDate = $data["intOrderDate"];
        $this->fTotal = $data["fTotal"];
        $this->strFirstName = $data["strFirstName"];
        $this->strLastName = $data["strLastName"];
        $this->strAddress = $data["strAddress"];
        $this->strCity = $data["strCity"];
        $this->strProvince = $data["strProvince"];
        $this->strZIP = $data["strZIP"];
        $this->strPhone = $data["strPhone"];
        
        
    }

    public static function getBillingByID($oID){ 
        
        $billing = DB::query("SELECT orders.*, billing.*
                            FROM orders
                            LEFT JOIN billing on orders.intBillingID=billing.id
                            WHERE orders.id=".$oID);
                            
        return new Billing($billing[0]);
    }
}