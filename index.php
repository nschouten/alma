<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php 

function my_autoloader($class){

	$checkFiles = array(
		'models/',
		'controllers/',
		'views/',
		'classes/');

	foreach($checkFiles as $file)
	{
		$fileClass = $file.$class.'.php';
		if(file_exists($fileClass))
		{
			include $fileClass;
		}
	}
}

spl_autoload_register('my_autoloader');
?>
    
</body>
</html>