<?php

Class Variants {

    public function __construct($data){

        $this->id = $data["id"];
        $this->strSizeName = $data["strSizeName"];
        $this->strColorName = $data["strColorName"];
        $this->intVariantTypeID = $data["intVariantTypeID"];

        }

    public static function getSizes(){

        $sizes = DB::query("SELECT DISTINCT sizes.strSizeName, sizes.id
                            FROM sizes
                            LEFT JOIN sku on sizes.id=sku.intSizeID
                            WHERE sku.intProductID=".$_GET['pID']);

        $arrSizes = array();

        foreach($sizes as $data)
        {
            $arrSizes[] = new Variants($data);
        }

        return $arrSizes;

    }

    public static function getColors(){

        $colors = DB::query("SELECT DISTINCT colors.strColorName, colors.id
        FROM colors
        LEFT JOIN sku on colors.id=sku.intColorID
        WHERE sku.intProductID=".$_GET['pID']);

        $arrColors = array();

        foreach($colors as $data)
        {
            $arrColors[] = new Variants($data);
        }

        return $arrColors;

    }

}