
<link rel="stylesheet" href="<?= RAIZ ?>/css/imovel-categoria.css">
<link rel="stylesheet" href="<?= RAIZ ?>/css/galeria.css">
<!--FOTORAMA-->
<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
<link href="<?= RAIZ ?>/paginas/galeria/css/fotorama.css" rel="stylesheet">
<script src="<?= RAIZ ?>/paginas/galeria/js/fotorama.js"></script>
<!---->
<di class="row" >

  <?php

    $evento_obj = new Objeto('evento');
    
    if(isset($pagina[1]) && is_numeric($pagina[1]))
      $evento_obj->addConsulta('id', $pagina[1]);
    
    $evento_obj->addExtras('ORDER BY id DESC LIMIT 1');
    $evento_obj->selecionarTudo();
    $evento = $evento_obj->retornar();

    $fotos_evento = new Objeto('foto_evento');
    $fotos_evento->addConsulta('id_evento', $evento['id']);
    $fotos_evento->selecionarTudo();

  ?>

	<!--FOTO selecionada-->

	<div class="col-xs-12"class id="galeria-show">
		<div class="fotorama" data-nav="thumbs" data-loop="true" data-width="950" data-height="400" data-allowfullscreen="true">
      <?php

        foreach ($fotos_evento->retornarDados() as $key => $value) {
                  
      ?>
	<!-- data-caption="texto" -->
      <a href="<?= RAIZ.$value['arquivo'] ?>" data-caption="<?= $value['descricao_foto'] ?>"></a>

      <?php } ?>
       
		</div>
	</div>
</di>

<?php
  
  $evento_obj->limparDados();
  $fotos_evento->limparDados();

  // define quantos registros vão ser exibidos
  if(isset($pagina[2]) && is_numeric($pagina[2]) && $pagina[2] > 1)
    $evento_obj->addExtras(' ORDER BY id DESC LIMIT '.(($pagina[2] - 1 ) * 6).' , '.(((($pagina[2] - 1 ) * 6)) + 5) ); 
  else
    $evento_obj->addExtras('ORDER BY id DESC');

  $evento_obj->selecionarTudo();

?>

<!--CATEGORIA DE IMOVEL-->

	<div id="lista-de-imoveis">
          <h3 class="imovel-nome">Galeria</h3>
          <?php

            if($evento_obj->getLinhasAfetadas()>0){

              $i = 1;
              foreach ($evento_obj->retornarDados() as $key => $value) {
                
                if($i > 6)
                  break;

                if((($i - 1) % 3 == 0) || $i == 1)
                  echo "<div class='row'>";

                $fotos_evento->limparDados();
                $fotos_evento->addConsulta('id_evento', $value['id'] );
                $fotos_evento->addExtras('LIMIT 1');
                $fotos_evento->selecionarTudo();
                $foto = $fotos_evento->retornar();
              
          ?>
              <div class="col-xs-4">
                  <a href="<?= RAIZ ?>galeria/<?= $value['id']?>">
                      <div class="home-imovel">
                        <img src="<?= RAIZ.$foto['arquivo'] ?>" alt="...">
                        <div class="home-legenda-imovel">
                            <p class="class-titulo"><?= $value['titulo_evento']?></p>
                           <p class="class-data"><?= $value['descricao_evento']?></p>
                        </div>
                      </div>
                   </a>
                </div>

          <?php

                if(($i % 3 == 0) || $i == $evento_obj->getLinhasAfetadas())
                  echo "</div>";

                $i++;
              }

            }else{
              echo "Não há eventos disponíveis.";
            }

          $evento_obj->limparDados(); 
          $evento_obj->selecionarTudo();

          if($evento_obj->getLinhasAfetadas()>6){

            $qtd_paginas = ceil($evento_obj->getLinhasAfetadas() / 6);
              
            if(isset($pagina[2]) && is_numeric($pagina[2]))
              $pagina_atual = $pagina[2];
            else
              $pagina_atual = 1;


          ?>
            
				<!--PAGINAÇÃO-->
	            	<div class="row">
	            		<div class="col-xs-12">

                    <?php echo Funcao::gerarPaginacao(RAIZ.'galeria/page', $qtd_paginas, $pagina_atual, 'id="imovel-paginacao"', 'class="pagination"' ) ?>

	            	</div>
	            </div>
        <?php
        }
        ?>
      </div><!--FIM CATEGORIA DE IMOVEL-->
