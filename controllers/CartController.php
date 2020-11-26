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


}