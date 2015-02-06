
<link rel="stylesheet" href="<?= RAIZ ?>css/imovel-categoria.css">

<!--FILTRO-->
    <?php require RAIZ."paginas/subpaginas/buscar.php" ?>
<!--CATEGORIA DE IMOVEL-->

  <div id="lista-de-imoveis">
          <h3 class="title-do-imovel">Terrenos Rurais</h3>
          <br>
          <?php

            $imovel = new Objeto('produto');
            $foto_imovel = new Objeto('foto_produto');
            $imovel->addConsulta('tipo_imovel', 'terreno rural');

            if(isset($pagina[2]) && is_numeric($pagina[2]) && $pagina[2] > 1)
              $imovel->addExtras(' ORDER BY id DESC LIMIT '.(($pagina[2] - 1 ) * 9).' , '.(((($pagina[2] - 1 ) * 9)) + 8) ); 
            else
              $imovel->addExtras('ORDER BY id DESC');
            
            $imovel->selecionarTudo();
            if($imovel->getLinhasAfetadas()>0){

            $i = 1;
            foreach ($imovel->retornarDados() as $key => $value) {
              
              if($i > 9)
                break;

              if((($i - 1) % 3 == 0) || $i == 1)
                echo "<div class='row'>";

              $foto_imovel->limparDados();
              $foto_imovel->addConsulta('id_produto', $value['id'] );
              $foto_imovel->addExtras('LIMIT 1');
              $foto_imovel->selecionarTudo();
              $foto = $foto_imovel->retornar();
          ?>
            
                <div class="col-xs-4">
                  <a href="<?= RAIZ ?>imovel/<?= $value['id']?>" class="thumbnail">
                        <img src="<?= RAIZ.$foto['arquivo'] ?>" alt="IMOVEL DA KANANDA.IMB.BR">
                        <div class="legenda-imovel">
                           <p>
                             <span class="icone-imovel">V</span> Área do Terreno:  <?=$value['area_ter']?><br>
                             <span class="glyphicon glyphicon-resize-horizontal"></span> Largura:  <?=$value['perimetro_l']?><br>
                             <span class="glyphicon glyphicon-resize-vertical"></span> Comprimento:  <?=$value['perimetro_c']?>
                           </p>
                        </div>
                   </a>
                </div>
               
          <?php

            if(($i % 3 == 0) || $i == $imovel->getLinhasAfetadas())
              echo "</div>";

            $i++;

            }

          }else{
            echo 'Não há terrenos rurais disponíveis';
          }


          $imovel->limparDados(); 
          $imovel->addConsulta('tipo_imovel', 'terreno rural');
          $imovel->selecionarTudo();

          if($imovel->getLinhasAfetadas()>9){

            $qtd_paginas = ceil($imovel->getLinhasAfetadas() / 9);
              
            if(isset($pagina[2]) && is_numeric($pagina[2]))
              $pagina_atual = $pagina[2];
            else
              $pagina_atual = 1;

          ?>            


        <!--PAGINAÇÃO-->
                <div class="row">
                  <div class="col-xs-12">

                      <?php echo Funcao::gerarPaginacao(RAIZ.'terrenos-rurais/page', $qtd_paginas, $pagina_atual, 'id="imovel-paginacao"', 'class="pagination"' ) ?>

                  </div>
                </div>
        <?php
          }
        ?>
      </div><!--FIM CATEGORIA DE IMOVEL-->