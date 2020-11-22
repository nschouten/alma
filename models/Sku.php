<?php

Class Sku{

    public function __construct($data){

        $this->id = $data["id"];
        $this->strSKU = $data["strSKU"];

        }

    public static function getSku(){

        $sku = DB::query("SELECT DISTINCT variantTypes.strVariantTypeName, variantProdGroup.intVariantTypeID, variantProdGroup.strSKU
                                FROM variantTypes 
                                LEFT JOIN variantProdGroup on variantTypes.id = variantProdGroup.intVariantTypeID
                                WHERE variantProdGroup.intProductID=".$_GET['pID']);

        $arrSku = array();

        foreach($sku as $data)
        {
            $arrSku[] = new Sku($data);
        }

        return $arrSku;

    }

}