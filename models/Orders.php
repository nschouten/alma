<?php

Class Orders {

    public function __construct($data){
        
            $this->id = $data["id"];
            $this->intOrderDate = $data["intOrderDate"];
            $this->fTotal = $data["fTotal"];
            $this->strFullName = $data["strFullName"];
    }


    public static function getOrders(){ 
        
        $orders = DB::query("SELECT orders.*, CONCAT(users.strFirstName, ' ', users.strLastName) AS strFullName
        FROM orders 
        LEFT JOIN users on orders.intUserID=users.id");
        
        $arrOrders = array();

        foreach($orders as $data)
        {
            $arrOrders[] = new Orders($data);
        }

        return $arrOrders;
    }

}