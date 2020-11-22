<?php

Class Imgs {

    public function __construct($data){

        $this->id = $data["id"];
        $this->intProductID = $data["intProductID"];
        $this->strImgFile = $data["strImgFile"];

        }

        public static function getMainImg(){

            $img = DB::query("SELECT * 
                                    FROM productImgs
                                    WHERE intMain=1 AND productImgs.intProductID=" .$_GET['pID']);
    
            return new Imgs($img[0]);
    
        }

    public static function getImgsByID(){

        $imgs = DB::query("SELECT * 
                                FROM productImgs
                                WHERE intMain=0 AND productImgs.intProductID=" .$_GET['pID']);

        $arrImgs = array();

        foreach($imgs as $data)
        {
            $arrImgs[] = new Imgs($data);
        }

        return $arrImgs;

    }
}
?>