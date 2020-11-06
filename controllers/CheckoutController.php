<?php

Class Checkout extends Controller{
    
    var $content = "";

    public function checkoutMain(){

    }

    public function pretrip(){
        if($_SESSION["userID"]=="")
        {
            $this->go("public", "registerMain");

        } else {
            
            $this->go("checkout", "checkoutMain");
        }
    }

}

?>