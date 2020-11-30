<?php

Class CmsController extends Controller{

    public function customers(){
        $this->loadData("<img src='imgs/hero1.jpg' alt='hero'/>", "hero");
        $this->loadData("<img src='imgs/logo.png' alt='logo'/>", "logo");
        $this->loadData("Customers", "header");
        $this->loadData(Customers::getCustomers(), "oCustomers");

        $this->loadView("views/cmsHeader.php");
        $this->loadView("views/hero.php");
        $this->loadView("views/cmsCustomers.php");
        $this->loadView("views/footer.php");
        $this->loadFinalView("views/main.php");
    } 

    public function customer(){
        $this->loadData("<img src='imgs/hero1.jpg' alt='hero'/>", "hero");
        $this->loadData("<img src='imgs/logo.png' alt='logo'/>", "logo");
        $this->loadData("Customer", "header");

        $this->loadView("views/cmsHeader.php");
        $this->loadView("views/hero.php");
        $this->loadView("views/cmsCustomer.php");
        $this->loadView("views/footer.php");
        $this->loadFinalView("views/main.php");
    }

    public function orders(){
        $this->loadData("<img src='imgs/hero1.jpg' alt='hero'/>", "hero");
        $this->loadData("<img src='imgs/logo.png' alt='logo'/>", "logo");
        $this->loadData("Orders", "header");
        $this->loadData(Orders::getOrders(), "oOrders");

        $this->loadView("views/cmsHeader.php");
        $this->loadView("views/hero.php");
        $this->loadView("views/cmsOrders.php");
        $this->loadView("views/footer.php");
        $this->loadFinalView("views/main.php");
    }

    public function order(){
        $this->loadData("<img src='imgs/hero1.jpg' alt='hero'/>", "hero");
        $this->loadData("<img src='imgs/logo.png' alt='logo'/>", "logo");
        $this->loadData("Order", "header");
        $this->loadData(Order::getOrder($_GET['oID']), "oOrder");
        $this->loadData(Billing::getBillingByID($_GET['oID']), "oBilling");
        $this->loadData(Payment::getPaymentByID($_GET['oID']), "oPayment");
        // $this->loadData(Shipping::getShipping($_GET['oID']), "oShipping");

        $this->loadView("views/cmsHeader.php");
        $this->loadView("views/hero.php");
        $this->loadView("views/cmsOrder.php");
        $this->loadView("views/footer.php");
        $this->loadFinalView("views/main.php");
    }

    public function cmsProducts(){
        $this->loadData("Products", "header");
        $this->loadData("<img src='imgs/hero1.jpg' alt='hero'/>", "hero");
        $this->loadData("<img src='imgs/logo.png' alt='logo'/>", "logo");
        $this->loadData(Products::getAllProducts(), "oProducts");
        // $this->loadData(Admin::getCurrentAdmin(), "oAdmin");

        $this->loadView("views/cmsHeader.php");
        $this->loadView("views/hero.php");
        $this->loadView("views/cmsProducts.php");
        $this->loadView("views/footer.php");
        $this->loadFinalView("views/main.php");
    }
 
    public function cmsProduct(){
        $this->loadData("Edit", "header");
        $this->loadData("<img src='imgs/hero1.jpg' alt='hero'/>", "hero");
        $this->loadData("<img src='imgs/logo.png' alt='logo'/>", "logo");
        if(isset($_GET['pID'])){
            $this->loadData(Product::getProduct($_GET['pID']), "oProduct");
            $this->loadData(Inventory::getInvenByID($_GET['pID']), "oInven");
        }
        
        $this->loadData(Categories::getCat(), "oCat");
        $this->loadData(Colors::getColors(), "oColors");
        $this->loadData(Sizes::getSizes(), "oSizes");
        // $this->loadData(Admin::getCurrentAdmin(), "oAdmin");

        $this->loadView("views/cmsHeader.php");
        $this->loadView("views/hero.php");
        $this->loadView("views/cmsProduct.php");
        $this->loadView("views/footer.php");
        $this->loadFinalView("views/main.php");

    }

    public function updateProd(){

       if(Product::saveProduct($_POST['intProductID'], $_POST['strProdName'], $_POST['intCatID'], $_POST['fPrice'], $_POST['strProdDesc'], $_POST['intSizeID'], $_POST['intSizeID'], $_POST['intQty'], $_POST['intSku']))
       {
           header("location: index.php?controller=cms&action=cmsProduct&pID=$intProductID");

       } else {

        echo("something went wrong");

       }

    }

    public function addProduct(){
        $this->loadData("<img src='imgs/hero1.jpg' alt='hero'/>", "hero");
        $this->loadData("<img src='imgs/logo.png' alt='logo'/>", "logo");
        $this->loadData("Add Product", "header");
        $this->loadData(Categories::getCat(), "oCat");
        $this->loadData(Colors::getColors(), "oColors");
        $this->loadData(Sizes::getSizes(), "oSizes");
        // $this->loadData(Admin::getCurrentAdmin(), "oAdmin");

        $this->loadView("views/cmsHeader.php");
        $this->loadView("views/hero.php");
        $this->loadView("views/cmsAddProduct.php");
        $this->loadView("views/footer.php");
        $this->loadFinalView("views/main.php");
    }

    public function addProdSuccess(){
        $this->loadData("<img src='imgs/hero1.jpg' alt='hero'/>", "hero");
        $this->loadData("<img src='imgs/logo.png' alt='logo'/>", "logo");
        $this->loadData("Product Added!", "header");
        $this->loadData(Categories::getCat(), "oCat");
        $this->loadData(Colors::getColors(), "oColors");
        $this->loadData(Sizes::getSizes(), "oSizes");
        // $this->loadData(Admin::getCurrentAdmin(), "oAdmin");

        $this->loadView("views/cmsHeader.php");
        $this->loadView("views/hero.php");
        $this->loadView("views/cmsAddProduct.php");
        $this->loadView("views/footer.php");
        $this->loadFinalView("views/main.php");
    }

    public function addProdError(){
        $this->loadData("<img src='imgs/hero1.jpg' alt='hero'/>", "hero");
        $this->loadData("<img src='imgs/logo.png' alt='logo'/>", "logo");
        $this->loadData("Oops, try again", "header");
        $this->loadData(Categories::getCat(), "oCat");
        $this->loadData(Colors::getColors(), "oColors");
        $this->loadData(Sizes::getSizes(), "oSizes");
        // $this->loadData(Admin::getCurrentAdmin(), "oAdmin");

        $this->loadView("views/cmsHeader.php");
        $this->loadView("views/hero.php");
        $this->loadView("views/cmsAddProduct.php");
        $this->loadView("views/footer.php");
        $this->loadFinalView("views/main.php");
    }

    public function addNewProduct(){
        
        if(Product::addNewProd($_POST['strProdName'], $_POST['fPrice'], $_POST['intCatID'], $_POST['strProdDesc'], $_POST['intColorID'], $_POST['intSizeID'], $_POST['intQty']))
       {
           header("location: index.php?controller=cms&action=addProdSuccess");

       } else {

            header("location: index.php?controller=cms&action=addProdError");

       }
        

    }

    public function pretrip(){

        if($_SESSION["aID"] == "")
        {
            $this->goHere("public", "adminLoginError");
            
        } else {
        
        $this->oAdmin = Admin::getCurrentAdmin();
        
        // echo $this->oAdmin->id;
        
        }
    }

}