<?php  require_once 'constantes.php'; ?>

		<div class="row" id="filtro-detalhe">
				<div class="col-xs-12" style="padding-top: 8px;">			
				<form action="<?= RAIZ.'pesquisa' ?>" method='POST' role="form" class="form">
					  
					  <div class="form-group col-xs-4">
					      <label for="selecionaImovel">Imóvel: </label>
					      <select name="selecionaImovel" id="selecionaImovel" class="form-control itemPesquisa">
					      	  <option value="CASA A VENDA">Casas a Venda</option>
			                  <option value="CASA PARA ALUGAR">Casas para Aluguar</option>
			            	  <option value="AREAS PORTUARIA">Áreas Portuárias</option>
			                  <option value="LOTEAMENTO">Loteamentos</option>
			                  <option value="TERRENO URBANO">Terrenos Urbanos</option>
			                  <option value="TERRENO RURAL">Terrenos Rurais</option>
		                  </select>
					    </div>
					   <div class="form-group col-xs-4 o"> <!-- INCLUIR O CAMPO QUE COMEÇA OCULTO, COM A CLASSE "o"-->
					    	<label for="area">Área </label>
                 		 	<input type="text" class="form-control itemPesquisa" id="area" name="area">
					  </div>
					    <div class="form-group col-xs-4 a"> <!-- INCLUIR A CLASSE "a", que força o tipo block-->
					    <label for="selecionaQntQuarto">Quarto: </label>
					      <select name="selecionaQntQuarto" id="selecionaQntQuarto" class="itemPesquisa form-control">
		                    <option value="1">1</option>
		                    <option value="2">2</option>
		                    <option value="3">3</option>
		                    <option value="4">4</option>
		                    <option value="5">5</option>
		                    <option value="+">mais de 5</option>
		                  </select>
					  </div>
					  <div class="form-group col-xs-4 o"> <!-- INCLUIR O CAMPO QUE COMEÇA OCULTO, COM A CLASSE "o"-->
					    	<label for="comprimento">Comprimento </label> 
                 		 	<input type="text" class="form-control itemPesquisa" id="comprimento" name="comprimento">
					  </div>
					  <div class="form-group col-xs-4 a"> <!-- INCLUIR A CLASSE "a", que força o tipo block-->
					    <label for="selecionaQntSuites">Suite: </label>
					    <select name="selecionaQntSuites" id="selecionaQntSuites" class="itemPesquisa form-control">
					    		<option value="0">0</option>
					            <option value="1">1</option>
					            <option value="2">2</option>
					            <option value="3">3</option>
					            <option value="4">4</option>
					            <option value="5">5</option>
					            <option value="+">mais de 5</option>
					    </select>
					  </div>
					  <div class="form-group col-xs-4 o"> <!-- INCLUIR O CAMPO QUE COMEÇA OCULTO, COM A CLASSE "o"-->
					    	<label for="largura">Largura </label>
                 		 	<input type="text" class="form-control itemPesquisa" id="largura" name="largura">
					  </div>
					  <div class="form-group col-xs-4 a"> <!-- INCLUIR A CLASSE "a", que força o tipo block-->
					    <label for="selecionaqntGaragem">Garagem: </label>
					    <select name="selecionaqntGaragem" id="selecionaqntGaragem" class="itemPesquisa form-control">
		                    <option value="0">0</option>
		                    <option selected value="1">1</option>
		                    <option value="2">2</option>
		                    <option value="3">3</option>
		                    <option value="4">4</option>
		                    <option value="5">5</option>
		                    <option value="+">mais de 5</option>
		                </select>
					  </div>
					  <div class="form-group col-xs-4">
					    <label for="selecionaBairro">Bairro: </label>
					    <select name="selecionaBairro" id="selecionaBairro" class="itemPesquisa form-control">
		                    	<option value="qualquer" selected>Qualquer Bairro</option>
		                    	<option value="BELA VISTA">Bela Vista</option>
			                    <option value="BOA ESPERANÇA">Boa Esperança</option>
			                    <option value="BOM JARDIM">Bom Jardim</option>
			                    <option value="BOM REMÉDIO">Bom Remédio</option>
			                    <option value="CENTRO">Centro</option>
			                    <option value="FLORESTA">Floresta</option>
			                    <option value="JARDIM AEROPORTO">Jardim Aeroporto</option>
			                    <option value="JARDIM AMÉRICA">Jardim América</option>
			                    <option value="JARDIM DAS ARARAS">Jardim das Araras</option>
			                    <option value="JARDIM TAPAJÓS'">Jardim Tapajós</option>
			                    <option value="LIBERDADE">Liberdade</option>
			                    <option value="MARIA MADALENA">Maria Madalena</option>
			                    <option value="NOVA ITAITUBA">Nova Itaituba</option>
			                    <option value="NOVO PARAÍSO">Novo Paraíso</option>
			                    <option value="PERPÉTUO SOCORRO">Perpétuo Socorro</option>
			                    <option value="PIRACANÃ">Piracanã</option>
			                    <option value="RESIDENCIAL VALE DO PIRACANÃ">Residencial Vale do Piracanã</option>
			                    <option value="RESIDENCIAL VIVA ITAITUBA">Residencial Viva Itaituba</option>
			                    <option value="RESIDENCIAL WIRLAND FREIRE">Residencial Wirland Freire</option>	
			                    <option value="SANTO ANTÔNIO">Santo Antônio</option>	
			                    <option value="SÃO FRANCISCO">São Francisco</option>	
			                    <option value="SÃO JOSÉ">São José</option>	
			                    <option value="VALE DO TAPAJÓS">Vale do Tapajós</option>	
			                    <option value="VALMIRLÂNDIA">Valmirlândia</option>	
			                    <option value="VITÓRIA-RÉGIA">Vitória-Régia</option>
		                </select>
					  </div>
					  <div class="form-group col-xs-2">
					    	<label for="cReferencia">Referência: </label>
                 		 	<input type="text" class="form-control" id="cReferencia" name="cReferencia">
					  </div>
					<div class="form-group col-xs-1">
						<button type="submit" name="tBuscar" id="cBuscar" class="btn btn-info">Buscar</button>
					</div>
				</form>

				</div>
			</div><!--FILTRO-->

