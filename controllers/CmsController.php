<?php

Class CmsController extends Controller{

    public function customers(){
        $this->loadData("<img src='imgs/hero1.jpg' alt='hero'/>", "hero");
        $this->loadData("<img src='imgs/logo.png' alt='logo'/>", "logo");
        $this->loadData(Customers::getCustomers(), "oCustomers");
        // $this->loadData(Admin::getCurrentAdmin(), "oAdmin");

        $this->loadView("views/cmsHeader.php");
        $this->loadView("views/hero.php");
        $this->loadView("views/cmsCustomers.php");
        $this->loadView("views/footer.php");
        $this->loadFinalView("views/main.php");
    } 

    public function customer(){
        $this->loadData("<img src='imgs/hero1.jpg' alt='hero'/>", "hero");
        $this->loadData("<img src='imgs/logo.png' alt='logo'/>", "logo");
        // $this->loadData(Admin::getCurrentAdmin(), "oAdmin");

        $this->loadView("views/cmsHeader.php");
        $this->loadView("views/hero.php");
        $this->loadView("views/cmsCutomer.php");
        $this->loadView("views/footer.php");
        $this->loadFinalView("views/main.php");
    }

    public function orders(){
        $this->loadData("<img src='imgs/hero1.jpg' alt='hero'/>", "hero");
        $this->loadData("<img src='imgs/logo.png' alt='logo'/>", "logo");
        // $this->loadData(Admin::getCurrentAdmin(), "oAdmin");

        $this->loadView("views/cmsHeader.php");
        $this->loadView("views/hero.php");
        $this->loadView("views/cmsOrders.php");
        $this->loadView("views/footer.php");
        $this->loadFinalView("views/main.php");
    }

    public function order(){
        $this->loadData("<img src='imgs/hero1.jpg' alt='hero'/>", "hero");
        $this->loadData("<img src='imgs/logo.png' alt='logo'/>", "logo");
        // $this->loadData(Admin::getCurrentAdmin(), "oAdmin");

        $this->loadView("views/cmsHeader.php");
        $this->loadView("views/hero.php");
        $this->loadView("views/cmsOrder.php");
        $this->loadView("views/footer.php");
        $this->loadFinalView("views/main.php");
    }

    public function cmsProducts(){
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
        $this->loadData("<img src='imgs/hero1.jpg' alt='hero'/>", "hero");
        $this->loadData("<img src='imgs/logo.png' alt='logo'/>", "logo");
        $this->loadData(Product::getProduct($_GET['pID']), "oProduct");
        $this->loadData(Inventory::getInvenByID($_GET['pID']), "oInven");
        
        // $this->loadData(Categories::getCat(), "oCat");
        // $this->loadData(Admin::getCurrentAdmin(), "oAdmin");

        $this->loadView("views/cmsHeader.php");
        $this->loadView("views/hero.php");
        $this->loadView("views/cmsProduct.php");
        $this->loadView("views/footer.php");
        $this->loadFinalView("views/main.php");

    }

    public function updateProd(){
        Product::updateProduct($_POST['pID'], $_POST['strProdName'], $_POST['strCatName'], $_POST['fPrice'], $_POST['strProdDesc'], $_POST['strColorName'], $_POST['strSizeName'], $_POST['intQty'] );
    }

    public function addProduct(){
        $this->loadData("<img src='imgs/hero1.jpg' alt='hero'/>", "hero");
        $this->loadData("<img src='imgs/logo.png' alt='logo'/>", "logo");
        $this->loadData("Add Product", "header");
        $this->loadData(Categories::getCat(), "oCat");
        // $this->loadData(Admin::getCurrentAdmin(), "oAdmin");

        $this->loadView("views/cmsHeader.php");
        $this->loadView("views/hero.php");
        $this->loadView("views/cmsAddProduct.php");
        $this->loadView("views/footer.php");
        $this->loadFinalView("views/main.php");
    }

    public function addNewProduct(){
        // if($_POST["name"] && $_POST["description"] && $_POST["due_date"] && $_POST["weight"])
		// {
		// 	$con = DB::connect();
		// 	$sql = "INSERT INTO assignments(name, description, due_date, weight) values ('".$_POST["name"]."', '".$_POST["description"]."','".$_POST["due_date"]."','".$_POST["weight"]."')";
		
		// 	mysqli_query($con, $sql);

		// 	// if successed new assignment
		// 	$this->go("assignments", "main"); 
		// } else {
		// 	// if unsucseful
		// 	$this->go("assignments", "addAssignment"); 
		// }

    }

    public function pretrip(){

        if($_SESSION["aID"] == "")
        {
            $this->goHere("public", "adminLoginError");
            
        } else {
        
        $this->oAdmin = Admin::getCurrentAdmin();
        
        echo $this->oAdmin->id;
        
        }
    }

}