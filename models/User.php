<?php 

Class User{

    public function __construct($userData){

        $this->admin = $userData["strEmail"];
    }

    public static function Login($strEmail, $strPassword){

        if($_POST["strEmail"] && $_POST["strPassword"])
        {
            // $strUsername = mysqli_real_escape_string(DB::connect(), $_POST["strEmail"]);
            // $strPassword = mysqli_real_escape_string(DB::connect(), $_POST["strPassword"]);
    
            $arrUser = DB::query("SELECT * FROM users WHERE strEmail='".$strEmail."' AND strPassword='".$strPassword."'");
        
            // print_r($arrAdmin);
            
            
            if($arrUser)
            {
                return $arrUser[0]["id"];

            } else {

                return false;
            }
        }
    }

    public static function getCurrentUser(){

        $arrUser = DB::query("SELECT *
                                FROM users
                                WHERE id =".$_SESSION["uID"]);

        return new User($arrUser[0]);
    }
}
?>