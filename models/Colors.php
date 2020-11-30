<?php

Class Colors{

    public function __construct($data){

        $this->id = $data["id"];
        $this->strColorName = $data["strColorName"];

    }

    public static function getColors(){

        $colors = DB::query("SELECT * FROM colors");

        $arrColors = array();

        foreach($colors as $data)
        {
            $arrColors[] = new Colors($data);
        }

        return $arrColors;

    }

    public static function getColorsByProd(){

        $colors = DB::query("SELECT DISTINCT colors.strColorName, colors.id
        FROM colors
        LEFT JOIN sku on colors.id=sku.intColorID
        WHERE sku.intProductID=".$_GET['pID']);

        $arrColors = array();

        foreach($colors as $data)
        {
            $arrColors[] = new Colors($data);
        }

        return $arrColors;

    }
}