<?php

	$_folders = array();

	if(defined("WWW_ROOT_APP"))		
		foreach(getDirRec(WWW_ROOT_APP) as $dir)				
			$_folders[] = $dir;

	if(defined("WWW_ROOT_PYF"))		
		foreach(getDirRec(WWW_ROOT_PYF) as $dir)				
			$_folders[] = $dir;

	if(count($_folders))
		define("CLASS_FOLDER_LOAD", serialize($_folders));

	function __autoload($className) 
	{
		if(defined("CLASS_FOLDER_LOAD"))
			if(is_array(unserialize(CLASS_FOLDER_LOAD)))
				foreach (unserialize(CLASS_FOLDER_LOAD) as $folder)
					if(file_exists("{$folder}/{$className}.php"))
						include_once "{$folder}/{$className}.php";
	}

	//recursive function for list directory
	function getDirRec($dir)
	{
		$_folders = array();

		if(is_dir($dir))
		{
			foreach(scandir($dir) as $object)
			{
				if(is_dir($dir ."/". $object)  && $object!="." && $object!="..")
				{				
					foreach (getDirRec($dir ."/". $object) as $folder)
						$_folders[] = $folder;					

					$_folders[] = $dir ."/". $object;
				}
			}
		}

		return $_folders;
	}	

	$methodInit = defined("CLASS_METHOD_INIT") ? CLASS_METHOD_INIT : "";

	$uri 	= isset($_GET['uri'])	? $_GET['uri'] 	: $methodInit; //uri parametro enviado pelo .htaccess
	
	$uri 	= explode("/", $uri);

	for($i=0;$i<count($uri);$i++)
		if(isset($uri[$i]) && !empty($uri[$i]))
			define(constant("HTA_PARAM_NAME") . ($i+1), $uri[$i]);
	
	if(defined(constant("HTA_PARAM_NAME")."1"))	$class 	= constant(constant("HTA_PARAM_NAME")."1")."Controller";
	if(defined(constant("HTA_PARAM_NAME")."2"))	$method = constant(constant("HTA_PARAM_NAME")."2");

	$errorController = new ErrorController();

	if(!defined(constant("HTA_PARAM_NAME")."1"))
	{
		$errorController = new ErrorController();
		$errorController->setMessage(new Message("WARNING: ","Class not sent!",Message::$DANGER));
		$errorController->show();		
	}elseif(!defined(constant("HTA_PARAM_NAME")."2"))
	{
		$errorController = new ErrorController();
		$errorController->setMessage(new Message("WARNING: ","Method not sent!",Message::$DANGER));
		$errorController->show();
	}elseif(!class_exists($class))
	{	
		$errorController = new ErrorController();
		$errorController->setMessage(new Message("WARNING: ","Class '{$class}' does not exist!",Message::$DANGER));
		$errorController->show();		
	}elseif(!method_exists($class, $method))
	{
		$errorController = new ErrorController();
		$errorController->setMessage(new Message("WARNING: ","Method '{$method}' does not exist!",Message::$DANGER));
		$errorController->show();		
	}else{
		$obj = new $class();
		$obj->$method();
	}
?>  