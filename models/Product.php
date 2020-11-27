<?php

Class Product {

    public function __construct($data){

        $this->id = $data["id"];
        $this->strProdName = $data["strProdName"];
        $this->intCatID = $data["intCatID"];
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

    public static function saveProduct($intProductID, $strProdName, $intCatID, $fPrice, $strProdDesc, $intColorID, $intSizeID, $intQty, $intSku){
        
        $mysqli = new mysqli("localhost", "root", "root", "alma" );

        $strProdDesc = $mysqli -> real_escape_string($strProdDesc);

        if($intProductID){

            DB::query("UPDATE products
                                SET strProdName ='".$strProdName."', intCatID ='".$intCatID."', fPrice ='".$fPrice."', strProdDesc ='".$strProdDesc."'
                                WHERE id='".$intProductID."'");  
            
            // print_r($intSku);
            foreach($intSku as $key => $arrSkuDetails)
            {
                DB::query("UPDATE sku
                                SET intColorID ='".$arrSkuDetails['intColorID']."', intSizeID ='".$arrSkuDetails['intSizeID']."', intQty ='".$arrSkuDetails['intQty']."'
                                WHERE id='".$key."'");
                // echo($key);
                // die;

            }

        } else {

            DB::query("INSERT INTO products(strProdName, intCatID, fPrice, strProdDesc)
                        VALUES ('".$strProdName."','".$intCatID."', '".$fPrice."', '".$strProdDesc."')");
            
            $intProductID = mysqli_insert_id(DB::connect());

            $mysqli -> close();

            // header("location: index.php?controller=cms&action=cmsProduct&pID=$intProductID");
        }
        
            return true;
    }
    
}