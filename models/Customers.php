<?php

Class Customers{

    public function __construct($userData){

        $this->id = $userData["id"];
        $this->strEmail = $userData["strEmail"];
        $this->strFullName = $userData["strFullName"];
    }

    public static function getCustomers(){ 
        
        $customers = DB::query("SELECT CONCAT(strFirstName, ' ', strLastName) AS strFullName, id, strEmail
                            FROM users 
                            ORDER BY strLastName");

        $arrCustomers = array();

        foreach($customers as $data)
        {
            $arrCustomers[] = new Customers($data);
        }

        return $arrCustomers;
    }

}