<?php

Class DB{

    var $debug = true; 
    var $CON = "";
    
    static public function connect(){

        return mysqli_connect("localhost", "root", "root", "alma");
  
        // $safeConnect = parse_ini_file("../alma-db.ini"); 

        // return mysqli_connect($safeConnect["host"], $safeConnect["user"], $safeConnect["password"], $safeConnect["database"]);
    }

    static public function query($sql, $returnConnection=0){
        
        $oDB = new DB();
        


        if($oDB->debug)
        {
            $oDB->debug($sql);
        }
        
        // echo($sql); 
        // die;

        $CON = $oDB->connect();
        $results = mysqli_query($CON, $sql);
        
        if($results) 
        {
            $data = null;

            while($row = mysqli_fetch_assoc($results))
            {
                
                $data[] = $row;
            
            }

            if($returnConnection==1)
            { 
                return $CON;

            } else {

                return $data;
            }
            
            
        }
    }

    public function debug($sql){

         //echo “<script>console.log(‘$sql’)</script>“;

    }
}