<?php

Class Inventory{

    public function __construct($data){

        $this->id = $data["id"];
        $this->intProductID = $data["intProductID"];
        $this->intColorID = $data["intColorID"];
        $this->intSizeID = $data["intSizeID"];
        $this->intQty = $data["intQty"];
        $this->strProdName = $data["strProdName"];
        $this->strSizeName = $data["strSizeName"];
        $this->strColorName = $data["strColorName"];
        
    }

    // public static function getAllInven(){ 
        
    //     $allinventory = DB::query("SELECT sku.*, products.strProdName, sizes.strSizeName, colors.strColorName
    //                         FROM sku
    //                         LEFT JOIN products on sku.intProductID=products.id
    //                         LEFT JOIN sizes on sku.intSizeID = sizes.id
    //                         LEFT JOIN colors on sku.intColorID = colors.id");
        
    //     $arrAllInventory = array();

    //     foreach($allinventory as $data)
    //     {
    //         $arrAllInventory[] = new Inventory($data);
    //     }

    //     return $arrAllInventory;
    // }

    public static function getInvenByID($pID){ 
        
        $inventory = DB::query("SELECT sku.*, products.strProdName, sizes.strSizeName, colors.strColorName
                            FROM sku
                            LEFT JOIN products on sku.intProductID=products.id
                            LEFT JOIN sizes on sku.intSizeID = sizes.id
                            LEFT JOIN colors on sku.intColorID = colors.id
                            WHERE products.id=".$pID);
        
        $arrInventory = array();

        foreach($inventory as $data)
        {
            $arrInventory[] = new Inventory($data);
        }

        return $arrInventory;
    }

}