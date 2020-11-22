<?php

Class RegisterController extends Controller {

    public function register(){

        $this->loadData("<img src='imgs/logo.png' alt='logo'/>", "logo");
        $this->loadData("Register", "header");

        $this->loadView("views/header.php");
        $this->loadView("views/hero.php");
        $this->loadView("views/register.php");
        $this->loadView("views/footer.php");
        $this->loadFinalView("views/main.php");

    }

    static public function registerUser(){

        if($_POST['strFirstName'] && $_POST['strLastName'] && $_POST['strEmail'] && $_POST['strPassword'])
        {
            $con = DB::connect();
            $sql = "INSERT INTO users(strFirstName, strLastName, strEmail, strPassword)
                    VALUES ('".$_POST['strFirstName']."', '".$_POST['strLastName']."', '".$_POST['strEmail']."', '".$_POST['strPassword']."')";
            
            $results = mysqli_query($con, $sql);
            
            header("location: index.php?controller=login&action=userLogin");

        } else {

            header("location: index.php?controller=login&action=userLoginError");

        }   
    }

}