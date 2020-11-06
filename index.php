<?php 
session_start();
function my_autoloader($class){

	$checkFiles = array(
		'models/',
		'controllers/',
		'views/',
        'functions/',
        'libs/');

	foreach($checkFiles as $file)
	{
		$fileClass = $file.$class.'.php';
		if(file_exists($fileClass))
		{
            include $fileClass;
            // print_r($fileClass);
		}
	}
}
 echo("here");
spl_autoload_register('my_autoloader');

$controller = setVariable("controller", "Public");
$action = setVariable("action", "main");

function setVariable($name, $default){

	if(isset($_POST[$name]))
	{
		return $_POST[$name];
	}

	if(isset($_POST[$name]))
	{
		return $_GET[$name];
	}

	return $default;
}

//With the controller variable from above, make the first letter capital, then add word "Controller"
$controllerName = ucfirst($controller)."Controller";

//what's the file path to reach the controller variable doc
$controllerFile = "controllers/".$controllerName.".php";

if(file_exists($controllerFile)) //if the controllerFile variable (the doc path) exists ...
{
	include($controllerFile); //first, include it on the page

	$oController = new $controllerName(); // second, instantiate it

	if(method_exists($oController, "pretrip")) //if there is a function inside the controller called 'pretrip', then run that function FIRST before running the 'main'. 
	{
		$oController->pretrip();
	}

	if(method_exists($oController, $action)) //now run the 'main' function
	{
		$oController->$action();

	} else {

		Errors::missingMethodError($controllerName, $action);
	}
} else {

	Errors::missingControllerError($controllerName); //show errors that there is no controller path and/or controller in general
}

?>