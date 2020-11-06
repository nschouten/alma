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
        $this->loadView("views/homepage.php");
        $this->loadView("views/footer.php");
        $this->loadFinalView("views/main.php");
    }

    public function shopMain(){
   
        $this->logo = "<img src='imgs/logo.png' alt='logo'/>";
        $this->header = "Shop";

        $this->loadView("views/header.php");
        $this->loadView("views/shop.php");
        $this->loadView("views/footer.php");
        $this->loadFinalView("views/main.php");

    }

    public function shopItem(){

        $this->logo = "<img src='imgs/logo.png' alt='logo'/>";
        $this->header = "Shop";
        
        $this->loadView("views/header.php");
        $this->loadView("views/item.php");
        $this->loadView("views/footer.php");
        $this->loadFinalView("views/main.php");
    }

    public function cartMain(){
        $this->logo = "<img src='imgs/logo.png' alt='logo'/>";
        $this->header = "Cart";

        $this->loadView("views/header.php");
        $this->loadView("views/cart.php");
        $this->loadView("views/footer.php");
        $this->loadFinalView("views/main.php");
        
    }

    public function Login(){

        $this->logo = "<img src='imgs/logo.png' alt='logo'/>";
        $this->header = "Login";

        $this->loadView("views/header.php");
        $this->loadView("views/login.php");
        $this->loadView("views/footer.php");
        $this->loadFinalView("views/main.php");
    }

    public function doLogIn(){
    //     $_SESSION["userId"] = User::LogIn($_POST["username"], $_POST["password"]);

	// 	if ($_SESSION["userId"])
	// 	{
	// 		$this->go("user", "main"); // if details entered exist in the db allow user to login
	// 	} else {
	// 		//$this->loadView("views/login.php");
	// 		$this->go("public", "errorLogin"); // if details entered do not exist in the db redirect user back to login form with error
	// 	}
	// }
    }

    public function registerMain(){

        $this->hero = "<img src='imgs/heropalm.png' alt='hero'/>";
        $this->logo = "<img src='imgs/logo.png' alt='logo'/>";
        $this->header = "Register";

        $this->loadView("views/header.php");
        $this->loadView("views/register.php");
        $this->loadView("views/footer.php");
        $this->loadFinalView("views/main.php");

    }




}