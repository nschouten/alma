<?php

Class User extends Controller{

    public function main(){
        
    }

    public function addReview(){
        
    }

    public function checkout(){
        
    }

    static public function addNewReview(){

        $timestamp =round(microtime(true) * 1000);
        $target_dir = "assets/"; 
        $target_file = $target_dir.basename($timestamp.$_FILES["strFileName"]["name"]);
        $ext = strtolower(pathinfo($_FILES['strFileName']['name'], PATHINFO_EXTENSION));
        $fileTypeAllowed = array('pdf', 'png', 'jpeg', 'jpg');

        if(!in_array($ext, $fileTypeAllowed))
        {
            echo ("file type not allowed");
            $target_file = null;

        } else {

            move_uploaded_file($_FILES["strFileName"]["tmp_name"], $target_file);
        }

        if($_POST['intUserID'] && $_POST['inProductID'] && $_POST['intRating'] && $_POST['strComment'] && $target_file)
        {
            $con = DB::connect();
            $sql = "INSERT INTO VIP(intUserID, inProductID, intRating, strComment, strFileName)
                    VALUES ('".$_POST['intUserID']."', '".$_POST['inProductID']."', '".$_POST['intRating']."', '".$_POST['strComment']."', '".$target_file."')";
            
            $results = mysqli_query($con, $sql);

            header("location: index.php?controller=public&action=reviewSuccess");

        } else {

        header("location: index.php?controller=public&action=reviewError");

        }   
    }

    public function pretrip(){

        if($_SESSION["uID"] == "")
        {
            $this->goHere("public", "main");
            
        } else {
        
        $this->oUser = User::getCurrentUser();
        
        echo $this->oUser->id;
        
        }
    }
}