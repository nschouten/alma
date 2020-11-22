<?php

Class CartController extends Controller{

    public function cartMain(){
        $this->loadData("<img src='imgs/logo.png' alt='logo'/>", "logo");
        $this->loadData("Cart", "header");

        $this->loadView("views/header.php");
        $this->loadView("views/hero.php");
        $this->loadView("views/cart.php");
        $this->loadView("views/footer.php");
        $this->loadFinalView("views/main.php");
        
    }

    public function addToCart(){

        $sku = DB::query("SELECT DISTINCT variantTypes.strVariantTypeName, variantProdGroup.intVariantTypeID, variantProdGroup.strSKU
                                FROM variantTypes 
                                LEFT JOIN variantProdGroup on variantTypes.id = variantProdGroup.intVariantTypeID
                                WHERE variantProdGroup.intProductID=".$_POST['pID']." and variantProdGroup.intVariantTypeID=".$_POST['intSizeTypeID']);

        $arrSku = array();

        foreach($sku as $data)
        {
            $arrSku[] = new Sku($data);
        }

        return $arrSku;
    }
}