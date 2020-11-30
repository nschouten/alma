<?php

Class Order{

    public function __construct($data){
        
        if(isset($_GET['oID'])){
            $this->id = $data["id"];
            $this->intOrderDate = $data["intOrderDate"];
            $this->fTotal = $data["fTotal"];
            $this->strFullName = $data["strFullName"];
        }
    }

    public static function getOrder($oID){
        $order = DB::query("SELECT orders.*, CONCAT(users.strFirstName, ' ', users.strLastName) AS strFullName
        FROM orders 
        LEFT JOIN users on orders.intUserID=users.id
        WHERE orders.id=".$oID);

        return new Order($order[0]);
    }
}