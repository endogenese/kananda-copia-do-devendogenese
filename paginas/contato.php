<?php
	
	if(isset($_POST) && count($_POST)>0){

		$contato = new Objeto('contato');
		$contato->setValor('nome', $_POST['tNome']);
		$contato->setValor('telefone', $_POST['tTelefone']);
		$contato->setValor('email', $_POST['tEmail']);
		$contato->setValor('mensagem', $_POST['tMensagem']);

		if($contato->inserir()){

			$config = new Objeto('empresa');
  			$config->selecionarTudo();
  			$config = $config->retornar();
		
			// envia email ao usuário
			$assunto = 'Contato Kananda Imobiliária';
			$destinatario = $_POST['tEmail'];
			$mensagem = '
				
				
					<meta charset="UTF-8">
					<title>E-mail de notificação Kananda Negócios Imobiliários</title>
					<style>
					*{
					margin: 0;
					padding: 0;
					font-family: "Verdana", sans-serif;
				}
				div.container{
					background-image: url(http://endogenese.com.br/img/email/kananda/kananda-email.png);
					background-size: 100%;
					width: 750px;
					margin: 0 auto;
					height: 470px;
					border-radius: 0 0 4px 4px;
				}
				div.container > h2.aviso{
					font-size: 22pt;
					color: white;
					text-align: right;
					position: relative;
					top: 160px;
					margin-right: 20px;
				}
				div.container > p.aviso-2{
					font-family: Arial. sans-serif;
					position: relative;
					top: 220px;
					margin: 0 40px;
					color: white;
				}
				div.container > p.aviso-3{
					text-align: center;
					margin: 0 20px;
					font-size: 7pt;
					position: relative;
					top: 280px;
				}
				div.container > p.aviso-3 a{
					text-decoration: none;
					color: blue;
					font-weight: 700;
				}
				div.container > p.aviso-3 a:hover{
					text-decoration: overline;
				}
					</style>
				
					<div class="container">
						<h2 class="aviso">Em breve<br> um de nosso corretores <br> irá entra em contato com você.</h2>
						<p class="aviso-2">Kananda Negócios Imobiliários <br>Trav. 15 de Agosto, nº 125-A- Itaituba PA | '.$config['email'].' <br>
						(93) 3518-0367 / (93) 99134-0326</p>
						<p class="aviso-3">Se não foi você que solicitou o contato, favor ignorar essa mensagem.</p>
					</div>
				
			
			';

			$envio = Funcao::enviaEmail($destinatario , $assunto, $mensagem);

			// envia email a kananda
			$assunto = 'Contato Kananda Imobiliária';
			$destinatario = $config['email'];
			$mensagem = "<meta charset='UTF-8' />
						<title></title>
						<p class='cant-view' style='text-align: center;font-weight: normal;font-size: 11px;color: #F0F0E1;background-color: #ffffff;margin: 0;padding: 10px 0;''>&nbsp;</p>

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
												<h1 style='color: #222;font-weight: normal;font-family: Tahoma;font-size: 20px;margin: 0;'>UMA NOVA MENSAGEM FOI RECEBIDA</h1>
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
												<p class='text-comunicate' style='color: #968f88;font-family: Arial;font-size: 15px;margin: 0 0 40px;'>Uma nova mensagem foi enviada ao site, para acessá-la clique <a href='".RAIZ."admin/contato' style='text-decoration: none;'>aqui<a><br/>
												
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

			$envio = Funcao::enviaEmail($destinatario , $assunto, $mensagem);

			echo "<script>alert('Sua mensagem foi recebida, em breve entraremos em contato com você.')</script>";

		}else{
			echo "<script>alet('Ocorreu um erro no envio da sua mensagem.')</script>";
		}

		echo "<script>window.location.href = '".RAIZ."';</script>";

	}else{
	
		header("location: ".RAIZ);

	}


?>