<?php

Class UserController extends Controller{


    public function reviewSuccess(){
        $this->loadData("Review Submitted", "header");
        $this->loadData("<img src='imgs/logo.png' alt='logo'/>", "logo");
        $this->loadData(Products::getProducts(), "oProducts");
        $this->loadData(Categories::getCat(), "oCat");

        $this->loadView("views/header.php");
        $this->loadView("views/hero.php");
        $this->loadView("views/productsMain.php");
        $this->loadView("views/footer.php");
        $this->loadFinalView("views/main.php");
    }

    public function addReview(){

        $con = DB::connect();
        $timestamp =round(microtime(true) * 1000);
        $target_dir = "assets/"; 
        $target_file = $target_dir.basename($timestamp.$_FILES["strFileName"]["name"]);
        // echo($target_file);
        // die;
        $ext = strtolower(pathinfo($_FILES['strFileName']['name'], PATHINFO_EXTENSION));
        $fileTypeAllowed = array('pdf', 'png', 'jpeg', 'jpg');

        if(!in_array($ext, $fileTypeAllowed))
        {
            echo ("file type not allowed");
            $target_file = null;

        } else {

            move_uploaded_file($_FILES["strFileName"]["tmp_name"], $target_file);
            $fileAllowed = 1; 
        
        }

        if($_POST['intUserID'] && $_POST['intProductID'] && $_POST['intRating'] && $_POST['strComment'] && $target_file)
        {
            $sql = "INSERT INTO reviews(intUserID, intProductID, intRating, strComment, strFileName)
                    VALUES ('".$_POST['intUserID']."', '".$_POST['intProductID']."', '".$_POST['intRating']."', '".$_POST['strComment']."', '".$target_file."')";
            // echo($sql);
            $results = mysqli_query($con, $sql);

            header("location: index.php?controller=user&action=reviewSuccess");

        } else {

        echo("something went wrong");

        }   

    }

    public function checkout(){
        
        $this->loadData("<img src='imgs/logo.png' alt='logo'/>", "logo");
        $this->loadData("Checkout", "header");
        $this->loadData(Cart::show(), "CartContents");

        $this->loadView("views/header.php");
        $this->loadView("views/hero.php");
        $this->loadView("views/checkout.php");
        $this->loadView("views/footer.php");
        $this->loadFinalView("views/main.php");

    }

    
    public function checkoutError(){
        
        $this->loadData("<img src='imgs/logo.png' alt='logo'/>", "logo");
        $this->loadData("Oops, Please Try Again!", "header");
        $this->loadData(Cart::show(), "CartContents");

        $this->loadView("views/header.php");
        $this->loadView("views/hero.php");
        $this->loadView("views/checkout.php");
        $this->loadView("views/footer.php");
        $this->loadFinalView("views/main.php");

    }


    public function pretrip(){

        if($_SESSION["uID"] == "")
        {
            $this->goHere("public", "main");
            
        } else {
        
        $this->oUser = User::getCurrentUser();
        
        // echo $this->oUser->id;
        
        }
    }
}