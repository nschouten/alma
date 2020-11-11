<?php

Class User extends Controller{

    public function main(){
        
    }

    public function review(){
        
    }

    public function checkout(){
        
    }

    static public function addUser(){

        if($_POST['strFirstName'] && $_POST['strLastName'] && $_POST['strEmail'] && $_POST['strPassword'])
        {
            $con = DB::connect();
            $sql = "INSERT INTO VIP(strFirstName, strLastName, strEmail, strPhone, strCountry, intAge, strFileName)
                    VALUES ('".$_POST['strFirstName']."', '".$_POST['strLastName']."', '".$_POST['strEmail']."', '".$_POST['strPhone']."', '".$_POST['strCountry']."', '".$_POST['intAge']."', '".$target_file."')";
            
            $results = mysqli_query($con, $sql);
            header("location: index.php?controller=public&action=successVIP");

        } else {

        echo("something went wrong");

        }   
    }

    public function pretrip(){

        if($_SESSION["uID"] == "")
        {
            $this->goHere("public", "main");
            
        } else {
        
        $this->oUser = User::getCurrentUser();
        
        echo $this->oUser->id;
        
        }
    }
}