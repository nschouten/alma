<?php

Class Cart {

    public static function addToCart($intProductID, $fPrice, $intQty, $intColorID, $intSizeID, $strImgFile, $strProdName){

        $intSku = Sku::getSku($intProductID, $intColorID, $intSizeID)->intSku;

        if(isset($_SESSION['arrCart'][$intSku])){
            
            $intQty = $_POST['intQty'] + $_SESSION['arrCart'][$intSku]['intQty'];
        }

        $_SESSION["arrCart"][$intSku] = array("fPrice"=>$fPrice, "intQty"=>$intQty,  "intProductID"=>$intProductID, "intColorID"=>$intColorID, "intSizeID"=>$intSizeID, "strImgFile"=>$strImgFile, "strProdName"=>$strProdName);

        header("location: index.php?controller=cart&action=cartMain");

    }

    static public function show(){
       
        return $_SESSION["arrCart"];       
    
    }

    static public function emptyCart(){

        $_SESSION["arrCart"] = array();

        header("location: index.php?controller=cart&action=cartMain");
    }

    static public function removeFromCart($intSku){

        unset($_SESSION["arrCart"][$intSku]);

        header("location: index.php?controller=cart&action=cartMain");
    }

    static public function showCartCount(){

        $intCartCount = 0;
        // print_r($_SESSION["arrCart"]);
        
        foreach($_SESSION["arrCart"] as $item)
        {
        
            $intCartCount = $intCartCount + $item["intQty"];
            
        }

        return $intCartCount;
    }

    static public function showSubTotal(){

        $intSubTotal = 0;
        
        
        foreach($_SESSION["arrCart"] as $item)
        {
        
            $intSubTotal = $intSubTotal + $item["intQty"]*$item["fPrice"];
            
        }

        return $intSubTotal;
    }

    static public function showTotal(){

        $intTotal = 0;
        
        
        foreach($_SESSION["arrCart"] as $item)
        {
        
            $intTotal = $intTotal + $item["intQty"]*$item["fPrice"];
            
        }

        return $intTotal + 10;
    }
}

