<?php

Class Admin extends Controller{

    public function cms(){
        
    }

    public function mainProducts(){
        
    }

    public function mainProduct(){
        
    }

    public function mainOrders(){
        
    }

    public function mainOrder(){
        
    }

    public function mainCustomers(){
        
    }

    public function mainCustomer(){
        
    }

    public function pretrip(){

        if($_SESSION["aID"] == "")
        {
            $this->goHere("public", "cms");
            
        } else {
        
        $this->oAdmin = Admin::getCurrentAdmin();
        
        echo $this->oAdmin->id;
        
        }
    }
    
}