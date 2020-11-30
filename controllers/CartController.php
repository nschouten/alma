<?php

Class CartController extends Controller{

    public function cartMain(){
        $this->loadData("<img src='imgs/logo.png' alt='logo'/>", "logo");
        $this->loadData("Cart", "header");
        $this->loadData(Cart::show(), "CartContents");
        $this->loadView("views/header.php");
        $this->loadView("views/hero.php");
        $this->loadView("views/cartMain.php");
        $this->loadView("views/footer.php");
        $this->loadFinalView("views/main.php");
        
    }

    public function addToCart(){
   
        Cart::addToCart($_POST['intProductID'], $_POST['fPrice'], $_POST['intQty'], $_POST['intColorID'], $_POST['intSizeID'], $_POST['strImgFile'], $_POST['strProdName']);
    }

    public function empty(){

        Cart::emptyCart();
    }

    public function remove(){

        Cart::removeFromCart($intSku);
    }

    public function placeOrder(){
   
        if(Cart::cartCheckout($_POST['intUserID'], $_POST['intOrderDate'], $_POST['strFirstName'], $_POST['strLastName'], $_POST['strAddress'], $_POST['strCity'], $_POST['strProvince'], $_POST['strZIP'], $_POST['strPhone'], $_POST['strFirstNameS'], $_POST['strLastNameS'], $_POST['strAddressS'], $_POST['strCityS'], $_POST['strProvinceS'], $_POST['strZIPS'], $_POST['fTotal'] ,$_POST['strCCName'], $_POST['intCCNumber'], $_POST['strExp'], $_POST['intCVV']))
        {
            $_SESSION["arrCart"] = array();
            header("location: index.php?controller=public&action=purchaseSuccess");

        } else {

            header("location: index.php?controller=user&action=checkoutError");

        }
  
    }

}