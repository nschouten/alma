<?php

Class LoginController extends Controller{

    public function adminLogin(){

        $this->loadData("<img src='imgs/logo.png' alt='logo'/>", "logo");
        $this->loadData("Admin Log In", "header");
        

        $this->loadView("views/header.php");
        $this->loadView("views/hero.php");
        $this->loadView("views/adminLogin.php");
        $this->loadView("views/footer.php");
        $this->loadFinalView("views/main.php");
    }

    public function adminLoginError(){

        $this->loadData("<img src='imgs/logo.png' alt='logo'/>", "logo");
        $this->loadData("Oops", "header");
        

        $this->loadView("views/header.php");
        $this->loadView("views/hero.php");
        $this->loadView("views/adminLoginError.php");
        $this->loadView("views/footer.php");
        $this->loadFinalView("views/main.php");
    }

    public function userLogin(){

        $this->loadData("<img src='imgs/logo.png' alt='logo'/>", "logo");
        $this->loadData("But first, log in", "header");

        $this->loadView("views/header.php");
        $this->loadView("views/hero.php");
        $this->loadView("views/userLogin.php");
        $this->loadView("views/footer.php");
        $this->loadFinalView("views/main.php");
    }

    public function userLoginError(){

        $this->loadData("<img src='imgs/logo.png' alt='logo'/>", "logo");
        $this->loadData("Oops, try again", "header");

        $this->loadView("views/header.php");
        $this->loadView("views/hero.php");
        $this->loadView("views/checkoutLoginError.php");
        $this->loadView("views/footer.php");
        $this->loadFinalView("views/main.php");
    }

    public function processAdminLogin(){
        $_SESSION["aID"] = Admin::Login($_POST["strEmail"], $_POST["strPassword"]);
    //    print_r($_SESSION["aID"]);
    //    die;
		if ($_SESSION["aID"])
		{   
            header("location: index.php?controller=admin&action=mainAdmin");
        
            // if details entered exist in the db allow user to login
		} else {

			$this->goHere("login", "adminLoginError"); // if details entered do not exist in the db redirect user back to login form with error
        }
    }

    public function processUserLogin(){
        $_SESSION["uID"] = User::Login($_POST["strEmail"], $_POST["strPassword"]);
       
		if ($_SESSION["uID"])
		{   
            header("location: index.php?controller=public&action=main");
        
            // if details entered exist in the db allow user to login
		} else {

			header("location <?=$this->error?>"); // if details entered do not exist in the db redirect user back to login form with error
        }
    }

}