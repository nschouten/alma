<?php

Class Variants {

    public function __construct($data){

        $this->id = $data["id"];
        $this->strCatName = $data["strCatName"];

        }

    public static function getCat(){

        $categories = DB::query("SELECT *
                                    FROM categories");

        $arrCat = array();

        foreach($categories as $data)
        {
            $arrCat[] = new Categories($data);
        }

        return $arrCat;

    }

}