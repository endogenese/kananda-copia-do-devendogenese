 <?php

$tabela_local = "evento";
$mensagem_sucesso =  false;
$mensagem_erro =  false;


	//Verifica se existe uma ação
		if(isset($pagina_admin[1])):
			
			//verifica qual é a ação a ser tomada
			if($pagina_admin[1] == "novo"):

				$tabela = new Objeto($tabela_local);
				$tabela2 = new Objeto('foto_evento');
				
				if(isset($_POST['acao'])){
					if($_POST['acao'] == "salvar"){

						$tabela->setValor('titulo_evento',$_POST['titulo']);
						$tabela->setValor('descricao_evento',$_POST['descricao_evento']);
						
						if($tabela->inserir() != false){
							$diretorio = "img/eventos/".$tabela->getId()."-".$_POST['titulo'];
							mkdir('../'.$diretorio, 0644);
							$tabela->limparDados();
							$tabela->addConsulta('id',$tabela->getId());
							$tabela->setValor('diretorio',$diretorio);

							if($tabela->atualizar()){

								$upload = new Upload("../img/eventos/".$tabela->getId()."-".$_POST['titulo']);
								
								for ($i=1; $i <= $_POST['qtd_fotos']; $i++) { 
									
									if(isset($_FILES['foto'.$i])){
										
										$upload->addFile($_FILES['foto'.$i],array("jpg","png","gif"),NULL,1);
										$file = $upload->retornaFiles(true);
										

										$tabela2->setValor('id_evento', $tabela->getId());
										$tabela2->setValor('arquivo',substr($file[0],3));
										$tabela2->setValor('descricao_foto',$_POST['descricao_foto'.$i]);
										
										if($tabela2->inserir() != false){
											$mensagem_sucesso = true;
											$mensagem_erro = false;
										}else{
											$mensagem_sucesso = false;
											$mensagem_erro = true;
										}

										$tabela2->limparDados();

									}
								}
							}	
						}
					}

					if($mensagem_sucesso){
						header("location: ".RAIZ.'admin/'.$pagina_admin[0].'/sucess');
					}
				}

				
?>
	<form enctype="multipart/form-data" id="novo-administrador" action="<?= RAIZ.'admin/'.implode('/',$pagina_admin); ?>" method="post" autocomplete="off">
		<input type="hidden" name="acao" value="salvar" />
		<ul>

			<?php
				if($mensagem_erro){ ?>
					<li><div class='mensagem_erro'>Ocorreu um erro!</div></li>
				<?php }
			?>

			<li>
				<h2>Empresa</h2>	
				<div class="container-grids">
				<!-- divisao -->
				<div class="container-1">
					<div class="container-row container-row-espc">
						<label>Titulo: </label><br>
						<input obg="Titulo do Evento" name="titulo" type="text" /> 
					</div>
					<div class="container-row container-row-espc">
						<label>Descrição do Evento: </label><br>
						<input obg="Descrição do Evento" name="descricao_evento" type="text" />
					</div>
				</div>
				</div>
			</li>
			<li>
				<fieldset>
					<legend>Fotos </legend>
					<input type="hidden" name="qtd_fotos" value="1" id="qtd_fotos"/>
					<a class='novo-slide' href='#' onclick='add_foto();'>Adicionar Foto</a>
					
					<div id='fotos'>

						<div class='foto' id='foto1'>

							<label>Foto: </label>
							<input class="foto-slide" obg="foto1" name="foto1" type="file" onchange="readURL(this);" />
							<img id='preview1' src='#' class='preview_foto'/><br>

							<label>Descrição da Foto:</label><br>
							<textarea  name="descricao_foto1" class="descrissao-slide"></textarea>
							<a id="slide-remover" class="btn-danger novo-slide" href='#' onclick="remover_foto(this);">Remover</a>

						</div>
					</div>

				</fieldset>
			</li>

			<li>
				<input class="btn btn-success" type="submit" value="Salvar" />
				<button class="btn btn-danger" onclick="location='<?= RAIZ.'admin/'.$pagina_admin[0] ?>'; return false;">Cancelar</button>
			</li>

		</ul>
		
	</form>
<?php
			elseif($pagina_admin[1] == "editar" and is_numeric($pagina_admin[2])):
				
				$tabela = new Objeto($tabela_local);
				$tabela->addConsulta('id',$pagina_admin[2]);
				

				$tabela2 = new Objeto('foto_evento');
				
				
				if(isset($_POST['acao'])){
					if($_POST['acao'] == "salvar"){

						$tabela->setValor('titulo_evento',$_POST['titulo']);
						$tabela->setValor('descricao_evento',$_POST['descricao_evento']);
						
						
						$tabela->atualizar();
						
						$tabela->limparDados();
						$tabela->addConsulta('id',$pagina_admin[2]);
						$tabela->selecionarTudo();
						$evento = $tabela->retornar();
						
						$upload = new Upload("../".$evento['diretorio']);

						############## CONSULTA FOTOS NO BD ###############
						$tabela2->addConsulta('id_evento', $evento['id']);
						$tabela2->selecionarTudo();
						$array_fotos = array();// fotos do evento no banco
						$i=0;
						foreach ($tabela2->retornarDados() as $key => $value) {
							$array_fotos[$i] = $value['id'];
							$i++;
						}
						
						$qtd_array_fotos = count($array_fotos);
						$tabela2->limparDados();

						###################################################
						
						for ($i=1; $i <= $_POST['qtd_fotos']; $i++) {
							
							if(isset($_FILES['foto'.$i])){// verifica se existem fotos para serem atualizadas
								
								$upload->addFile($_FILES['foto'.$i],array("jpg","png","gif"),NULL,1);
								$file = $upload->retornaFiles(true);								

								if(isset($_POST['id_foto'.$i])){

									$tabela2->addConsulta('id',$_POST['id_foto'.$i]);
									$tabela2->selecionarTudo();
									$img = $tabela2->retornar();

									if(substr($file[0],3)==''){
										
										$tabela2->setValor('descricao_foto',$_POST['descricao_foto'.$i]);
										$tabela2->setValor('arquivo',$img['arquivo']);
									
									}else{
										
										$tabela2->setValor('arquivo',substr($file[0],3));
										$tabela2->setValor('descricao_foto',$_POST['descricao_foto'.$i]);
										$img_apagar = $img['arquivo'];

									}

									for($j = 0 ; $j < $qtd_array_fotos; $j++) {// excluir a foto do array de exclusão
										if(array_key_exists($j, $array_fotos)){
											if($array_fotos[$j] == $_POST['id_foto'.$i])
												unset($array_fotos[$j]);
										}
									}

									$tabela2->addConsulta('id',$_POST['id_foto'.$i]);
									
									if($tabela2->atualizar() != false){
										if(isset($img_apagar)){// apaga a imagem antiga
											if($img_apagar != ''){
												if(file_exists('../'.$img['arquivo']))
													unlink('../'.$img['arquivo']);
											}
										}
										$mensagem_sucesso = true;
										$mensagem_erro = false;
									}else{
										$mensagem_sucesso = false;
										$mensagem_erro = true;
									}

									$img_apagar = '';

								}else{
									$tabela2->setValor('id_evento', $evento['id']);
									$tabela2->setValor('arquivo',substr($file[0],3));
									$tabela2->setValor('descricao_foto',$_POST['descricao_foto'.$i]);
																		
									if($tabela2->inserir() != false){
										$mensagem_sucesso = true;
										$mensagem_erro = false;
									}else{
										$mensagem_sucesso = false;
										$mensagem_erro = true;
									}
								}
								

								$tabela2->limparDados();

							}
						}	

						// caso haja fotos para serem removidas do banco
						if(count($array_fotos) > 0 ){
							foreach ($array_fotos as $key => $value) {
								$tabela2->addConsulta('id',$value);
								$tabela2->selecionarTudo();
								$img = $tabela2->retornar();

								if(unlink('../'.$img['arquivo'])){
									if($tabela2->deletar() != false){
										$mensagem_sucesso = true;
										$mensagem_erro = false;
									}
								}else{
									$mensagem_sucesso = false;
									$mensagem_erro = true;
								}
								
							}
							$tabela2->limparDados();

						}

					}


					if($mensagem_sucesso)
						header("location: ".RAIZ.'admin/'.$pagina_admin[0].'/sucess');

				}

				
				$tabela->selecionarTudo();
				$evento = $tabela->retornar();
				$tabela2->addConsulta('id_evento',$evento['id']);
				$tabela2->addExtras('ORDER BY id DESC');
				$tabela2->selecionarTudo();
				$fotos = $tabela2->retornarDados();
			
?>
<form enctype="multipart/form-data" id="novo-administrador" action="<?= RAIZ.'admin/'.implode('/',$pagina_admin); ?>" method="post" autocomplete="off">
		<input type="hidden" name="acao" value="salvar" />
		<ul>

			<?php
				if($mensagem_erro){ ?>
					<li><div class='mensagem_erro'>Ocorreu um erro!</div></li>
				<?php }
			?>
			<li>
				<h2>Empresa</h2>	
				<div class="container-grids">
				<!-- divisao -->
				<div class="container-1">
					<div class="container-row container-row-espc">
						<label>Titulo: </label><br>
						<input obg="Titulo do Evento" name="titulo" type="text" value="<?= $evento['titulo_evento']?>"/>
					</div>
					<div class="container-row container-row-espc">
						<label>Descrição do Evento: </label><br>
						<input obg="Descrição do Evento" name="descricao_evento" type="text" value="<?= $evento['descricao_evento']?>"/>
					</div>
				</div>
				</div>
			</li>
			<li>
				<fieldset>
					<legend>Fotos </legend>
					<input type="hidden" name="qtd_fotos" value="<?= $tabela2->getLinhasAfetadas()?>" id="qtd_fotos"/>
					<a class='novo-slide' href='#' onclick='add_foto();'>Adicionar Foto</a>
					
					<div id='fotos'>
					<?php
						$i=1;
						
						foreach ($fotos as $key => $foto) {
					?>
						<div class='foto' id='foto<?=$i ?>'>

							<input type='hidden' name="id_foto<?= $i ?>" value="<?=$foto['id'] ?>"/>

							<label>Foto: </label>
							<input class="foto-slide" name="foto<?=$i ?>" type="file" onchange="readURL(this);" />
							<img id='preview<?=$i ?>' src="<?= RAIZ.$foto['arquivo'] ?>" class='preview_foto'/><br>

							<label>Descrição da Foto: </label><br><textarea  name="descricao_foto<?=$i ?>" class="descrissao-slide"><?= $foto['descricao_foto'] ?></textarea>
							<a id="slide-remover" class="btn-danger novo-slide" href='#' onclick="remover_foto(this);">Remover</a>

						</div>

					<?php
						$i++;
					}
					?>
					</div>

				</fieldset>
			</li>

			<li>
				<input class="btn btn-success" type="submit" value="Salvar" />
				<button class="btn btn-danger"  onclick="location='<?= RAIZ.'admin/'.$pagina_admin[0] ?>'; return false;">Cancelar</button>
			</li>

		</ul>
		
	</form>
<?php

			elseif($pagina_admin[1] == "excluir" and is_numeric($pagina_admin[2])):

				$tabela = new Objeto($tabela_local);
				$tabela->addConsulta('id',$pagina_admin[2]);
				$tabela->selecionarTudo();
				$evento = $tabela->retornar();

				if($tabela->deletar() != false){
					
					$tabela2 = new Objeto('foto_evento');
					$tabela2->addConsulta('id_evento',$evento['id']);
					$tabela2->selecionarTudo();
					
					foreach ($tabela2->retornarDados() as $key => $value) {
						unlink('../'.$value['arquivo']);
					}

					if($tabela2->deletar() != false){
						rmdir('../'.$evento['diretorio']);
						$mensagem_sucesso = true;	
					}

				}else{
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
				$grid->addColuna('Titulo', 'titulo_evento');
				$grid->addColuna('Descrição', 'descricao_evento');
				$grid->addColuna('Data do Cadastro', 'data_cadastro');
				$grid->addItemPesquisa('Titulo', 'titulo_evento');
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
						$grid->addConsulta($_POST['item_pesquisa'], $_POST['pesquisa']);
						$grid->addPaginaAtual($_POST['pagina_pesquisa']);
						$grid->addColuna('Cod', 'id');
						$grid->addColuna('Titulo', 'titulo_evento');
						$grid->addColuna('Descrição', 'descricao_evento');
						$grid->addColuna('Data do Cadastro', 'data_cadastro');
						$grid->addItemPesquisa('Titulo', 'titulo_evento');
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

		$grid = new Grid($tabela_local);
		$grid->addColuna('Cod', 'id');
		$grid->addColuna('Titulo', 'titulo_evento');
		$grid->addColuna('Descrição', 'descricao_evento');
		$grid->addColuna('Data do Cadastro', 'data_cadastro');
		$grid->addItemPesquisa('Titulo', 'titulo_evento');
		$grid->gerarGrid();
	}
?>