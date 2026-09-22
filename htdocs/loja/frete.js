$(document).ready(function(){
	function calcular() {
		var cep = $("#cep").val().replace(/\D/g, '');
		if (cep.length !== 8) {
			alert("Por favor, digite um CEP válido com 8 dígitos.");
			return;
		}
		
		$("#resultado").html("<p style='margin-top:10px;'><img src='./images/carregando.gif'> Calculando frete...</p>");
		$("#cep_endereco").val(cep);
		
		$.post("frete.php", { cep: cep }, function(resposta){
			$("#resultado").html(resposta);
		});
	}

	$("#btn_frete").click(function(){
		calcular();
	});

	$("#cep").keypress(function(e){
		if(e.which == 13) {
			e.preventDefault();
			calcular();
		}
	});
});