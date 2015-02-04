 <?php

$tabela_local = "empresa";
$mensagem_sucesso =  false;
$mensagem_erro =  false;

				
	$tabela = new Objeto($tabela_local);
	$tabela->addConsulta('id',1);
	$tabela->selecionarTudo();

	if(isset($_POST['acao'])){
		if($_POST['acao'] == "salvar"){

			$upload = new Upload("../img/site");
			$upload->addFile($_FILES['foto1'],array("jpg","png","gif"),NULL,1);
			$files = $upload->retornaFiles(true);

			if(substr($files[0],3) != ''){
				$tabela->addConsulta('id',1);
				$tabela->selecionarTudo();
				$img = $tabela->retornar();
				$tabela->limparDados();
			}

			$tabela->setValor('nome',$_POST['nome']);
			$tabela->setValor('email',$_POST['email']);
			$tabela->setValor('titulo_site',$_POST['titulo_site']);
			$tabela->setValor('logotipo',substr($files[0],3));

			if($tabela->getLinhasAfetadas() > 0){

				if($tabela->atualizar() != false){
					$mensagem_sucesso = true;
					$mensagem_erro = false;
						
					if(file_exists('../'.$img['logotipo'])){
						unlink('../'.$img['logotipo']);
						echo 'deletando ../'.$img['logotipo'];
					}
					
				}else{
					$mensagem_erro = true;
					$mensagem_sucesso = false;
				}

			}else{

				if($tabela->inserir() != false){
					$mensagem_sucesso = true;
					$mensagem_erro = false;
				}else{
					$mensagem_erro = true;
					$mensagem_sucesso = false;
				}
			}
		}

		if($mensagem_sucesso){
			header("location: ".RAIZ.'admin/'.$pagina_admin[0].'/sucess');
		}elseif ($mensagem_erro) {
			header("location: ".RAIZ.'admin/'.$pagina_admin[0].'/error');
		}

	}

	if(isset($pagina_admin[1])){
		if($pagina_admin[1] == 'error'){ 
			echo "<div class='mensagem_erro'>Ocorreu um erro!</div>";
		}elseif ($pagina_admin[1] == 'sucess') {
			echo "<div class='mensagem_sucesso'>Operação realizada com sucesso!</div>";
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
				<h2>Empresa</h2>	
				<div class="container-grids grid-in-line">
				<!-- divisao -->
				<div class="container-1">
					<div class="container-row container-row-espc">
						<label>Nome da Empresa: </label><br>
						<input obg="Nome" name="nome" type="text" value="<?= ($tabela->getLinhasAfetadas()>0) ? $config['nome'] : '' ; ?>" />
					</div>
				</div>
				<div class="container-1">
					<div class="container-row container-row-espc">
						<label>E-mail: </label><br>
						<input class="email" obg="E-mail" name="email" value="<?= ($tabela->getLinhasAfetadas()>0) ? $config['email'] : '' ; ?>" type="text" />
					</div>
				</div>
				<div class="container-1">
					<div class="container-row container-row-espc">
						<label>Titulo do Site: </label><br>
						<input  obg="Titudo do Site" name="titulo_site" value="<?= ($tabela->getLinhasAfetadas()>0) ? $config['titulo_site'] : '' ; ?>" type="text" />
					</div>
				</div>
				<div class="container-1">
					<div class="container-row container-row-espc">
						<label>Logotipo: </label><br>
						<input name="foto1" class="seleciona-foto" value="<?= ($tabela->getLinhasAfetadas()>0) ? $config['logotipo'] : '' ; ?>" type="file"  onchange="readURL(this);" />
						<img id='preview1' class='preview_foto' src="<?= ($tabela->getLinhasAfetadas()>0) ? RAIZ.$config['logotipo'] : '' ; ?>" />
					</div>
				</div>
				</div>
			</li>	
			<li>
				<input type="submit" class="btn btn-success" value="Salvar" />
				<button class="btn btn-danger" onclick="location='<?= RAIZ.'admin/'.$pagina_admin[0] ?>'; return false;">Cancelar</button>
			</li>
			
			
		</ul>
	</form>
<?php

			
?>