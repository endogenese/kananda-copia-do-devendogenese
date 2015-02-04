<?php

	//ini_set('display_error', 0);
	//error_reporting(0);
	ob_start();

	if(session_id() == ""){
		session_start();
	}

	require_once("../classes/Incluir.php");
			
	if(Validacao::administrador()){

		require("paginas/topo.php");

		require "paginas/sidebar.php";

		require "paginas/leitura.php";

		require "paginas/rodape.php";

	}else{

		require("paginas/login.php");

	}

	ob_end_flush();
?>
