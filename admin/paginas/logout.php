<?php

	unset($_SESSION[RAIZSIMPLES]["ID"]);
	unset($_SESSION[RAIZSIMPLES]["EMAIL"]);
	unset($_SESSION[RAIZSIMPLES]["SENHA"]);

	header("location: ".RAIZ.'admin/');

?>