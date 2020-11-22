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

    public function productsMain(){
 
        $this->loadData("Shop", "header");
        $this->loadData("<img src='imgs/logo.png' alt='logo'/>", "logo");
        $this->loadData(Products::getProducts(), "oProducts");
        $this->loadData(Categories::getCat(), "oCat");

        $this->loadView("views/header.php");
        $this->loadView("views/hero.php");
        $this->loadView("views/productsMain.php");
        $this->loadView("views/footer.php");
        $this->loadFinalView("views/main.php");

    }

    public function productMain(){

        $this->loadData("<img src='imgs/logo.png' alt='logo'/>", "logo");
        $this->loadData("Shop", "header");
        $this->loadData(Product::getProduct($_GET['pID']), "oProduct");
        $this->loadData(Imgs::getImgsByID($_GET['pID']), "oImgs");
        $this->loadData(Imgs::getMainImg($_GET['pID']), "oImg");
        $this->loadData(Variants::getSizes(), "oSizes");
        $this->loadData(Variants::getColors($_GET['pID']), "oColors");
        $this->loadData(Sku::getSku($_GET['pID']), "oSku");
        
        $this->loadView("views/header.php");
        $this->loadView("views/hero.php");
        if($_SESSION["uID"] == "")
        {
            $this->loadView("views/productMain.php");

        } else {
            
            $this->loadView("views/reviewUser.php");
            
        }
        $this->loadView("views/footer.php");
        $this->loadFinalView("views/main.php");
    }

}