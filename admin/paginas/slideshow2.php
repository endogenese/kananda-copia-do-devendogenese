 <?php

$tabela_local = "slideshow";
$mensagem_sucesso =  false;
$mensagem_erro =  false;

				
	$tabela = new Objeto($tabela_local);
	$tabela->addConsulta('id',1);
	$tabela->selecionarTudo();

	if(isset($_POST['acao'])){
		if($_POST['acao'] == "salvar"){

			$upload = new Upload("../imagens/site");

			$upload->addFile($_FILES['slide1'],array("jpg","png","gif"),NULL,1);
			$files1 = $upload->retornaFiles(true);

			$upload->addFile($_FILES['slide2'],array("jpg","png","gif"),NULL,1);
			$files2 = $upload->retornaFiles(true);

			$upload->addFile($_FILES['slide3'],array("jpg","png","gif"),NULL,1);
			$files3 = $upload->retornaFiles(true);

			$upload->addFile($_FILES['slide4'],array("jpg","png","gif"),NULL,1);
			$files4 = $upload->retornaFiles(true);

			$tabela->setValor('slide1',substr($files1[0],3));
			$tabela->setValor('slide2',substr($files2[0],3));
			$tabela->setValor('slide3',substr($files3[0],3));
			$tabela->setValor('slide4',substr($files4[0],3));

			if($tabela->getLinhasAfetadas() > 0){
				if($tabela->atualizar() != false){
					$mensagem_sucesso = true;
					
				}else
					$mensagem_erro = true;
			}else{
				if($tabela->inserir() != false){
					$mensagem_sucesso = true;
					
				}else
					$mensagem_erro = true;
			}
		}
	}

	
	if($tabela->getLinhasAfetadas() > 0)
		$config = $tabela->retornar();

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
				<label>Slide 1: </label><input name="slide1" value="<?= ($tabela->getLinhasAfetadas()>0) ? $config['slide1'] : '' ; ?>" type="file" onchange="readURL(this);"/><img id='preview1' src="<?= ($tabela->getLinhasAfetadas()>0) ? RAIZ.$config['slide1'] : '' ; ?>" class='preview_foto'/>
				<div class="clear"></div>
			</li>
			<li>
				<label>Slide 2: </label><input value="<?= ($tabela->getLinhasAfetadas()>0) ? $config['slide2'] : '' ; ?>" type="file" onchange="readURL(this);"/><img id='preview2' src="<?= ($tabela->getLinhasAfetadas()>0) ? RAIZ.$config['slide2'] : '' ; ?>" class='preview_foto'/>
				<div class="clear"></div>
			</li>
			<li>
				<label>Slide 3: </label><input value="<?= ($tabela->getLinhasAfetadas()>0) ? $config['slide3'] : '' ; ?>" type="file"  onchange="readURL(this);"/><img id='preview3' src="<?= ($tabela->getLinhasAfetadas()>0) ? RAIZ.$config['slide3'] : '' ; ?>" class='preview_foto'/>
				<div class="clear"></div>
			</li>
			<li>
				<label>Slide 4: </label><input value="<?= ($tabela->getLinhasAfetadas()>0) ? $config['slide4'] : '' ; ?>" type="file"  onchange="readURL(this);"/><img id='preview4' src="<?= ($tabela->getLinhasAfetadas()>0) ? RAIZ.$config['slide4'] : '' ; ?>" class='preview_foto'/>
				<div class="clear"></div>
			</li>

			<li>
				<input type="submit" value="Salvar" />
				<button onclick="location='<?= RAIZ.'admin/'.$pagina_admin[0] ?>'; return false;">Cancelar</button>
			</li>
			
			
		</ul>
	</form>
<?php

			
?>