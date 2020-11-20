<?php

Class AdminController extends Controller{

    public function mainAdmin(){
        $this->loadData("<img src='imgs/hero1.jpg' alt='hero'/>", "hero");
        $this->loadData("<img src='imgs/logo.png' alt='logo'/>", "logo");
        // $this->loadData(Admin::getCurrentAdmin(), "oAdmin");

        $this->loadView("views/cmsHeader.php");
        $this->loadView("views/hero.php");
        $this->loadView("views/cmsHome.php");
        $this->loadView("views/footer.php");
        $this->loadFinalView("views/main.php");
    }

    public function saveProduct(){
        
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