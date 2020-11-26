<?php

Class Sku{

    public function __construct($data){

        $this->intSku = $data["id"];

        }

    public static function getSku($intProductID, $intColorID="", $intSizeID=""){

        $sku = DB::query("SELECT sku.id
                        FROM sku
                        WHERE sku.intProductID=".$intProductID." AND sku.intColorID=".$intColorID." and sku.intSizeID=".$intSizeID);
        
        return new Sku($sku[0]);



    }

}