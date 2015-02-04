<?php
	
	if(isset($pagina[1]) && is_numeric($pagina[1])){
		$imovel = new Objeto('produto');
	    $foto_imovel = new Objeto('foto_produto');
	    $imovel->addConsulta('id', $pagina[1]);
	    $imovel->selecionarTudo();
	    $imovel = $imovel->retornar();

	    echo "<script> var imovel = '".$pagina[1]."'</script>";

?>


<!--SLIDE IMOVEL SELECIONADO-->

<link href="<?= RAIZ ?>paginas/imovel/css/fotorama.css" rel="stylesheet">
<script src="<?= RAIZ ?>paginas/imovel/js/fotorama.js"></script>
<!--SLIDE IMOVEL SELECIONADO-->

<!--SLIDE SHOW OUTRO IMOVEIS-->
	<link rel="stylesheet" href="<?= RAIZ ?>paginas/imovel/css/jssor.css">
    
    <script type="text/javascript" src="<?= RAIZ ?>paginas/imovel/js/jssor.js"></script>
    <script type="text/javascript" src="<?= RAIZ ?>paginas/imovel/js/jssor.slider.min.js"></script>
    <script src="<?= RAIZ ?>paginas/imovel/js/jssor-effect.js"></script>
<!---->
<link rel="stylesheet" href="<?= RAIZ ?>css/imovel-detalhado.css">
<div class="row" id="imovel-detalhes">
	<div class="col-xs-12" >
			<!--FILTRO-->
		<?php require RAIZ."paginas/subpaginas/buscar.php" ?>
			<!--FOTOS DETALHADAS-->
			<div class="row" id="fotos-detalhes">
				<!--DESCRIÇÃO DO IMOVEL-->
				<div class="col-xs-12" id="descricao-principal">
					<h2>Referência: <?= $imovel['referencia']?></h2>
				</div>

				<!--SLIDE IMOVEL SELECIONADO-->
				<div class="col-xs-8">
					<div class="fotorama" data-nav="thumbs" data-loop="true" data-width="600" data-height="400" data-max-width="100%">
						<?php

							$foto_imovel->limparDados();
              				$foto_imovel->addConsulta('id_produto', $imovel['id'] );
              				$foto_imovel->selecionarTudo();
              				foreach ($foto_imovel->retornarDados() as $key => $value) {

						?>

					  	<a href="<?= RAIZ.$value['arquivo'] ?>"><img src="<?= RAIZ.$value['arquivo'] ?> ?>"></a>
					  
					  <?php
					  	}
					  ?>
					  
					</div>
				</div>
				<!--SLIDE IMOVEL SELECIONADO-->

				<!--FORMULARIO-->
				<div class="col-xs-4" id="formulario-contato">
					<h3>CONTATO</h3>
		          <form action="" class="form form-horizontal">
		            <div class="form-group">
		              <div class="col-xs-12">
		                <input type="text" class="form-control" id="cNome" name="tNome" placeholder="Nome Completo">
		              </div>
		            </div>
		            <div class="form-group">
		                <div class="col-xs-12">
		                  <input type="tel" class="form-control" id="cTelefone" name="tTelefone" placeholder="Telefone">
		                </div>
		              </div>
		            <div class="form-group">
		              <div class="col-xs-12">
		                 <input type="email" class="form-control" id="cEmail" name="tEmail" placeholder="E-mail">
		              </div>
		             </div>
		            <div class="form-group">
		                <div class="col-xs-12">
		                  <textarea class="form-control" name="tMensagem" placeholder="Mensagem" rows="6" cols="43" style="margin: 0px; max-height: 120px; max-width: 280px;"></textarea>
		                </div>
		              </div>
		              <div class="form-group">
		                <div class="col-xs-offset-4 col-xs-6 ">
		                  <button type="submit" name="tEnviar" id="cEnviar" class="btn btn-info">Enviar</button>
		                </div>
		              </div>
		          </form>
				</div> <!--FIM DO FORMULARIO-->
			</div>
			<!--DESCRIÇÃO DO IMOVEL-->
			<div class="row" id="descricao-do-imovel">
				<div class="col-xs-12" >
					<ul class="nav nav-tabs" role="tablist">
						  <li class="active"><a href="#cEspecificacao" onclick='exibe_mapa(false)' role="tab" data-toggle="tab">Especificação</a></li>
						  <li><a href="#mapa" role="tab" onclick='exibe_mapa(true)' data-toggle="tab">Mapa</a></li>
						  <li><a href="#cVideo" role="tab" onclick='exibe_mapa(false)' data-toggle="tab">Vídeo</a></li>
					</ul>
				<!-- Tab panes -->
					<div class="tab-content" style="padding: 5px 10px;">
						  <div class="tab-pane fade " id="cEspecificacao">
						  	<ul>
						  		<li>
						  			<p class="text-left">Descricao: <span><?= $imovel['descricao']?></span></p>
						  		</li>
						  		<li>
						  			<p class="text-left">Referência: <span><?= $imovel['referencia']?></span></p>
						  		</li>
						  		<li>
						  			<p class="text-left">Bairro: <span><?= $imovel['bairro']?></span></p>
						  		</li>
						  		<?php if($imovel['tipo_imovel'] == 'CASA A VENDA' || $imovel['tipo_imovel'] == 'CASA PARA ALUGAR'){?>
						  		<li>
						  			<p class="text-left">Quantidade de quarto(s): <span><?= $imovel['quartos']?></span></p>
						  		</li>
						  		<li>
						  			<p class="text-left">Quantidade de suite(s): <span><?= $imovel['suites']?></span></p>
						  		</li>
						  		<li>
						  			
						  			<p class="text-left">Quantidade de Garagem: <span><?= $imovel['garagem']?></span></p>
						  		</li>
						  		<?php } ?>
						  	</ul>
						  </div>
						  <div class="tab-pane fade in active mapa_individual" id="mapa" style="height: 300px; width: 100%;">
								<!-- Maps API Javascript -->
							<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyCg1ogHawJGuDbw7nd6qBz9yYxYPoGTWQo&sensor=false"></script>
        						
						  </div>
						  <div class="tab-pane fade " id="cVideo">
						  	<iframe width="100%" height="400" src="<?= (stripos($imovel['video'], 'embed')) ? $imovel['video'] : '' ?>" frameborder="0" allowfullscreen></iframe>	
						  </div>
					</div>
				</div>
			</div>
						
			<!--OUTROS IMOVEIS-->
			<div class="row" id="outros-imoveis">
				<div class="col-xs-12">
					<h2 class="title-kananda">IMÓVEIS SIMILARES</h2>
				</div>
				<div class="col-xs-12" style="background: #C0BFC4; padding:5px;">
					<div id="slider1_container" class="container-slide">
				        <!-- Loading Screen -->
				        <div u="loading" class="loading-screen">
				            <div class="loading-1">
				            </div>
				            <div class="loading-2">
				            </div>
				        </div>

				        <!-- Slides Container -->
				        <div u="slides" class="slide-container">
				            
				        <?php

				        	$similares = new Objeto('produto');
				        	$similares->addConsulta('tipo_imovel',$imovel['tipo_imovel']);
				        	$similares->addConsulta('cidade',$imovel['cidade']);

				        	if($imovel['tipo_imovel'] == 'CASA A VENDA' || $imovel['tipo_imovel'] == 'CASA PARA ALUGAR'){
				        		$similares->addExtras(' AND id!='.$imovel['id'].' ORDER BY quartos');
				        	}else{
				        		$similares->addExtras(' AND id!='.$imovel['id']);
				        	}

				        	$similares->selecionarTudo();

				        	$foto_similar = new Objeto('foto_produto');

				        	foreach ($similares->retornarDados() as $key => $value) {

					        	$foto_similar->limparDados();
	              				$foto_similar->addConsulta('id_produto', $value['id'] );
	              				$foto_similar->selecionarTudo();
	              				$foto = $foto_similar->retornar();              				
	              				
				        ?>
				            <div><a href="<?= RAIZ ?>imovel/<?= $value['id']?>"><img u="image" src="<?= RAIZ.$foto['arquivo'] ?>" /></a></div>

				        <?php
				    	}
				        ?>
				        </div>
				        <!-- bullet navigator container -->
				        <div u="navigator" class="jssorb03" id="navigator-slide" style="position: absolute; bottom: 4px; right: 6px;">
				            <!-- bullet navigator item prototype -->
				            <div u="prototype" style="position: absolute; width: 21px; height: 21px; text-align:center; line-height:21px; color:white; font-size:12px;"><NumberTemplate></NumberTemplate></div>
				        </div>
				        <!-- Bullet Navigator Skin End -->
				        <!-- Arrow Left -->
				        <span u="arrowleft" class="jssora03l" style="width: 55px; height: 55px; top: 123px; left: 8px; display:block;">
				        </span>
				        <!-- Arrow Right -->
				        <span u="arrowright" class="jssora03r" style="width: 55px; height: 55px; top: 123px; right: 8px">
				        </span> 
				    </div>
				</div>
			</div>
	</div><!--Fim do detalhes imoveis-->
</div>

<?php

	}else{

		header('location: '.RAIZ);
	}
?>
