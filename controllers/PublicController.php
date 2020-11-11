<?php

Class PublicController extends Controller{

    var $content = "";
    var $hero = "";
    var $logo = "";
    var $header = "";

    public function main(){
        
        $this->hero = "<img src='imgs/hero1.jpg' alt='hero'/>";
        $this->logo = "<img src='imgs/logo.png' alt='logo'/>";

        $this->loadView("views/header.php");
        $this->loadView("views/homepage-hero.php");
        $this->loadView("views/homepage.php");
        $this->loadView("views/footer.php");
        $this->loadFinalView("views/main.php");
    }

    public function items(){
   
        $this->logo = "<img src='imgs/logo.png' alt='logo'/>";
        $this->header = "Shop";

        $this->loadView("views/header.php");
        $this->loadView("views/hero.php");
        $this->loadView("views/shop.php");
        $this->loadView("views/footer.php");
        $this->loadFinalView("views/main.php");

    }

    public function item(){

        $this->logo = "<img src='imgs/logo.png' alt='logo'/>";
        $this->header = "Shop";
        
        $this->loadView("views/header.php");
        $this->loadView("views/hero.php");
        $this->loadView("views/item.php");
        $this->loadView("views/footer.php");
        $this->loadFinalView("views/main.php");
    }

    public function cartMain(){
        $this->logo = "<img src='imgs/logo.png' alt='logo'/>";
        $this->header = "Cart";

        $this->loadView("views/header.php");
        $this->loadView("views/hero.php");
        $this->loadView("views/cart.php");
        $this->loadView("views/footer.php");
        $this->loadFinalView("views/main.php");
        
    }

    public function login(){

        $this->logo = "<img src='imgs/logo.png' alt='logo'/>";
        $this->header = "Login";

        $this->loadView("views/header.php");
        $this->loadView("views/hero.php");
        $this->loadView("views/login.php");
        $this->loadView("views/footer.php");
        $this->loadFinalView("views/main.php");
    }

    public function register(){

        $this->hero = "<img src='imgs/heropalm.png' alt='hero'/>";
        $this->logo = "<img src='imgs/logo.png' alt='logo'/>";
        $this->header = "Register";

        $this->loadView("views/header.php");
        $this->loadView("views/hero.php");
        $this->loadView("views/register.php");
        $this->loadView("views/footer.php");
        $this->loadFinalView("views/main.php");

    }

    public function processAdminLogin(){
        $_SESSION["aID"] = Admin::Login($_POST["strEmail"], $_POST["strPassword"]);
       
		if ($_SESSION["aID"])
		{   
            $this->goHere("admin", "main");
        
            // if details entered exist in the db allow user to login
		} else {

			$this->goHere("public", "errorLogin"); // if details entered do not exist in the db redirect user back to login form with error
        }
    }

    public function processUserLogin(){
        $_SESSION["uID"] = User::Login($_POST["strEmail"], $_POST["strPassword"]);
       
		if ($_SESSION["uID"])
		{   
            $this->goHere("user", "main");
        
            // if details entered exist in the db allow user to login
		} else {

			$this->goHere("public", "errorLogin"); // if details entered do not exist in the db redirect user back to login form with error
        }
    }

    public function errorLogin(){

        $this->loadView("views/header.php");
        $this->loadView("views/loginError.php");
        $this->loadView("views/footer.php");
        $this->loadFinalView("views/main.php");

    }

    public function processNewUser(){
        $_SESSION["uID"] = User::addUser($_POST['strFirstName'], $_POST['strLastName'], $_POST['strEmail'], $_POST['strPassword']);

        if($_SESSION["uID"])
        {
            $this->goHere("public", "successVIP");
        } else {
            $this->goHere("public", "errorLogin");
        }
    }




}