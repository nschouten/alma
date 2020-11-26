<?php

Class Product {

    public function __construct($data){

        $this->id = $data["id"];
        $this->strProdName = $data["strProdName"];
        $this->strCatName = $data["strCatName"];
        $this->fPrice = $data["fPrice"];
        $this->strImgFile = $data["strImgFile"];
        $this->strProdDesc = $data["strProdDesc"];
        
    }

    public static function getProduct(){ 
        
        $product = DB::query("SELECT products.*, categories.strCatName, productImgs.strImgFile
                                FROM products
                                LEFT JOIN categories on products.intCatID = categories.id
                                LEFT JOIN productImgs on products.id = productImgs.intProductID
                                WHERE products.id =" .$_GET['pID']);

        return new Product($product[0]);
    }

    public static function updateProduct($pID, $strProdName, $strCatName, $fPrice, $strProdDesc, $strColorName, $strSizeName, $intQty){
        
        if($pID){
            $update = DB::query("UPDATE products
                                SET strProdName ='".$_POST["strProdName"]."', fPrice ='".$_POST["fPrice"]."', strProdDesc ='".$_POST["strProdDesc"]."'");
        }
        


    }
    
}