
<link rel="stylesheet" href="<?= RAIZ ?>css/imovel-categoria.css">

<!--FILTRO-->
    
    <div class="row" id="filtro-detalhe">
        <div class="col-xs-12" style="padding-top: 8px;">     
        <form action="<?= RAIZ.'pesquisa' ?>" method='POST' role="form" class="form">
            
            <div class="form-group col-xs-4">
                <label for="selecionaImovel">Imóvel: </label>
                <select name="selecionaImovel" id="selecionaImovel" class="form-control itemPesquisa">

                      <?= Funcao::gerarArraySelectOptions(array('CASA A VENDA' => 'Casas a Venda', 'CASA PARA ALUGAR' => 'Casas para Aluguar' ,'AREAS PORTUARIA' => 'Áreas Portuárias' ,'LOTEAMENTO' => 'Loteamentos' , 'TERRENO URBANO' => 'Terrenos Urbanos','TERRENO RURAL' => 'Terrenos Rurais'), (isset($_POST['selecionaImovel'])) ? $_POST['selecionaImovel'] : '')?>
                        
                </select>
              </div>
             <div class="form-group col-xs-4 o"> <!-- INCLUIR O CAMPO QUE COMEÇA OCULTO, COM A CLASSE "o"-->
                <label for="area">Área </label>
                      <input type="text" class="form-control itemPesquisa" id="area" name="area" value="<?= (isset($_POST['area'])) ? $_POST['area'] : ''?>">
            </div>
              <div class="form-group col-xs-4 a"> <!-- INCLUIR A CLASSE "a", que força o tipo block-->
              <label for="selecionaQntQuarto">Quarto: </label>
                <select name="selecionaQntQuarto" id="selecionaQntQuarto" class="form-control itemPesquisa">

                      <?= Funcao::gerarArraySelectOptions(array('1', '2', '3', '4', '5', '+' => 'mais de 5'), (isset($_POST['selecionaQntQuarto'])) ? $_POST['selecionaQntQuarto'] : '')?>
                        
                      </select>
            </div>
            <div class="form-group col-xs-4 o"> <!-- INCLUIR O CAMPO QUE COMEÇA OCULTO, COM A CLASSE "o"-->
                <label for="comprimento">Comprimento </label> 
                      <input type="text" class="form-control itemPesquisa" id="comprimento" name="comprimento" value="<?= (isset($_POST['comprimento'])) ? $_POST['comprimento'] : ''?>">
            </div>
            <div class="form-group col-xs-4 a"> <!-- INCLUIR A CLASSE "a", que força o tipo block-->
              <label for="selecionaQntSuites">Suite: </label>
              <select name="selecionaQntSuites" id="selecionaQntSuites" class="form-control itemPesquisa">
                
                <?= Funcao::gerarArraySelectOptions(array('0', '1', '2', '3', '4', '5', '+' => 'mais de 5'), (isset($_POST['selecionaQntSuites'])) ? $_POST['selecionaQntSuites'] : '')?>
                  
              </select>
            </div>
            <div class="form-group col-xs-4 o"> <!-- INCLUIR O CAMPO QUE COMEÇA OCULTO, COM A CLASSE "o"-->
                <label for="largura">Largura </label>
                      <input type="text" class="form-control itemPesquisa" id="largura" name="largura" value="<?= (isset($_POST['largura'])) ? $_POST['largura'] : ''?>">
            </div>
            <div class="form-group col-xs-4 a"> <!-- INCLUIR A CLASSE "a", que força o tipo block-->
              <label for="selecionaqntGaragem">Garagem: </label>
              <select name="selecionaqntGaragem" id="selecionaqntGaragem" class="form-control itemPesquisa">
              
                <?= Funcao::gerarArraySelectOptions(array('0', '1', '2', '3', '4', '5', '+' => 'mais de 5'), (isset($_POST['selecionaqntGaragem'])) ? $_POST['selecionaqntGaragem'] : '1')?>
              
              </select>
            </div>
            <div class="form-group col-xs-4">
              <label for="selecionaBairro">Bairro: </label>
              <select name="selecionaBairro" id="selecionaBairro" class="form-control itemPesquisa">
                
                <?= Funcao::gerarArraySelectOptions(array( 'qualquer' => 'Qualquer Bairro', 'BELA VISTA' => 'Bela Vista', 'BOA ESPERANÇA' => 'Boa Esperança','BOM JARDIM' => 'Bom Jardim', 'BOM REMÉDIO' => 'Bom Remédio', 'CENTRO' => 'Centro', 'FLORESTA' => 'Floresta', 'JARDIM AEROPORTO' => 'Jardim Aeroporto', 'JARDIM AMÉRICA' => 'Jardim América', 'JARDIM DAS ARARAS' => 'Jardim das Araras', 'JARDIM TAPAJÓS' => 'Jardim Tapajós', 'LIBERDADE' => 'Liberdade', 'MARIA MADALENA' => 'Maria Madalena', 'NOVA ITAITUBA' => 'Nova Itaituba', 'NOVO PARAÍSO' => 'Novo Paraíso', 'PERPÉTUO SOCORRO' => 'Perpétuo Socorro', 'PIRACANÃ' => 'Piracanã', 'RESIDENCIAL VALE DO PIRACANÃ' => 'Residencial Vale do Piracanã', 'RESIDENCIAL VIVA ITAITUBA' => 'Residencial Viva Itaituba' , 'RESIDENCIAL WIRLAND FREIRE' => 'Residencial Wirland Freire', 'SANTO ANTÔNIO' => 'Santo Antônio', 'SÃO FRANCISCO' => 'São Francisco', 'SÃO JOSÉ' => 'São José', 'VALE DO TAPAJÓS' => 'Vale do Tapajós', 'VALMIRLÂNDIA' => 'Valmirlândia', 'VITÓRIA-RÉGIA' => 'Vitória-Régia'), (isset($_POST['selecionaBairro'])) ? $_POST['selecionaBairro'] : '')?>
                          
              </select>
            </div>
            <div class="form-group col-xs-2">
                <label for="cReferencia">Referência: </label>
                      <input type="text" class="form-control itemPesquisa" id="cReferencia" name="cReferencia" value="<?= (isset($_POST['cReferencia'])) ? $_POST['cReferencia'] : ''?>">
            </div>
          <div class="form-group col-xs-1">
            <button type="submit" name="tBuscar" id="cBuscar" class="btn btn-info">Buscar</button>
          </div>
        </form>

        </div>
      </div><!--FILTRO-->



<!--CATEGORIA DE IMOVEL-->

  <div id="imovel-home">
          <h3 class="imovel-nome">
            <?php

              if(isset($_POST['selecionaImovel'])){

                switch ($_POST['selecionaImovel']) {
                  case 'CASA PARA ALUGAR':
                    echo 'Aluguel de Casas';
                    break;
                  case 'CASA A VENDA':
                    echo 'Casas a Venda';
                    break;
                  case 'AREAS PORTUARIA':
                    echo 'Áreas Portuárias';
                    break;
                  case 'LOTEAMENTO':
                    echo 'Loteamento';
                    break;
                  case 'TERRENO URBANO':
                    echo 'Terrenos Urbanos';
                    break;                  
                  default:
                    echo 'Terrenos Rurais';
                    break;
                }

              }elseif(isset($_POST['cReferencia']) && $_POST['cReferencia'] != ''){

                echo 'Imóvel';

              }

            ?>
          </h3>
          <?php

            $imovel = new Objeto('produto');    
            $foto_imovel = new Objeto('foto_produto');

            if(isset($_POST['selecionaImovel'])){
                
              
              $imovel->addConsulta('tipo_imovel', $_POST['selecionaImovel']);

              if($_POST['selecionaImovel'] == 'CASA A VENDA' || $_POST['selecionaImovel'] == 'CASA PARA ALUGAR'){

                $imovel->addConsultaOR('quartos', $_POST['selecionaQntQuarto']);
                $imovel->addConsultaOR('suites', $_POST['selecionaQntSuites']);
                $imovel->addConsultaOR('garagem', $_POST['selecionaqntGaragem']);
                

                if($_POST['selecionaBairro'] != 'qualquer')
                  $imovel->addConsulta('bairro', $_POST['selecionaBairro']);
                

              }else{

                if($_POST['area'] != '')
                  $imovel->addConsulta('area_ter', $_POST['area']);

                if($_POST['comprimento'] != '')
                  $imovel->addConsulta('perimetro_c', $_POST['comprimento']);

                if($_POST['largura'] != '')
                $imovel->addConsulta('perimetro_l', $_POST['largura']);

                if($_POST['selecionaBairro'] != 'qualquer')
                  $imovel->addConsulta('bairro', $_POST['selecionaBairro']);

              }

            }elseif($_POST['cReferencia'] != ''){

              $imovel->addConsulta('referencia', $_POST['cReferencia']);

            }else{

              header('location: '.RAIZ);

            }
            

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
                  <a href="<?= RAIZ ?>imovel/<?= $value['id']?>">
                      <div class="home-imovel">
                        <img src="<?= RAIZ.$foto['arquivo'] ?>" alt="...">
                        <div class="home-legenda-imovel">
                           <p><span class="icone-imovel">h</span> Quartos: <?=$value['quartos']?><br>
                             <span class="icone-imovel">x</span> Garagem: <?=$value['garagem']?><br>
                             <span class="icone-imovel">V</span> Área: <?=$value['area_ter']?></p>
                        </div>
                      </div>
                   </a>
                </div>
               
          <?php

            if(($i % 3 == 0) || $i == $imovel->getLinhasAfetadas())
              echo "</div>";

            $i++;

            }

          }else{
            echo 'Nenhum imóvel encontrado com as informações fornecidas.';
          }


          $imovel->limparDados(); 
          $imovel->addConsulta('tipo_imovel', 'loteamento');
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

                      <?php echo Funcao::gerarPaginacao(RAIZ.'loteamentos/page', $qtd_paginas, $pagina_atual, 'id="imovel-paginacao"', 'class="pagination"' ) ?>

                  </div>
                </div>
        <?php
          }
        ?>
      </div><!--FIM CATEGORIA DE IMOVEL-->