<?php 

Class Admin{

    public function __construct($adminData){

        $this->admin = $adminData["strEmail"];
    }

    public static function Login($strEmail, $strPassword){

        if($_POST["strEmail"] && $_POST["strPassword"])
        {
            // $strUsername = mysqli_real_escape_string(DB::connect(), $_POST["strEmail"]);
            // $strPassword = mysqli_real_escape_string(DB::connect(), $_POST["strPassword"]);
    
            $arrAdmin = DB::query("SELECT * FROM admins WHERE strEmail='".$strEmail."' AND strPassword='".$strPassword."'");
        
            // print_r($arrAdmin);
            
            
            if($arrAdmin)
            {
                return $arrAdmin[0]["id"];

            } else {

                return false;
            }
        }
    }

    public static function getCurrentAdmin(){

        $arrAdmin = DB::query("SELECT *
                                FROM admins
                                WHERE id =".$_SESSION["aID"]);

        return new Admin($arrAdmin[0]);
    }
}
?>