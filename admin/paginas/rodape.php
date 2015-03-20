

 		</div> <!-- #conteudo-geral -->	
		
		
		<!--<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>-->
		<script type="text/javascript" src="<?= RAIZ ?>js/jquery_2.1.1.min.js"></script>
 		<script type="text/javascript" src="<?= RAIZ ?>admin/js/comportamento.js"></script>
 		<script type="text/javascript" src="<?= RAIZ ?>/js/ui/ui/jquery-ui-1.8.16.custom.js"></script>
		<script type="text/javascript" src="<?= RAIZ ?>/js/ui/ui/jquery.ui.touch-punch.js"></script>
		<script type="text/javascript" src="<?= RAIZ ?>/js/ui/ui/jquery-ui-timepicker.js"></script>
 		<script type="text/javascript" src="<?= RAIZ ?>js/maskedinput.js"type="text/javascript"></script>
 		<script type="text/javascript" src="<?= RAIZ ?>js/priceinput.js"type="text/javascript"></script>
		<script type="text/javascript" src="<?= RAIZ ?>js/Funcoes.js"type="text/javascript"></script>
		<!-- MAPA -->
		<script type="text/javascript" src="<?= RAIZ ?>js/infobox.js"></script>
        <script type="text/javascript" src="<?= RAIZ ?>js/markerclusterer.js"></script>
        <script type="text/javascript" src="<?= RAIZ ?>js/mapa_admin.js"></script>

		<script type="text/javascript">
		$(document).ready(function() {

			$(".area").mask("9?99999.99 m²");

			$(".metros_medida").mask("999.99 metros");


			//quantidade de fotos na página de eventos
		    var i = $('div.foto').filter(function(idx){
		        return $(this);
		    }).length;
			i++;
			
			add_foto = function ()
			  {
			    
			      
			      var fotos = document.getElementsByClassName('foto');
			      
			      if(fotos.length > 0){
				      conteiner = document.querySelector("#fotos");
				      div = document.createElement('div');
				      div.setAttribute('class', 'foto');
				      div.setAttribute('id', 'foto'+i);
				      label = document.createElement('label');			      
				      label.appendChild(document.createTextNode('Foto'));
				      input = document.createElement('input');
				      input.setAttribute('name','foto'+i);
				      input.setAttribute('class','foto-slide');
				      input.setAttribute('type','file');
				      input.setAttribute('onchange','readURL(this);');
					  img = document.createElement('img');
				      img.setAttribute('id','preview'+i);
				      img.setAttribute('src','#');
				      img.setAttribute('class','preview_foto');
				      br1 = document.createElement('br');			      
				      label2 = document.createElement('label');			      
				      label2.appendChild(document.createTextNode('Descrição da Foto'));
				      br2 = document.createElement('br');
				      textarea = document.createElement('textarea');
				      
				      textarea.setAttribute('name','descricao_foto'+i);
				      textarea.setAttribute('class','descrissao-slide');
				      a = document.createElement('a');
				      a.setAttribute('id','slide-remover');
				      a.setAttribute('class','btn-danger novo-slide');
				      a.setAttribute('href','#');
				      a.setAttribute('onclick','remover_foto(this);');
				      a.appendChild(document.createTextNode('Remover'));
				      div.appendChild(label);
				      div.appendChild(input);
				      div.appendChild(img);
				      div.appendChild(br1);
				      div.appendChild(label2);
				      div.appendChild(br2);
				      div.appendChild(textarea);
				      div.appendChild(a);
				      conteiner.insertBefore(div, conteiner.firstChild);

			  		}else{

			  			fotos = document.getElementById("fotos");
			      		fotos.innerHTML=fotos.innerHTML+"<div class='foto' id='foto"+i+"'><label>Foto</label><input class='foto-slide' name='foto"+i+"' type='file' onchange='readURL(this);' /><img id='preview"+i+"' scr='#' class='preview_foto'/><br><label>Descrição da Foto</label><br><textarea  name='descricao_foto"+i+"' class='descrissao-slide'></textarea><a id='slide-remover' class='btn-danger novo-slide' href='#' onclick='remover_foto(this);''>Remover</a></div>";

			  		}

			      	qtd_fotos = document.getElementById("qtd_fotos");
			      	qtd_fotos.value = i;
			     	i++;

			}

			add_slide = function ()
			  {
			    
			      var fotos = document.getElementsByClassName('foto');
			      
			      if(fotos.length > 0){

				      conteiner = document.querySelector("#fotos");
				      div = document.createElement('div');
				      div.setAttribute('class', 'foto foto-xxx');
				      div.setAttribute('id', 'foto'+i);
				      label = document.createElement('label');			      
				      label.appendChild(document.createTextNode('Foto: '));
				      input = document.createElement('input');
				      input.setAttribute('name','foto'+i);
				      input.setAttribute('type','file');
				      input.setAttribute('onchange','readURL(this);');
				      img = document.createElement('img');
				      img.setAttribute('id','preview'+i);
				      img.setAttribute('src','#');
				      img.setAttribute('class','preview_foto');
				      br1 = document.createElement('br');
				      a = document.createElement('a');
				      a.setAttribute('class','btn-danger novo-slide');
				      a.setAttribute('href','#');
				      a.setAttribute('onclick','remover_foto(this);');
				      a.appendChild(document.createTextNode('Remover'));
				      div.appendChild(label);
				      div.appendChild(input);
				      div.appendChild(img);
				      div.appendChild(br1);
				      div.appendChild(a);
				      conteiner.insertBefore(div, conteiner.firstChild);

					}else{

						fotos = document.getElementById("fotos");
			      		fotos.innerHTML=fotos.innerHTML+"<div class='foto foto_destaque foto-xxx' id='foto"+i+"'><label>Foto</label><input name='foto"+i+"' type='file' onchange='readURL(this);' /><img id='preview"+i+"' scr='#' class='preview_foto'/><br><a class='btn-danger novo-slide' href='#' onclick='remover_foto(this);''>Remover</a></div>";
					}

			      	qtd_fotos = document.getElementById("qtd_fotos");
			      	qtd_fotos.value = i;
			      	i++;

			}

			add_slideshow = function ()
			  {
			    
			      var fotos = document.getElementsByClassName('foto');
			      
			      if(fotos.length > 0){

				      conteiner = document.querySelector("#fotos");
				      div = document.createElement('div');
				      div.setAttribute('class', 'foto');
				      div.setAttribute('id', 'foto'+i);
				      label = document.createElement('label');			      
				      label.appendChild(document.createTextNode('Foto'));
				      input = document.createElement('input');
				      input.setAttribute('name','foto'+i);
				      input.setAttribute('type','file');
				      input.setAttribute('onchange','readURL(this);');
				      img = document.createElement('img');
				      img.setAttribute('id','preview'+i);
				      img.setAttribute('src','#');
				      img.setAttribute('class','preview_foto');
				      titulo  = document.createElement('input');
				      titulo.setAttribute('type', 'text');
				      titulo.setAttribute('name', 'foto'+i);
				      titulo.setAttribute('class', 'slide-title');
				      textarea = document.createElement('textarea');
				      textarea.setAttribute('name','descricao'+i);
				      textarea.setAttribute('class','descrissao-slide');
				      a = document.createElement('a');
				      a.setAttribute('href','#');
				      a.setAttribute('class','btn-danger novo-slide');
				      a.setAttribute('id','slide-remover');
				      a.setAttribute('onclick','remover_foto(this);');
				      a.appendChild(document.createTextNode('Remover'));
				      div.appendChild(label);
				      div.appendChild(input);
				      div.appendChild(img);
				      div.appendChild(titulo);
				      div.appendChild(textarea);
				      div.appendChild(a);
				      conteiner.insertBefore(div, conteiner.firstChild);

					}else{

						//fotos = document.getElementById("fotos");
			      		//fotos.innerHTML=fotos.innerHTML+"<div class='foto foto_destaque' id='foto"+i+"'><label>Foto</label><input name='foto"+i+"' type='file' onchange='readURL(this);' /><img id='preview"+i+"' scr='#' class='preview_foto'/><a href='#' onclick='remover_foto(this);''>Remover</a></div>";

			      	  conteiner = document.querySelector("#fotos");
				      div = document.createElement('div');
				      div.setAttribute('class', 'foto foto_destaque');
				      div.setAttribute('id', 'foto'+i);
				      label = document.createElement('label');			      
				      label.appendChild(document.createTextNode('Foto'));
				      input = document.createElement('input');
				      input.setAttribute('name','foto'+i);
				      input.setAttribute('type','file');
				      input.setAttribute('onchange','readURL(this);');
				      img = document.createElement('img');
				      img.setAttribute('id','preview'+i);
				      img.setAttribute('src','#');
				      img.setAttribute('class','preview_foto');
				      titulo  = document.createElement('input');
				      titulo.setAttribute('type', 'text');
				      titulo.setAttribute('name', 'foto'+i);
				      titulo.setAttribute('class', 'slide-title');
				      textarea = document.createElement('textarea');
				      textarea.setAttribute('name','descricao'+i);
				      textarea.setAttribute('class','descrissao-slide');
				      a = document.createElement('a');
				      a.setAttribute('href','#');
				      a.setAttribute('class','btn-danger novo-slide');
				      a.setAttribute('id','slide-remover');
				      a.setAttribute('onclick','remover_foto(this);');
				      a.appendChild(document.createTextNode('Remover'));
				      div.appendChild(label);
				      div.appendChild(input);
				      div.appendChild(img);
				      div.appendChild(titulo);
				      div.appendChild(textarea);
				      div.appendChild(a);
				      conteiner.insertBefore(div, conteiner.firstChild);
					}

			      	qtd_fotos = document.getElementById("qtd_fotos");
			      	qtd_fotos.value = i;
			      	i++;

			}

			remover_foto = function(obj){

				    var foto = $(obj).parents('.foto').attr('id');
				    $('#'+foto).remove();
				
			}

			readURL = function (input) {

		        if (input.files && input.files[0]) {
		            var reader = new FileReader();
		        	var j = input.name.replace('foto','');
		        	
		            reader.onload = function (e) {
		                  $('#preview'+j).attr('src', e.target.result);
		            }
		            
		            reader.readAsDataURL(input.files[0]);            
		        }
		    }
		});
		</script>

	</body>
</html>