<?php

Class Variants {

    public function __construct($data){

        $this->id = $data["id"];
        $this->strVariantTypeName = $data["strVariantTypeName"];
        $this->intVariantTypeID = $data["intVariantTypeID"];

        }

    public static function getSizes(){

        $sizes = DB::query("SELECT * 
        FROM variantTypes 
        LEFT JOIN variantProdGroup on variantTypes.id=variantProdGroup.intVariantTypeID
        WHERE variantTypes.intVariantID=1 and variantProdGroup.intProductID=".$_GET['pID']);

        $arrSizes = array();

        foreach($sizes as $data)
        {
            $arrSizes[] = new Variants($data);
        }

        return $arrSizes;

    }

    public static function getColors(){

        $colors = DB::query("SELECT DISTINCT variantTypes.strVariantTypeName, variantProdGroup.intVariantTypeID
                            FROM variantTypes 
                            LEFT JOIN variantProdGroup on variantTypes.id = variantProdGroup.intVariantTypeID
                            WHERE variantTypes.intVariantID=2 AND variantProdGroup.intProductID=".$_GET['pID']);

        $arrColors = array();

        foreach($colors as $data)
        {
            $arrColors[] = new Variants($data);
        }

        return $arrColors;

    }

}