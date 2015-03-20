var map;
var idInfoBoxAberto;
var infoBox = [];
var markers = [];
var marcadores = [];
var visibles = [];
var visibles_bairros = [];
var latlng;


function initialize() {	

	latlng = new google.maps.LatLng(-4.267027, -55.993366);
	
    var options = {
        zoom: 24,
		center: latlng,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    
    map = new google.maps.Map(document.getElementById("mapa"), options);
}

function abrirInfoBox(id, marker) {
	if (typeof(idInfoBoxAberto) == 'string' && typeof(infoBox[idInfoBoxAberto]) == 'object') {
		infoBox[idInfoBoxAberto].close();
	}
	
	infoBox[id].open(map, marker);
	idInfoBoxAberto = id;
}

function carregarPontos(filtro) {
	
	$.getJSON('js/pontos.json', function(pontos) {
		
		var latlngbounds = new google.maps.LatLngBounds();
		
		$.each(pontos, function(index, ponto) {
			

			if(ponto.tipo_imovel == filtro || filtro == '*'){// filtra por tipo de imóvel

				if(ponto.tipo_imovel=='CASA A VENDA')
					ico = 'img/casa_venda.png'
				else if(ponto.tipo_imovel=='CASA PARA ALUGAR')
					ico = 'img/casa_aluguel.png'
				else if(ponto.tipo_imovel=='TERRENO URBANO')
					ico = 'img/terreno_urbano.png'
				else if(ponto.tipo_imovel=='TERRENO RURAL')
					ico = 'img/terreno_rural.png'
				else if(ponto.tipo_imovel=='AREAS PORTUARIA')
					ico = 'img/area_portuaria.png'
				else if(ponto.tipo_imovel=='LOTEAMENTO')
					ico = 'img/loteamento.png'

				var marcador = new google.maps.Marker({
					position: new google.maps.LatLng(ponto.latitude, ponto.longitude),
					title: "KANANDA IMOBILIÁRIA - IMÓVEL",
					icon: ico,
					tipo_imovel: ponto.tipo_imovel,
					bairro: ponto.bairro,
					animation: google.maps.Animation.DROP,
					map: map
				});
				//google.maps.Animation.BOUNCE
				marcadores.push(marcador);
				var myOptions = {
					content: "<img src='"+ponto.foto+"' class='foto_mapa'/><br/><p>Referencia: " + ponto.descricao + " - <a href='"+ponto.link+"' class='btn btn-success btn-sm' style='font-family:Arial;'>Veja</a></p>",
					pixelOffset: new google.maps.Size(-180, 0)
	        	};

				infoBox[ponto.id] = new InfoBox(myOptions);
				infoBox[ponto.id].marker = marcador;
				
				infoBox[ponto.id].listener = google.maps.event.addListener(marcador, 'click', function (e) {
					abrirInfoBox(ponto.id, marcador);
				});
				
				//markers.push(marcador);
				
				latlngbounds.extend(marcador.position);

			}else if(ponto.bairro == filtro || filtro == '*'){// filtra por bairro

				if(ponto.tipo_imovel=='CASA A VENDA')
					ico = 'img/casa_venda.png'
				else if(ponto.tipo_imovel=='CASA PARA ALUGAR')
					ico = 'img/casa_aluguel.png'
				else if(ponto.tipo_imovel=='TERRENO URBANO')
					ico = 'img/terreno_urbano.png'
				else if(ponto.tipo_imovel=='TERRENO RURAL')
					ico = 'img/terreno_rural.png'
				else if(ponto.tipo_imovel=='AREAS PORTUARIA')
					ico = 'img/area_portuaria.png'
				else if(ponto.tipo_imovel=='LOTEAMENTO')
					ico = 'img/loteamento.png'

				var marcador = new google.maps.Marker({
					position: new google.maps.LatLng(ponto.latitude, ponto.longitude),
					title: "KANANDA IMOBILIÁRIA - IMÓVEL",
					icon: ico,
					tipo_imovel: ponto.tipo_imovel,
					bairro: ponto.bairro,
					animation: google.maps.Animation.DROP,
					map: map
				});
				//google.maps.Animation.BOUNCE
				marcadores.push(marcador);
				var myOptions = {
					content: "<img src='"+ponto.foto+"' class='foto_mapa'/><br/><p>Referencia: " + ponto.descricao + " - <a href='"+ponto.link+"' class='btn btn-success btn-sm' style='font-family:Arial;'>Veja</a></p>",
					pixelOffset: new google.maps.Size(-150, 0)
	        	};

				infoBox[ponto.id] = new InfoBox(myOptions);
				infoBox[ponto.id].marker = marcador;
				
				infoBox[ponto.id].listener = google.maps.event.addListener(marcador, 'click', function (e) {
					abrirInfoBox(ponto.id, marcador);
				});
				
				//markers.push(marcador);
				
				latlngbounds.extend(marcador.position);

			}
			
		});
		
		if(marcadores.length==0){

			var marcador = new google.maps.Marker({
			      position: latlng,
			      map: map,
			      zoom:18,
			      title: 'Itaituba'
			  });
			marcadores.push(marcador);
			latlngbounds.extend(marcador.position);
			map.setZoom(14);
			apagar_marcadores();
			
		}else{	
		
			map.fitBounds(latlngbounds);
			map.setZoom(17);

		}
		//var markerCluster = new MarkerClusterer(map, markers);
		
	});

//	console.log(map.getZoom());
	
}


function carregarPonto(ponto_id) {
	
	$.getJSON('../js/pontos.json', function(pontos) {
		
		var latlngbounds = new google.maps.LatLngBounds();
		
		$.each(pontos, function(index, ponto) {
			
			
			if(ponto.id == ponto_id){// filtra por tipo de imóvel

				if(ponto.tipo_imovel=='CASA A VENDA')
					ico = '../img/casa_venda.png'
				else if(ponto.tipo_imovel=='CASA PARA ALUGAR')
					ico = '../img/casa_aluguel.png'
				else if(ponto.tipo_imovel=='TERRENO URBANO')
					ico = '../img/terreno_urbano.png'
				else if(ponto.tipo_imovel=='TERRENO RURAL')
					ico = '../img/terreno_rural.png'
				else if(ponto.tipo_imovel=='AREAS PORTUARIA')
					ico = '../img/area_portuaria.png'
				else if(ponto.tipo_imovel=='LOTEAMENTO')
					ico = '../img/loteamento.png'

				var marcador = new google.maps.Marker({
					position: new google.maps.LatLng(ponto.latitude, ponto.longitude),
					title: "KANANDA IMOBILIÁRIA - IMÓVEL",
					icon: ico,
					tipo_imovel: ponto.tipo_imovel,
					bairro: ponto.bairro,
					animation: google.maps.Animation.BOUNCE,
					map: map,
					zoom:18
				});
				
				marcadores.push(marcador);
								
				
				
				latlngbounds.extend(marcador.position);
				map.setZoom(13);
			}

	
			
		});
		
		if(marcadores.length==0){

			var marcador = new google.maps.Marker({
			      position: latlng,
			      map: map,
			      title: 'Itaituba'
			  });
			marcadores.push(marcador);
			latlngbounds.extend(marcador.position);
			map.setZoom(13);
			apagar_marcadores();
			
		}
		
		
	});

	
}

function apagar_marcadores(){

	for (var i = 0; i < marcadores.length; i++) {
	    marcadores[i].setMap(null);
	}
	marcadores = [];

}

/*function ocultar_marcadores(){

   for (var i = 0, length = marcadores.length; i < length; i++){
      	marcadores[i].setVisible(visibles.indexOf(marcadores[i].tipo_imovel) !== -1);
   }
   
}

function ocultar_bairros(){

   for (var i = 0, length = marcadores.length; i < length; i++){
      	marcadores[i].setVisible(visibles_bairros.indexOf(marcadores[i].bairro) !== -1);
   }

}*/

function aplica_filtro(obj){

  	var $this = $(obj),
  	valor = $this.attr('id');
  	visibles = [];
  	//markers = [];
  	switch(valor) {
	    case 'venda':
	        valor = ['CASA A VENDA'];
	        break;
	    case 'aluguel':
	        valor = ['CASA PARA ALUGAR'];
	        break;
	    case 'terrenos_rurais':
	        valor = ['TERRENO RURAL'];
	        break;
	    case 'terrenos_urbanos':
	        valor = ['TERRENO URBANO'];
	        break;
	    case 'areas_portuarias':
	        valor = ['AREAS PORTUARIA'];
	        break;
	    default:
	        valor = ['LOTEAMENTO'];
	} 

   apagar_marcadores();
   carregarPontos(valor);

}


function aplica_filtro_bairro(obj){

  	var $this = $(obj),
  	valor =  $this.find(":selected").val();;
  		
	visibles_bairros = [];	

   	apagar_marcadores();
   	carregarPontos(valor);

}

initialize();

