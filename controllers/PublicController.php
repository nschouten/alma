<?php

Class PublicController extends Controller{

    public function main(){
        
        $this->loadData("<img src='imgs/hero1.jpg' alt='hero'/>", "hero");
        $this->loadData("<img src='imgs/logo.png' alt='logo'/>", "logo");

        $this->loadView("views/header.php");
        $this->loadView("views/homepage-hero.php");
        $this->loadView("views/homepage.php");
        $this->loadView("views/footer.php");
        $this->loadFinalView("views/main.php");
    }

    public function products(){
 
        $this->loadData("Shop", "header");
        $this->loadData("<img src='imgs/logo.png' alt='logo'/>", "logo");

        $this->loadView("views/header.php");
        $this->loadView("views/hero.php");
        $this->loadView("views/products.php");
        $this->loadView("views/footer.php");
        $this->loadFinalView("views/main.php");

    }

    public function product(){

        $this->loadData("<img src='imgs/logo.png' alt='logo'/>", "logo");
        $this->loadData("Shop", "header");
        
        $this->loadView("views/header.php");
        $this->loadView("views/hero.php");
        $this->loadView("views/product.php");
        $this->loadView("views/footer.php");
        $this->loadFinalView("views/main.php");
    }

    public function cart(){
        $this->loadData("<img src='imgs/logo.png' alt='logo'/>", "logo");
        $this->loadData("Cart", "header");

        $this->loadView("views/header.php");
        $this->loadView("views/hero.php");
        $this->loadView("views/cart.php");
        $this->loadView("views/footer.php");
        $this->loadFinalView("views/main.php");
        
    }

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


    public function register(){

        $this->loadData("<img src='imgs/logo.png' alt='logo'/>", "logo");
        $this->loadData("Register", "header");

        $this->loadView("views/header.php");
        $this->loadView("views/hero.php");
        $this->loadView("views/register.php");
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

			$this->goHere("public", "adminLoginError"); // if details entered do not exist in the db redirect user back to login form with error
        }
    }

    public function processUserLogin(){
        $_SESSION["uID"] = User::Login($_POST["strEmail"], $_POST["strPassword"]);
       
		if ($_SESSION["uID"])
		{   
            header("location <?=$this->success?>");
        
            // if details entered exist in the db allow user to login
		} else {

			header("location <?=$this->error?>"); // if details entered do not exist in the db redirect user back to login form with error
        }
    }

    static public function addUser(){

        if($_POST['strFirstName'] && $_POST['strLastName'] && $_POST['strEmail'] && $_POST['strPassword'])
        {
            $con = DB::connect();
            $sql = "INSERT INTO users(strFirstName, strLastName, strEmail, strPassword)
                    VALUES ('".$_POST['strFirstName']."', '".$_POST['strLastName']."', '".$_POST['strEmail']."', '".$_POST['strPassword']."')";
            
            $results = mysqli_query($con, $sql);
            
            header("location: index.php?controller=public&action=userLogin");

        } else {

            header("location: index.php?controller=public&action=userLoginError");

        }   
    }
}