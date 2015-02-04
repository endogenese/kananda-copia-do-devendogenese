<?php
echo 's';
error_reporting('E_ALL');

session_cache_limiter('public');
session_cache_expire(0);

session_start();
echo phpinfo()	;
/*if(session_is_registered('TESTE')){

	echo "Funcionando – ";

	echo $_SESSION['TESTE'];

}else{

	echo "Não está Configurado – ";

	$_SESSION['TESTE'] = 'Escreva teste na tela';

}*/

?>