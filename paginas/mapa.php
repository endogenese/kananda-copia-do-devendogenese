
	<link rel="stylesheet" href="<?= RAIZ ?>/css/mapa.css">
	<!--CONTATO-->
	<div class="row">
		<div class="col-xs-12">
			<div id="mapa" class='pagina_mapa'style="height: 600px; width: 960px">
				<!-- <img data-src="holder.js/960x600" alt=""> -->
				<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyCg1ogHawJGuDbw7nd6qBz9yYxYPoGTWQo&sensor=false"></script>
			</div>
			<!--filtro mapa-->
			<div class="row" id="filtro-mapa">
				<div class="col-xs-12">
					<form action="" role="form">
						<div class="form-group col-xs-12" id="form-1">
							<div class="btn-group" data-toggle="buttons">
							    <label for="cVenda" class="btn btn-primary" id='venda' onClick='aplica_filtro(this);'>
							      <input type="radio" name="tVenda" id="cVenda" value="aVenda"> A Venda
							    </label>
							    <label label="cAluguel" class="btn btn-primary" id='aluguel' onClick='aplica_filtro(this);'>
							      <input type="radio" name="tAluguel" id="cAluguel" value="aAluguel"> Aluguel
							    </label>
							    <label label="cTerrenosUrbanos" class="btn btn-primary" id='terrenos_urbanos' onClick='aplica_filtro(this);'>
							      <input type="radio" name="tTerrenosUrbanos" id="cTerrenosUrbanos" value="aTerrenosUrbanos"> Terrenos Urbanos
							    </label>
							    <label label="cTerrenosRuarais" class="btn btn-primary" id='terrenos_rurais' onClick='aplica_filtro(this);'>
							      <input type="radio" name="tTerrenosRuarais" id="cTerrenosRuarais" value="aTerrenosRuarais" class="btn btn-primary"> Terrenos Ruarais
							    </label>
							    <label label="cLoteamento" class="btn btn-primary" id='areas_portuarias' onClick='aplica_filtro(this);'>
							      <input type="radio" name="tAreaPortuaria" id="cAreaPortuaria" value="aAreaPortuaria"> Áreas Portuárias
							    </label><label label="cLoteamento" class="btn btn-primary" id='loteamento' onClick='aplica_filtro(this);'>
							      <input type="radio" name="tLoteamento" id="cLoteamento" value="aLoteamento"> Loteamentos
							    </label>
							</div>
						</div>
						<div class="form-group col-xs-12" id="form-2">
							<label for="cBairro" class="col-xs-1 col-xs-offset-2 control-label">Bairro:</label>
							<div class="col-xs-5">
								<select name="select" id="selecionaBairro" class="form-control" onChange='aplica_filtro_bairro(this);'>
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
							
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
