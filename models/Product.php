<?php

Class Product {

    public function __construct($data){

        $this->id = $data["id"];
        $this->strProdName = $data["strProdName"];
        $this->strCatName = $data["strCatName"];
        $this->fPrice = $data["fPrice"];
        $this->strImgFile = $data["strImgFile"];
        $this->strProdDesc = $data["strProdDesc"];
        $this->strJSONData = $data["strJSONData"];
        $this->strSKU = $data["strSKU"];
        $this->intQty = $data["intQty"];
        
    }

    public static function getProduct(){ 
        
        $product = DB::query("SELECT products.*, categories.strCatName, productImgs.strImgFile, variantGroupQty.strSKU, variantGroupQty.intQty
                                FROM products
                                LEFT JOIN categories on products.intCatID = categories.id
                                LEFT JOIN productImgs on products.id = productImgs.intProductID
                                LEFT JOIN variantGroupQty on products.id = variantGroupQty.intProductID
                                WHERE products.id =" .$_GET['pID']);

        return new Product($product[0]);
    }

}