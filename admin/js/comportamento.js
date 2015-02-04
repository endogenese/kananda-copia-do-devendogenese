
//Função para ajustar o tamanho da tela
function ajustaTamanhoDocumento(){

	jQuery('#leitura').height(jQuery('#conteudo-geral').height() - 113);
	jQuery('#sidebar').height(jQuery('#conteudo-geral').height() - 112);


}

//Evento para o reajuste de tamanho da tela do navegador
jQuery(window).resize(function(){

	ajustaTamanhoDocumento();

});

$(document).ready(function(){

	setInterval(function (){
	ajustaTamanhoDocumento();
	},100);
});