<?php

Class Products {

    public function __construct($data){

        $this->id = $data["id"];
        $this->intCatID = $data["intCatID"];
        $this->strProdName = $data["strProdName"];
        $this->strCatName = $data["strCatName"];
        $this->fPrice = $data["fPrice"];
        $this->strImgFile = $data["strImgFile"];
        $this->strProdDesc = $data["strProdDesc"];
        
        
    }

    public static function getAllProducts(){ 
        
        $products = DB::query("SELECT products.*, categories.strCatName, productImgs.strImgFile
                                FROM products
                                LEFT JOIN categories on products.intCatID = categories.id
                                LEFT JOIN productImgs on products.id = productImgs.intProductID
                                WHERE productImgs.intMain = 1");
        
        $arrProducts = array();

        foreach($products as $data)
        {
            $arrProducts[] = new Products($data);
        }

        return $arrProducts;
    }

    public static function getProducts($cID){ 
        
        $products = DB::query("SELECT products.*, categories.strCatName, productImgs.strImgFile
                                FROM products
                                LEFT JOIN categories on products.intCatID = categories.id
                                LEFT JOIN productImgs on products.id = productImgs.intProductID
                                WHERE categories.id=".$cID." AND productImgs.intMain = 1");
        
        $arrProducts = array();

        foreach($products as $data)
        {
            $arrProducts[] = new Products($data);
        }

        return $arrProducts;
    }

}