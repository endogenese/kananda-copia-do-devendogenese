
        <!-- Topo leitura -->

		<div id="topo-leitura">

		    <div class="titulo"><?= (isset($pagina_admin[0])) ? strtoupper($pagina_admin[0]) : '' ?></div>

		    <div class="subtitulo"><?= (isset($pagina_admin[1])) ? strtoupper($pagina_admin[1]) : '' ?></div>

		</div>

        <!-- Fim; Topo leitura -->



        <!-- Leitura -->
        <div id="leitura">

			<?php
			
				$url = ($pagina_admin[0].(isset($pagina_admin[1])?'/'.$pagina_admin[1]:''));

				if(isset($pagina_admin[0])){
					
					if(file_exists("paginas/".$pagina_admin[0].".php")){

						require "paginas/".$pagina_admin[0].".php";				

					}else{


						echo 'Página não Encontrada';


					}



				}



			?>

        </div>
        <!-- Fim; Leitura -->