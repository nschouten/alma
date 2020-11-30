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

        $arrProducts = array();

        foreach($product as $data)
        {
            $arrProducts[] = new Product($data);
        }

        return $arrProducts;
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

    public static function addNewProd($strProdName, $fPrice, $intCatID, $strProdDesc, $intColorID, $intSizeID, $intQty){

        // $mysqli = new mysqli("localhost", "nicolesc_alma", "Term3PHP", "nicolesc_alma");

        // $strProdDesc = $mysqli -> real_escape_string($strProdDesc);

        //ADD TO PRODUCTS TABLE 
        $CON = DB::query("INSERT INTO products(strProdName, intCatID, fPrice, strProdDesc)
            VALUES ('".$strProdName."','".$intCatID."', '".$fPrice."', '".$strProdDesc."')");

            $intProductID = mysqli_insert_id($CON);

        //ADD TO SKU TABLE 
        $CON = DB::query("INSERT INTO sku(intProductID, intColorID, intSizeID, intQty)
        VALUES ('".$intProductID."','".$intColorID."', '".$intSizeID."', '".$intQty."')");


        echo("INSERT INTO sku(intProductID, intColorID, intSizeID, intQty)
        VALUES ('".$intProductID."','".$intColorID."', '".$intSizeID."', '".$intQty."')"); 
        die;
            $intSku = mysqli_insert_id($CON);

        //ADD TO PRODUCTIMGS TABLE
        $timestamp =round(microtime(true) * 1000);
        $target_dir = "imgs/"; 
        $target_file = $target_dir.basename($timestamp.$_FILES["strFileName"]["name"]);
        $ext = strtolower(pathinfo($_FILES['strFileName']['name'], PATHINFO_EXTENSION));
        $fileTypeAllowed = array('pdf', 'png', 'jpeg', 'jpg');

        if(!in_array($ext, $fileTypeAllowed))
        {
            echo ("file type not allowed");
            $target_file = null;

        } else {

            move_uploaded_file($_FILES["strFileName"]["tmp_name"], $target_file);

        }

        if($target_file) 
        {
            $CON = DB::query("INSERT INTO productImgs(intProductID, strImgFile, intMain)
                VALUES ('".$intProductID."','".$target_file."', '1')");
        
                $intProductImgID = mysqli_insert_id($CON); 
        }

        return true;

    }
    
}