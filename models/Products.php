<?php

Class Products {

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

    public static function getProducts(){ 
        
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

}