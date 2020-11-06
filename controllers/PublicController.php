<?php

Class PublicController extends Controller{

    var $content = "";

    public function main(){
        $this->loadView("views/homepage.php");
        $this->loadFinalView("views/main.php");
    }
}