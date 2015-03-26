<?php

	//Raíz do sistema
	
	$raizsystem = "/kananda-copy-do-dev/";
	//$raizsystem = "/kananda/";

	define("RAIZSIMPLES", $_SERVER['DOCUMENT_ROOT'].$raizsystem);
	define("RAIZSSL",'https://' . $_SERVER['HTTP_HOST'] . $raizsystem);
	define("RAIZ",'http://' . $_SERVER['HTTP_HOST'] . $raizsystem);

?>