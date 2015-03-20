<?php 
  require_once('constantes.php'); 
  require_once(RAIZSIMPLES.'classes/Objeto.class.php');  

  $config = new Objeto('empresa');
  $config->selecionarTudo();
  $config = $config->retornar();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title><?= $config['titulo_site']?></title>
  <link rel="icon" type="image/png" href="<?= RAIZ ?>img/icone-kananda.png" />
  <link rel="stylesheet" href="<?= RAIZ ?>css/bootstrap/bootstrap.min.css">
  <link rel="stylesheet" href="<?= RAIZ ?>css/templete.css">
  <link rel="stylesheet" href="<?= RAIZ ?>css/mapa-google.css">
  <script type="text/javascript" src="<?= RAIZ ?>js/jquery-1.11.0.js"></script>
</head>
<body>
<div id="fb-root"></div>
<script>(function(d, s, id) {
var js, fjs = d.getElementsByTagName(s)[0];
if (d.getElementById(id)) return;
js = d.createElement(s); js.id = id;
js.src = "//connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v2.0";
fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

  <div class="container" id="interface">
  <div class="row">
    <div class="col-xs-12" id="cabecalho">
      <div class="logo-imagem">
        <img src="<?= RAIZ.$config['logotipo'] ?>" alt="">
      </div>
      <span class="e-mail-kananda">
        <?php
          $config = new Objeto('empresa');
          $config->addExtras('LIMIT 1');
          $config->selecionarTudo();
          $config = $config->retornar();
          echo $config['email'];
        ?>
      </span>
      <img src="<?= RAIZ ?>img/header.png" style="display: block;margin-left: -5px;">
      <ul class="nav nav-pills" id="menu-head">
        <li style="margin-left: 10px;"><a href="<?= RAIZ ?>">Home</a></li>
        <li><a>Imóvel</a>
          <ul class="nav nav-pills">
            <li><a href="<?= RAIZ ?>areas-portuarias">Áreas Portuárias</a></li>
            <li class="submenu-2"><a>Casas</a>
            <ul class="nav nav-pills">
              <li><a href="<?= RAIZ ?>aluguel">Aluguel</a></li>
              <li><a href="<?= RAIZ ?>venda">A Venda</a></li>
            </ul>
            </li>
            <li><a href="<?= RAIZ ?>loteamentos">Loteamentos</a></li>
            <li><a href="<?= RAIZ ?>terrenos-urbanos">Terrenos Urbanos</a></li>
            <li><a href="<?= RAIZ ?>terrenos-rurais">Terrenos Rurais</a></li>
          </ul>
        </li>
        <li><a href="<?= RAIZ ?>servicos">Serviços</a></li>
        <li><a href="<?= RAIZ ?>galeria">Galeria</a></li>
        <li><a href="<?= RAIZ ?>mapa">Mapa</a></li>
        <li><a href="<?= RAIZ ?>sobre">Sobre</a></li>
      </ul>
    </div>
  </div>

