
<link rel="stylesheet" href="<?= RAIZ ?>/css/home-index.css" media="all">
<!--FILTRO-->
<?php require RAIZ."paginas/subpaginas/buscar.php" ?>

  <!-- SLIDE -->
  <div class="row">
    <div class="col-md-12" id>
      <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <?php

      $slide_objeto = new Objeto('slideshow');
      $slide_objeto->selecionarTudo();
      for ($i=0; $i < $slide_objeto->getLinhasAfetadas(); $i++) { 
        if($i == 0)
          echo "<li data-target='#carousel-example-generic' data-slide-to='".$i."' class='active'></li>";
        else
          echo "<li data-target='#carousel-example-generic' data-slide-to='".$i."'></li>";
      }
    ?>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" id="slideshow-home">

  <?php
    
    $i = 0;
    foreach ($slide_objeto->retornarDados() as $key => $value) {    
  ?>
      <div class="item <?= ($i==0)? 'active': ''?>">
        <img src="<?= RAIZ.$value['slide'] ?>" alt="legenda" class="carousel-img">
        <div class="carousel-caption" id="slide-caption">
         <h3 id="title-slide-home"><?= $value['titulo']?></h3>
         <p id="desc-slide-home"><?= $value['descricao']?></p>
           <script>
              var title = document.getElementById("title-slide-home");
              var descricao_slide = document.getElementById("desc-slide-home");
              if((title.value == "")&&(descricao_slide.value == "")){
                document.getElementById("slide-caption").style.display="none";
              }
           </script>
        </div>
      </div>
    <?php
      $i++;
      }
    ?>

  </div> 

  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
  </a>
</div>

    </div>
  </div>

<!--A VENDA-->

      <?php
      $imovel = new Objeto('produto');
      $imovel->addConsulta('tipo_imovel', 'casa a venda');
      $imovel->addExtras('ORDER BY id DESC LIMIT 3');
      $imovel->selecionarTudo();

      $foto_imovel = new Objeto('foto_produto');

      if($imovel->getLinhasAfetadas()>0){
    ?>
      <div id="lista-de-imoveis">
          <h3 class="title-do-imovel">Casas a Venda</h3>
            <div class="row">
              <?php

                foreach ($imovel->retornarDados() as $key => $value) {
                  $foto_imovel->limparDados();
                  $foto_imovel->addConsulta('id_produto', $value['id'] );
                  $foto_imovel->addExtras('LIMIT 1');
                  $foto_imovel->selecionarTudo();
                  $foto = $foto_imovel->retornar();
              ?>
                <div class="col-xs-4" >
                  <a href="<?= RAIZ ?>imovel/<?= $value['id']?>" class="thumbnail">
                        <img src="<?= RAIZ.$foto['arquivo'] ?>" alt="IMOVEL DA KANANDA.IMB.BR">
                        <div class="legenda-imovel">
                           <p><span class="icone-imovel">h</span> Quartos: <?=$value['quartos']?><br>
                             <span class="icone-imovel">x</span> Garagem: <?=$value['garagem']?><br>
                             <span class="icone-imovel">V</span> Área Edificada: <?=$value['area_edi']?></p>
                        </div>
                   </a>
                </div>
                <?php
                  }
                ?>

                <a href="<?= RAIZ ?>venda" class="imovel-ver-mais btn-info btn">Ver Mais</a>
            </div>
      </div>
      <?php } ?>
 
  <!--CASA PARA ALUGAR-->
  <?php
    $imovel->limparDados();
    $imovel->addConsulta('tipo_imovel', 'casa para alugar');
    $imovel->addExtras('ORDER BY id DESC LIMIT 3');
    $imovel->selecionarTudo();
    if($imovel->getLinhasAfetadas()>0){
  ?>
  <div id="lista-de-imoveis">
          <h3 class="title-do-imovel">Casas para Aluguar</h3>
            <div class="row">
              <?php

                foreach ($imovel->retornarDados() as $key => $value) {
                  $foto_imovel->limparDados();
                  $foto_imovel->addConsulta('id_produto', $value['id'] );
                  $foto_imovel->addExtras('LIMIT 1');
                  $foto_imovel->selecionarTudo();
                  $foto = $foto_imovel->retornar();
              ?>
                <div class="col-xs-4" >
                  <a href="<?= RAIZ ?>imovel/<?= $value['id']?>" class="thumbnail">
                        <img src="<?= RAIZ.$foto['arquivo'] ?>" alt="IMOVEL DA KANANDA.IMB.BR">
                        <div class="legenda-imovel">
                           <p><span class="icone-imovel">h</span> Quartos: <?=$value['quartos']?><br>
                             <span class="icone-imovel">x</span> Garagem: <?=$value['garagem']?><br>
                             <span class="icone-imovel">V</span> Área Edificada: <?=$value['area_edi']?>
                           </p>
                        </div>
                   </a>
                </div>
                <?php
                  }
                ?>

                <a href="<?= RAIZ ?>aluguel" class="imovel-ver-mais btn-info btn">Ver Mais</a>
            </div>
  </div>

  <?php } ?>

  <!--TERRENOS-->
  <?php
    $imovel->limparDados();
    $imovel->addConsulta('tipo_imovel', 'loteamento');
    $imovel->addExtras('ORDER BY id DESC LIMIT 3');
    $imovel->selecionarTudo();
    if($imovel->getLinhasAfetadas()>0){
  ?>
  <div id="lista-de-imoveis">
          <h3 class="title-do-imovel">Loteamentos</h3>
            <div class="row">
              <?php

                foreach ($imovel->retornarDados() as $key => $value) {
                  $foto_imovel->limparDados();
                  $foto_imovel->addConsulta('id_produto', $value['id'] );
                  $foto_imovel->addExtras('LIMIT 1');
                  $foto_imovel->selecionarTudo();
                  $foto = $foto_imovel->retornar();
              ?>
                <div class="col-xs-4" >
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
                  }
                ?>

                <a href="<?= RAIZ ?>loteamentos" class="imovel-ver-mais btn-info btn">Ver Mais</a>
            </div>
  </div>
  <?php } ?>



  <!--TERRENO URBANO-->
  <?php
    $imovel->limparDados();
    $imovel->addConsulta('tipo_imovel', 'terreno urbano');
    $imovel->addExtras('ORDER BY id DESC LIMIT 3');
    $imovel->selecionarTudo();
    if($imovel->getLinhasAfetadas()>0){
  ?>
  <div id="lista-de-imoveis">
          <h3 class="title-do-imovel">Terrenos Urbanos</h3>
            <div class="row">
              <?php

                foreach ($imovel->retornarDados() as $key => $value) {
                  $foto_imovel->limparDados();
                  $foto_imovel->addConsulta('id_produto', $value['id'] );
                  $foto_imovel->addExtras('LIMIT 1');
                  $foto_imovel->selecionarTudo();
                  $foto = $foto_imovel->retornar();
              ?>
                <div class="col-xs-4" >
                  <a href="<?= RAIZ ?>imovel/<?= $value['id']?>" class="thumbnail">
                        <img src="<?= RAIZ.$foto['arquivo'] ?>"  alt="IMOVEL DA KANANDA.IMB.BR">
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
                  }
                ?>

                <a href="<?= RAIZ ?>terrenos-urbanos" class="imovel-ver-mais btn-info btn">Ver Mais</a>
            </div>
  </div>

  <?php } ?>


  <!--TERRENO RURAL-->
  <?php
    $imovel->limparDados();
    $imovel->addConsulta('tipo_imovel', 'terreno rural');
    $imovel->addExtras('ORDER BY id DESC LIMIT 3');
    $imovel->selecionarTudo();
    if($imovel->getLinhasAfetadas()>0){
  ?>
  <div id="lista-de-imoveis">
          <h3 class="title-do-imovel">Terrenos Rurais</h3>
            <div class="row">
              <?php

                foreach ($imovel->retornarDados() as $key => $value) {
                  $foto_imovel->limparDados();
                  $foto_imovel->addConsulta('id_produto', $value['id'] );
                  $foto_imovel->addExtras('LIMIT 1');
                  $foto_imovel->selecionarTudo();
                  $foto = $foto_imovel->retornar();
              ?>
                <div class="col-xs-4" >
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
                  }
                ?>

                <a href="<?= RAIZ ?>terrenos-rurais" class="imovel-ver-mais btn-info btn">Ver Mais</a>
            </div>
  </div>

  <?php } ?>

<!-- AREAS PORTUARIAS-->
  <?php
    $imovel->limparDados();
    $imovel->addConsulta('tipo_imovel', 'areas portuaria');
    $imovel->addExtras('ORDER BY id DESC LIMIT 3');
    $imovel->selecionarTudo();
    if($imovel->getLinhasAfetadas()>0){
  ?>
  <div id="lista-de-imoveis">
          <h3 class="title-do-imovel">Áreas Portuárias</h3>
            <div class="row">
              <?php

                foreach ($imovel->retornarDados() as $key => $value) {
                  $foto_imovel->limparDados();
                  $foto_imovel->addConsulta('id_produto', $value['id'] );
                  $foto_imovel->addExtras('LIMIT 1');
                  $foto_imovel->selecionarTudo();
                  $foto = $foto_imovel->retornar();
              ?>
                <div class="col-xs-4" >
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
                  }
                ?>

                <a href="<?= RAIZ ?>areas-portuarias" class="imovel-ver-mais btn-info btn">Ver Mais</a>
            </div>
  </div>

  <?php } ?>


<!-- MAPA-->
  <div class="row">
    <div class="col-md-12">
      
        <iframe class="mapa" src="https://mapsengine.google.com/map/embed?mid=zs4x33MW_ykM.kAOGMPy5ErTM&z=16" ></iframe> 
      
    </div>
  </div>
