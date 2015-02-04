<?php 
  require("paginas/subpaginas/constantes.php");
  require('classes/Incluir.php');

  $pagina = Funcao::capturarUrlAmigavel();
  if((string)$pagina[0] !== ""){
    
    if(file_exists("paginas/".$pagina[0].".php")){
      $inicio = false;
      $notfound = false;
    }else{
      if($pagina[0]=='galeria' || $pagina[0]=='imovel'){
        $inicio = false;
        $notfound = false;
      }else{
        $inicio = false;
        $notfound = true;
      }
    }
  }else{
    $inicio = true;
  }

  require(RAIZ."paginas/subpaginas/header.php");

  if($inicio){
    include (RAIZSIMPLES."paginas/home.php");
  }else{
    if($notfound){
      include (RAIZSIMPLES."paginas/subpaginas/notfound.php");
    } else {
      if($pagina[0]=='galeria')
        include(RAIZSIMPLES."paginas/galeria/index.php");
      elseif($pagina[0]=='imovel')
        include(RAIZSIMPLES."paginas/imovel/index.php");
      else
        include(RAIZSIMPLES."paginas/".$pagina[0].".php");
    }
  }
  require RAIZ."paginas/subpaginas/footer.php" 

?>