<?php

Class Sizes{

    public function __construct($data){

        $this->id = $data["id"];
        $this->strSizeName = $data["strSizeName"];

    }

    public static function getSizesByProd(){

        $sizes = DB::query("SELECT DISTINCT sizes.strSizeName, sizes.id
                            FROM sizes
                            LEFT JOIN sku on sizes.id=sku.intSizeID
                            WHERE sku.intProductID=".$_GET['pID']);

        $arrSizes = array();

        foreach($sizes as $data)
        {
            $arrSizes[] = new Sizes($data);
        }

        return $arrSizes;

    }

    public static function getSizes(){

        $sizes = DB::query("SELECT * FROM sizes");

        $arrSizes = array();

        foreach($sizes as $data)
        {
            $arrSizes[] = new Sizes($data);
        }

        return $arrSizes;

    }

    public static function getSizeByID($intSizeID){

        $size = DB::query("SELECT * FROM sizes 
                            WHERE id='".$intSizeID."'");

            return new Sizes($data[0]);

    }
}