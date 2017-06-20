<?php


if (!function_exists('allTranslaterLang')) {
	function allTranslaterLang(){
		$langs = [];
		$directory = dirname(__DIR__).'\lang';
		if (is_dir($directory)){
		  if ($dh = opendir($directory)){
		    while (($folder = readdir($dh)) !== false){
		    	$configFile = $directory.'/'.$folder.'/lang.config';
		    	if(
		    		!in_array($folder, ['.','..'])
		    		&&(
		    		empty(explode('.', $folder)[1])
		    		)
		    		&&(
		    		is_file($configFile))
		    		) 
		    	{
		      		$config= json_decode(file_get_contents($configFile));  
		      		if (strtoupper($config->code) == strtoupper($folder)) {
		      			$langs[$folder] = $config;
		      		}
		    	}
		    }
		    closedir($dh);
		  }
		}

		return $langs;
	}
}

if (!function_exists('TranslaterMiddleware')) {
	function TranslaterMiddleware(){
		$middlewares = ['web','translater'];

		return $middlewares;
	}
}