<?php
	
	
	$msg = "";	
	
	if(isset($_POST['email']) && isset($_POST['senha'])){
		$email = addslashes($_POST['email']);
		$senha = addslashes($_POST['senha']);

		if(empty($email) || empty($senha)){
			$msg= "Preencha todos dos campos!";
		}else{
			if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
				echo $msg = "informe um e-mail válido!";
			}else{
				$login = Validacao::login('administrador',$email, $senha);

				if($login){
					header("location: ".RAIZ.'admin/');
				}else
					$msg = "E-mail ou senha incorreta!";
			}
		}
	}elseif(isset($_POST['email_reco'])){

		$nova_senha =  Funcao::gerarSenha(8,1);
		$usuario = new Objeto('administrador');
		$usuario->addConsulta('email', addslashes($_POST['email_reco']));
		$usuario->selecionarTudo();
		
		if($usuario->getLinhasAfetadas() == 0){
			echo "<script>alert('Usuário não registrado!')</script>";
			echo '<script>window.location="'.RAIZ.'admin/"</script>';
		}else{

			$config = new Objeto ('empresa');
			$config->addExtras('Limit 1');
			$config->selecionarTudo();
			$config = $config->retornar();
			// envia email ao usuário
			$assunto = 'Contato Kananda Imobiliária';
			$destinatario = $_POST['email_reco'];
			
			$mensagem = "<meta charset='UTF-8' />
						<title></title>
						<p class='cant-view' style='text-align: center;font-weight: normal;font-size: 11px;color: #F0F0E1;background-color: #ffffff;margin: 0;padding: 10px 0;'>&nbsp;</p>

						<div class='wrapper' style='background-color: #EEEEEE; padding: 30px 0;'>
						<table align='center' border='0' cellpadding='0' cellspacing='0' width='600'>
							<tbody>
								<tr>
									<td>
									<table border='0' cellpadding='0' cellspacing='0' class='title' style='background-color: #FFF;'>
										<tbody>
											<tr>
												<td width='40'>&nbsp;</td>
												<td class='main' style='text-align: center;padding: 40px 0;' width='520'>
												<h1 style='color: #222;font-weight: normal;font-family: Tahoma;font-size: 20px;margin: 0;'>Nova Senha</h1>
												</td>
												<td width='40'>&nbsp;</td>
											</tr>
										</tbody>
									</table>
									</td>
								</tr>
								<tr>
									<td>
									<table border='0' cellpadding='0' cellspacing='0' class='comunicate' style='background-color: #ffffff;'>
										<tbody>
											<tr>
												<td width='40'>&nbsp;</td>
												<!-- Image Top -->
												<td valign='top'>&nbsp;</td>
												<td width='40'>&nbsp;</td>
											</tr>
											<tr>
												<td width='40'>&nbsp;</td>
												<td width='520'>
												<p class='text-comunicate' style='color: #968f88;font-family: Arial;font-size: 15px;margin: 0 0 40px;'>Você solicitou a alteração da senha da sua conta administrativa!<br />
												
												<br />
												Acesse: <strong><a href='#' style='text-decoration: none;' title='".$config['titulo_site']."'>".RAIZ."admin</a></strong><br />
												Login: ".$_POST['email_reco']."<br />
												Senha: ".$nova_senha."<br />
												<br />
												Att. Equipe ".$config['nome']."</p>
												</td>
												<td width='40'>&nbsp;</td>
											</tr>
											<tr>
												<td width='40'>&nbsp;</td>
												<!-- image Bottom -->
												<td valign='bottom'>&nbsp;</td>
												<td width='40'>&nbsp;</td>
											</tr>
										</tbody>
									</table>
									</td>
								</tr>
							
							</tbody>
						</table>
						</div>
						";

			$nova_senha = md5(sha1($nova_senha));
			$usuario->setValor('senha',$nova_senha);

			if($usuario->atualizar()){

				$envio = Funcao::enviaEmail($destinatario , $assunto, $mensagem);
				echo "<script>alert('Uma nova senha foi enviada ao email: ".$_POST['email_reco'].".')</script>";
				echo '<script>window.location="'.RAIZ.'admin/"</script>';
			}else{
				echo "<script>alert('Ocorreu um erro!')</script>";
				echo '<script>window.location="'.RAIZ.'admin/"</script>';
			}

		}

		

	}
	



	if($msg == '')
		$display = 'display:none';
	else
		$display = 'display:block';

	if(isset($_GET['recuperar'])){

?>	

<html>
<head>
	<meta http-equiv='Content-Type' content='charset=utf-8'/>
	<title>Kananda - Login</title>
	<link href='http://fonts.googleapis.com/css?family=Oswald:400,300' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body class="body-login">

	<div id='login' class='bradius'>

		<div id='message_login' class='bradius' style='<?=$display ?>'><?=$msg?></div><!-- .message -->

		<div id='logo_login'><a href="<?=RAIZSIMPLES ?>"></a><img src="imagens/logo.png" id='logo_login_img' width='250' height='65'></div><!-- .logo -->

		<div id='form_login'>
			<form action='#' method='POST'>
				<label for='email'>E-mail: </label><input id='email' class='campo_txt bradius' type='email' name='email_reco' value='' required/>
				<input type='submit' id='btn_login' class='bradius' value='Enviar nova senha'>
			</form>
		</div><!-- .acomodar -->

	</div><!-- #login -->

</body>
</html>

<?php	
	}else{

?>

<html>
<head>
	<meta http-equiv='Content-Type' content='charset=utf-8'/>
	<title>Kananda - Login</title>
	<link href='http://fonts.googleapis.com/css?family=Oswald:400,300' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body class="body-login">

	<div id='login' class='bradius'>

		<div id='message_login' class='bradius' style='<?=$display ?>'><?=$msg?></div><!-- .message -->

		<div id='logo_login'><a href="<?=RAIZSIMPLES ?>"></a><img src="imagens/logo.png" id='logo_login_img' width='250' height='65'></div><!-- .logo -->

		<div id='form_login'>
			<form action='#' method='POST'>
				<label for='email'>E-mail: </label><input id='email' class='campo_txt bradius' type='text' name='email' value=''/>
				<label for='senha'>Senha: </label><input id='senha' class='campo_txt bradius' type='password' name='senha' value=''/>
				<input type='submit' id='btn_login' class='bradius' value='Entrar'>
				<span id='recupera_senha'><a href='?recuperar' >Não lembra a senha?</a></span>
			</form>
		</div><!-- .acomodar -->

	</div><!-- #login -->

</body>
</html>

<?php } ?>