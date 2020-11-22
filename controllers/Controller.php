<?php

Class Controller{

    var $bFinalViewRun = false;

	public function loadView($viewFile, $bAppendToVariable=false, $variableName=""){
		ob_start(); //this opens a buffer where all output is stored
		include($viewFile); //take the contents of this file and store in buffer

		$tempHTML = ob_get_contents(); //take the contents of $viewfile and make them equal to $tempHTML variable
		ob_clean(); //now erase buffer

		//to add more content to the $tempHTML variable...
		//you'd pass in a "1" for $bappendtovar to equal true

		if($bAppendToVariable) //if append to variable equals true 
		{
            // and the if the variable exists....
            if(isset($this->$variableName))
            {
                $this->$variableName .= $tempHTML; //then append to the additional data to it
            } else {
                $this->$variableName = $tempHTML; //if the variable doesn't already exist then set the new variable as a variable
            }
        } else {
            $this->content .= $tempHTML; //if append to variable equals false then have the new data or temphtml be appended to the content default variable
        }
    }
    
    public function loadData($data, $variableName){
        
        $this->$variableName = $data;
    }

    //this will take the controller name and action and save this path to a variable
    public function loadRoute($controller, $action, $variableName="content", $append=0){
        $controllerName = $controller."Controller"; 
        $controllerFile = "controllers/".$controllerName.".php"; //this takes the controller name defined above and creates the path to where the document lives

        //if the above controllerfile exists, then do the following...
        if(file_exists($controllerFile))
        {
            include_once($controllerFile); //avoids redeclaring more than once
            $oController = new $controllerName(); //this creates a new instance of the controller
            //now that you have instantiated that particular controller, we need it to do something
            $oController->$action(); //take the action given in parameter and call it
        } else {
            //if the file does not exists... 
            Errors::missingFileError($controllerName, $controllerFile);
        }

        if($append && isset($this->$variableName))//if $append is set to 1 or true and the variable name is set then do this
        {
            $this->$variableName .= $oController->content; // take the content from the controller and append it to the variable name
        } else {
            //if the variable name is not set, take it and set it for the first time 
            $this->$variableName = $oController->content; 
        }
    }

    public function loadFinalView($viewFile){

        $this->bFinalViewRun = true; 
        ob_start(); //creates buffer where content will be held 
        include($viewFile); // contents from this view are stored in buffer

        $tempHTML = ob_get_contents(); //above contents get assigned to temphtml variable 
        ob_clean(); // empty buffer of content 

        $this->content = $tempHTML;
    }

    public function goTo($controller, $action, $additional=""){
        $goTo = "location: index.php?controller=".$controller."&action=".$action."&".$additional;
        header($goToThisLocation);

    }
}