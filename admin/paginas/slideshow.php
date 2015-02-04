 <?php

$tabela_local = "slideshow";
$mensagem_sucesso =  false;
$mensagem_erro =  false;

				
	$tabela = new Objeto($tabela_local);
	$tabela->selecionarTudo();

	if(isset($_POST['acao'])){
		if($_POST['acao'] == "salvar"){

			$upload = new Upload("../img/site");

			$array_slides = array();// fotos do evento no banco
			$i=0;
			foreach ($tabela->retornarDados() as $key => $value) {
				$array_slides[$i] = $value['id'];
				$i++;
			}
			$tabela->limparDados();
			$qtd_array_slides = count($array_slides);

			for ($i=1; $i <= $_POST['qtd_fotos']; $i++) {

				if(isset($_FILES['foto'.$i])){// verifica se existem fotos para serem atualizadas
					
					$upload->addFile($_FILES['foto'.$i],array("jpg","png","gif"),NULL,1);
					$file = $upload->retornaFiles(true);				
					
					if(isset($_POST['id_foto'.$i])){

						$tabela->addConsulta('id',$_POST['id_foto'.$i]);
						$tabela->selecionarTudo();
						$img = $tabela->retornar();

						if(substr($file[0],3)==''){// caso não houver nova imagem é usado o arquivo que ja está no server
							
							$tabela->setValor('slide',$img['slide']);

						}else{// caso houver uma nova imagem a antiga deve ser removida

							$tabela->setValor('slide',substr($file[0],3));	
							$img_apagar = $img['slide'];

						}

						$tabela->setValor('titulo',$_POST['titulo'.$i]);
						$tabela->setValor('descricao',$_POST['descricao'.$i]);

						for($j = 0 ; $j < $qtd_array_slides; $j++) {// remove a foto do array de exclusão
							if(array_key_exists($j, $array_slides)){
								if($array_slides[$j] == $_POST['id_foto'.$i])
									unset($array_slides[$j]);
							}
						}
						
						$tabela->addConsulta('id',$_POST['id_foto'.$i]);
						
						if($tabela->atualizar() != false){
							if(isset($img_apagar)){// apaga a imagem antiga
								if($img_apagar != ''){
									if(file_exists('../'.$img['slide']))
										unlink('../'.$img['slide']);
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
						
						$tabela->setValor('slide',substr($file[0],3));	
						
						if($tabela->inserir() != false){
							$mensagem_sucesso = true;
							$mensagem_erro = false;
						}else{
							$mensagem_sucesso = false;
							$mensagem_erro = true;
						}
					}
					

					$tabela->limparDados();
			
				}
			}

			// caso haja fotos para serem removidas do banco
			if(count($array_slides) > 0 ){
				foreach ($array_slides as $key => $value) {
					$tabela->addConsulta('id',$value);
					$tabela->selecionarTudo();
					$img = $tabela->retornar();

					if(file_exists('../'.$img['slide'])){
						unlink('../'.$img['slide']);
					}

					if($tabela->deletar()){
						$mensagem_sucesso = true;
						$mensagem_erro = false;
					}else{
						$mensagem_sucesso = false;
						$mensagem_erro = true;
					}
					
					
				}
				$tabela->limparDados();

			}

		}

		if($mensagem_sucesso){
			header("location: ".RAIZ.'admin/'.$pagina_admin[0].'/sucess');
		}elseif ($mensagem_erro) {
			header("location: ".RAIZ.'admin/'.$pagina_admin[0].'/error');
		}
	}


	$tabela->limparDados();
	$tabela->addExtras('ORDER BY id DESC');
	$tabela->selecionarTudo();
	//$tabela->imprimirObjeto();
	$slide = $tabela->retornarDados();

	if(isset($pagina_admin[1])){
		if($pagina_admin[1] == 'error'){ 
			echo "<div class='mensagem_erro'>Ocorreu um erro!</div>";
		}elseif ($pagina_admin[1] == 'sucess') {
			echo "<div class='mensagem_sucesso'>Operação realizada com sucesso!</div>";
		}
	}
?>
	<form enctype="multipart/form-data" id="alterar-administrador" action="<?= RAIZ.'admin/'.implode('/',$pagina_admin); ?>" method="post" autocomplete="off">
	<input type="hidden" name="acao" value="salvar" />

		<ul>


			<li>
				<h2>SlideShow da Pagina Inicial (Home)</h2>
				<p class="obs">OBS: É recomendado que utilize uma imagem editada com sua largura de até 950 pixels e sua altura 380 pixels, caso contrario a imagem sera cortada pelo proprio slideshow.</p>
				
				<fieldset>
					<legend>Fotos </legend>
					<input type="hidden" name="qtd_fotos" value="<?= $tabela->getLinhasAfetadas()?>" id="qtd_fotos"/>
					<a href='#' onclick='add_slideshow();' class='novo-slide'>Adicionar Slide</a>
					<div id='fotos'>
					<?php
						$i=1;
						
						foreach ($slide as $key => $foto) {
					?>
						<div class='foto' id='foto<?=$i ?>'>

							<input class="foto-slide" type='hidden' name="id_foto<?= $i ?>" value="<?=$foto['id'] ?>"/>

							<label>Foto: </label><input name="foto<?=$i ?>" type="file" onchange="readURL(this);" /><img id='preview<?=$i ?>' src="<?= RAIZ.$foto['slide'] ?>" class='preview_foto'/>
							
							<input class="slide-title" type='text' name="titulo<?= $i ?>" value="<?=$foto['titulo'] ?>"/>
							
							<textarea name="descricao<?= $i ?>" class="descrissao-slide"><?= $foto['descricao'] ?></textarea>
							<a href='#' id="slide-remover" class="btn-danger novo-slide" onclick="remover_foto(this);">Remover</a>

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
				<button class="btn btn-danger" onclick="location='<?= RAIZ.'admin/'.$pagina_admin[0] ?>'; return false;">Cancelar</button>
			</li>
			
			
		</ul>
	</form>
<?php

			
?>