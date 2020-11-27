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

    public static function cartCheckout($intUserID, $intOrderDate, $strFirstName, $strLastName, $strAddress, $strCity, $strProvince, $strZIP, $strPhone, $strFirstNameS, $strLastNameS, $strAddressS, $strCityS, $strProvinceS, $strZIPS, $fTotal, $strCCName, $intCCNumber, $intExp, $intCVV){

        
            //INSERT INTO BILLING TABLE 
            $CON = DB::query("INSERT INTO billing(intUserID, strFirstName, strLastName, strAddress, strCity, strProvince, strZIP, strPhone)
            VALUES ('".$intUserID."','".$strFirstName."', '".$strLastName."', '".$strAddress."','".$strCity."','".$strProvince."','".$strZIP."','".$strPhone."')", 1);

            $intBillingID = mysqli_insert_id($CON);
        

            //INSERT INTO SHIPPING TABLE 
            DB::query("INSERT INTO shipping(intUserID, strFirstNameS, strLastNameS, strAddressS, strCityS, strProvinceS, strZIPS)
            VALUES ('".$intUserID."','".$strFirstNameS."', '".$strLastNameS."', '".$strAddressS."','".$strCityS."','".$strProvinceS."','".$strZIPS."')");

            $intShippingID = mysqli_insert_id($CON);


            //INSERT INTO PAYMENT TABLE
            DB::query("INSERT INTO payment(intUserID, strCCName, intCCNumber, intExp, intCVV)
            VALUES ('".$intUserID."','".$strCCName."', '".$intCCNumber."', '".$intExp."','".$intCVV."')");
            
            $intPaymentID = mysqli_insert_id($CON);

            //INSERT INTO ORDERS TABLE 
            DB::query("INSERT INTO orders(intUserID, intOrderDate, fTotal, intPaymentID, intBillingID, intShippingID)
            VALUES ('".$intUserID."','".$intOrderDate."', '".$fTotal."', '".$intPaymentID."','".$intBillingID."','".$intShippingID."')");

            $intOrderID = mysqli_insert_id($CON);

            //INSERT INTO ORDER-PRODUCTS TABLE
            foreach(Cart::show() as $key => $cartDetails)
            {
                DB::query("INSERT INTO ordersProducts(intOrderID, strProductName, intSKU, intQty, fPrice)
                VALUES ('".$intOrderID."','".$cartDetails['strProductName']."', '".$key."', '".$cartDetails['intQty']."','".$cartDetails['fPrice']."')");
            
            $intOrderProductID = mysqli_insert_id($CON);
            
            //UPDATE SKU QTY 
                DB::query("UPDATE sku
                        SET intQty = intQty - '".$cartDetails['intQty']."'
                        WHERE id='".$key."'");
            }

            return true;
    }


}

