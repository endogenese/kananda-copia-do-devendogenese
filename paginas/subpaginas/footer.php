<?php require_once('constantes.php'); ?>

<div class="row" id="rodape">
    <div class="col-xs-12" >
      <div class="row">
        <div class="col-xs-4">
            <ul>
              <li><h3>IMÓVEIS</h3></li>
              <li><a href="<?= RAIZ ?>areas-portuarias">Áreas Portuarías</a></li>
              <li><a href="<?= RAIZ ?>aluguel">Casas para Aluguar</a></li>
              <li><a href="<?= RAIZ ?>venda">Casas a Venda</a></li>
              <li><a href="<?= RAIZ ?>loteamentos">Loteamentos</a></li>
              <li><a href="<?= RAIZ ?>terrenos-urbanos">Terrenos Urbanos</a></li>
              <li><a href="<?= RAIZ ?>terrenos-rurais">Terrenos Rurais</a></li>
            </ul>
            <ul>
            <li><h3>SERVIÇOS</h3></li>
            <li><a href="<?= RAIZ ?>servicos">Conheça nossos serviços</a></li>
          </ul>
        </div>
        <div class="col-xs-4">

          <div
  class="fb-like"
  data-send="true"
  data-width="450"
  data-show-faces="true">
</div>
          <!-- <p class="text-center logos-socias"><a href="https://www.facebook.com/kanandaimobiliaria" target="_blank"><img src="<?= RAIZ ?>img/facebook-icon.png" alt=""></a>  <a href="#"target="_blank"><img src="<?= RAIZ ?>img/youtube-icon.png" alt=""></a></p>
          <p class="text-center"><div class="fb-like-box" data-href="https://www.facebook.com/KanandaNegociosImobiliarios" data-width="280" data-height="230" data-colorscheme="light" data-show-faces="true" data-header="true" data-stream="false" data-show-border="true" style="background: white;"></div></p> -->

          <p class="text-center logos-socias"><a href="https://www.facebook.com/kanandaimobiliaria" target="_blank"><img src="<?= RAIZ ?>img/facebook-icon.png" alt="Facebook da kananda imobiliaria"></a>  <a href="#"target="_blank"><img src="<?= RAIZ ?>img/youtube-icon.png" alt=""></a></p>
          <p class="text-center"><div class="fb-like-box" data-href="https://www.facebook.com/KanandaNegociosImobiliarios" data-width="280" data-height="230" data-colorscheme="light" data-show-faces="true" data-header="true" data-stream="false" data-show-border="true" style="background: white;"></div></p>

        </div>
        <div class="col-xs-4">
          <h3>CONTATOS</h3>
          <form onsubmit='return valida_form();' action="<?= RAIZ ?>contato" class="form form-horizontal" method="post"  id="contato-form" autocomplete="off" enctype="multipart/form-data">
            <div class="form-group">
              <div class="col-xs-12">
                <input type="text" obg="Nome" class="form-control" id="cNome" name="tNome" placeholder="Nome Completo">
              </div>
            </div>
            <div class="form-group">
                <div class="col-xs-12">
                  <input type="tel" obg="Telefone" class="form-control" id="cTelefone" name="tTelefone" placeholder="Telefone">
                </div>
              </div>
            <div class="form-group">
              <div class="col-xs-12">
                 <input type="tel" obg="Email" class="form-control" id="cEmail" name="tEmail" placeholder="E-mail">
              </div>
             </div>
            <div class="form-group">
                <div class="col-xs-12">
                  <textarea obg="Mensagem" class="form-control" id="cMensagem" name="tMensagem" rows="3" placeholder="Mensagem" style="margin: 0px; max-height: 80px; max-width: 285px;"></textarea>
                </div>
              </div>
              <div class="form-group">
                <div class="col-xs-offset-4 col-xs-4 ">
                  <button type="submit" name="tEnviar" id="cEnviar" class="btn btn-info">Enviar</button>
                </div>
              </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <div class="row" id="rodape-2">
    <div class="col-md-12">
      <a href="http://www.endogenese.com.br/" target="_blank"><img src="<?= RAIZ ?>img/endogenese.png" alt="Empresa Desenvolvedora Endogense Soluções" id="logo-endogenese"></a>
      <p class="text-center">© 2004-2014 - kananda.imb.br | Todos os direitos reservados <br>
                  É proibida a reprodução total ou parcial de qualquer conteúdo deste site.
         </p>
        <a href="http://www.endogenese.com.br/" target="_blank"><img src="<?= RAIZ ?>img/endogenese2.png" alt="Empresa Desenvolvedora Endogense Soluções" id="logo-endogenese-2"></a>
    </div>
  </div>
  </div><!--FIM DO CONTAINER -->

  <script type="text/javascript" src="<?= RAIZ ?>js/holder.js"></script>
  <script type="text/javascript" src="<?= RAIZ ?>js/bootstrap.min.js"></script>
  <script type="text/javascript" src="<?= RAIZ ?>js/docs.min.js"></script>
  <script src="<?= RAIZ ?>js/jquery_2.1.1.min.js"></script>
  <script src="<?= RAIZ ?>js/infobox.js"></script>
  <script src="<?= RAIZ ?>js/markerclusterer.js"></script>
  <script src="<?= RAIZ ?>js/mapa.js"></script>
  <script type="text/javascript">
    
    $(document).ready(function() {
      
      exibe_mapa = function (exibe){

        if(exibe){
          $('#cMapa').css('display', 'block');
        }else{
          $('#cMapa').css('display', 'none');
        }

      }

      $('label.active').on('click',function(e){
                alert('sd');
         var $this = $(this),
             valor = $this.val();
        
         if ($this.is(':checked')){
            visibles.push(valor);
         }
         else {
            visibles.splice(visibles.indexOf(valor), 1);
         }

         ocultar_marcadores();
      });

      valida_form = function(){

        if($('#cNome').val()==''){
          alert('Preencha o Nome!');
          return false;
        }else if($('#cTelefone').val()==''){
          alert('Preencha o Telefone!');
          return false;
        }else if($('#cEmail').val()==''){
          alert('Preencha o E-mail!');
          return false;
        }else if($('#cMensagem').val()==''){
          alert('Preencha a Mensagem!');
          return false;
        }else{
          return true;
        }

      }

      // função responsável por ocultar e revelar componentes do FILTRO de busca
      alterna_imoveis_filtro = function(){
        if ($("#selecionaImovel").val() == "AREAS PORTUARIA" || $("#selecionaImovel").val() == "LOTEAMENTO" || $("#selecionaImovel").val() == "TERRENO URBANO" || $("#selecionaImovel").val() == "TERRENO RURAL"  ){
            $(".a").css("display", "none");
            $(".o").css("display", "block");
        }
        else{
          $(".a").css("display", "block");
          $(".o").css("display", "none");
        }

    }

    // função responsável por ocultar e revelar componentes do FILTRO de busca quando a REFERÊNCIA for modificada
    alterna_referencia_filtro = function (){
      if ($("#cReferencia").val() != "" ){
        $("#filtro-detalhe select").attr("readonly", "readonly");
        $('select option').attr('disabled',true);
        $('#selecionaBairro option').attr('disabled',false);
        $("#filtro-detalhe input:not(#cReferencia)").attr("readonly", "readonly");

      }else{
        $('select option').attr('disabled',false);
        $("#filtro-detalhe select").removeAttr("readonly");
        $("#filtro-detalhe input").removeAttr("readonly");
      }

    }

    alterna_imoveis_filtro();
    alterna_referencia_filtro();

    //script que muda a visibilidade dos campos após escolha dos campos no FILTRO..
    $("#cReferencia").on("change", alterna_referencia_filtro);
    $("#selecionaImovel").on("change", alterna_imoveis_filtro );
     $(".itemPesquisa").on("click", function(){
        if(($(this).attr("readonly")) == "readonly"){
          $("#cReferencia").val('');
          alterna_referencia_filtro();
          
        }
    });


     $(".pagina_mapa").on("load", carregarPontos('*'));
     $(".mapa_individual").on("load", carregarPonto(imovel));

     // soluciona bug da exibição do mapa provocado pelo bootstrap
     setTimeout(function(){$('#mapa').removeClass('fade in active')}, 700);
     setTimeout(function(){$('#cEspecificacao').addClass('fade in active')}, 700);
        


    });


  </script>


  
  <!-- facebook -->
  <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/pt_BR/sdk.js#xfbml=1&appId=679921648729271&version=v2.0";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
  </script>
</body>
</html>