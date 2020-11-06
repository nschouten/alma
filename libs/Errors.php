<?php

Class Errors {

	static public function missingMethodError($controllerName, $action){

		echo "Method not found. Add to $controllerName file in public function $action()";
	}

	static public function missingControllerError($controllerName){

		echo "Controller not found. Create a $controllerName file";
	}
}