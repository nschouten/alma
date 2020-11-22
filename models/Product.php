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
        
    }

    public static function getProduct(){ 
        
        $product = DB::query("SELECT products.*, categories.strCatName, productImgs.strImgFile
                                FROM products
                                LEFT JOIN categories on products.intCatID = categories.id
                                LEFT JOIN productImgs on products.id = productImgs.intProductID
                                WHERE products.id =" .$_GET['pID']);

        return new Product($product[0]);
    }

}