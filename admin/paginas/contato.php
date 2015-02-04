 <?php

$tabela_local = "contato";
$mensagem_sucesso =  false;
$mensagem_erro =  false;

	//Verifica se existe uma ação
		if(isset($pagina_admin[1])):
			
			
			if($pagina_admin[1] == "ler" and is_numeric($pagina_admin[2])):
				
				$tabela = new Objeto($tabela_local);
				$tabela->addConsulta('id',$pagina_admin[2]);

				$tabela->selecionarTudo();
				$contato = $tabela->retornar();
			
?>
	<form enctype="multipart/form-data" id="alterar-administrador" action="<?= RAIZ.'admin/'.implode('/',$pagina_admin); ?>" method="post" autocomplete="off">
	<input type="hidden" name="acao" value="salvar" />

		<ul>
			<?php
				if($mensagem_erro){ ?>
					<li><div class='mensagem_erro'>Ocorreu um erro!</div></li>
				<?php }
			?>
			<li>
				<h2>Ler E-mail</h2>	
				<div class="container-grids grid-in-line" >
				<!-- divisao -->
				<div class="container-1">
					<div class="container-row container-row-espc"> 
						<label >Nome: </label><br>
						<input obg="Nome" name="nome" type="text" value="<?= $contato['nome'] ?>" readonly/>
					</div>
				</div>
				<div class="container-1">
					<div class="container-row container-row-espc">
						<label>E-mail: </label><br>
						<input class="email" obg="E-mail" name="email" value="<?= $contato['email'] ?>" type="text" readonly/>
					</div>
				</div>
				<div class="container-1">
					<div class="container-row container-row-espc">
						<label>Telefone: </label><br>
						<input class="imovel" obg="telefone" name="telefone" type="text" value="<?= $contato['telefone'] ?>" readonly/>
					</div>
				</div>
				<div class="container-1">
					<div class="container-row container-row-espc">
						<label>Imóvel: </label><br>
						<input class="imovel"  name="imovel" type="text" value="<?= $contato['imovel'] ?>" readonly/>
					</div>
				</div>
				<div class="container-1">
					<div class="container-row container-row-espc">
						<label>Mensagem: </label><br>
						<textarea class="mensagem descrissao-slide" obg="mensagem" readonly name="c-senha" rows='10' cols='30'><?= $contato['mensagem'] ?></textarea>
					</div>
				</div>
			</li>
			<li>
				<!-- <input type="submit" class="btn btn-success"  value="Salvar" /> -->
				<button class="btn btn-danger" onclick="location='<?= RAIZ.'admin/'.$pagina_admin[0] ?>'; return false;">Cancelar</button>
			</li>
			
			
		</ul>
	</form>
<?php

			elseif($pagina_admin[1] == "excluir" and is_numeric($pagina_admin[2])):

				$tabela = new Objeto($tabela_local);
				$tabela->addConsulta('id',$pagina_admin[2]);

				if($tabela->deletar() != false){
					$mensagem_sucesso = true;
					$mensagem_erro = false;
				}else{
					$mensagem_erro = true;
					$mensagem_sucesso = false;
				}

				if($mensagem_sucesso)
					header("location: ".RAIZ.'admin/'.$pagina_admin[0].'/sucess');
				else
					header("location: ".RAIZ.'admin/'.$pagina_admin[0].'/error');



			elseif($pagina_admin[1] == "page" and is_numeric($pagina_admin[2])):

				$grid = new Grid($tabela_local);
				$grid->addPaginaAtual($pagina_admin[2]);
				$grid->addColuna('Cod', 'id');
				$grid->addColuna('Nome', 'nome');
				$grid->addColuna('E-mail', 'email');
				$grid->addColuna('Data do Cadastro', 'data_cadastro');
				$grid->addItemPesquisa('Nome', 'nome');
				$grid->addItemPesquisa('E-mail', 'email');
				$grid->gerarGrid();

			else:
				
				if($pagina_admin[1] == 'error'):
					echo "<div class='mensagem_erro'>Ocorreu um erro!</div>";
					gerarGrid($tabela_local);

				elseif ($pagina_admin[1] == 'sucess'):
					echo "<div class='mensagem_sucesso'>Operação realizada com sucesso!</div>";
					gerarGrid($tabela_local);

				elseif ($pagina_admin[1] == 'search'):

					if(isset($_POST['item_pesquisa']) AND isset($_POST['pesquisa'])):

						$grid = new Grid($tabela_local);
						$grid->addColuna('Cod', 'id');
						$grid->addConsulta($_POST['item_pesquisa'], $_POST['pesquisa']);
						$grid->addPaginaAtual($_POST['pagina_pesquisa']);
						$grid->addColuna('Nome', 'nome');
						$grid->addColuna('E-mail', 'email');
						$grid->addItemPesquisa('Nome', 'nome');
						$grid->addItemPesquisa('E-mail', 'email');
						$grid->addPermissoes('ler');
						$grid->addPermissoes('excluir');
						$grid->gerarGrid();

					else:

						gerarGrid($tabela_local);

					endif;

				endif;

			endif; //Fim; verifica qual é a ação a ser tomada

	else:

		gerarGrid($tabela_local);

		

	endif;//Fim; Verifica se existe uma ação

	function gerarGrid($tabela_local){

		// if($mensagem_erro){ 
		// 	echo "<li><div class='mensagem_erro'>Ocorreu um erro!</div></li>";
		// }elseif ($mensagem_sucesso) {
		// 	echo "<li><div class='mensagem_sucesso'>Operação realizada com sucesso!</div></li>";
		// }

		$grid = new Grid($tabela_local);
		$grid->addColuna('Cod', 'id');
		$grid->addColuna('Nome', 'nome');
		$grid->addColuna('E-mail', 'email');
		$grid->addColuna('Data do Cadastro', 'data_cadastro');
		$grid->addItemPesquisa('Nome', 'nome');
		$grid->addItemPesquisa('E-mail', 'email');
		$grid->addPermissoes('ler');
		$grid->addPermissoes('excluir');
		$grid->gerarGrid();
	}
?>