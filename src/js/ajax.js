function enviarComentario(tipoAcao)
{
	// cria uma variavel e liga com o DIV da página listaEmprestimos.php
	var resultado = document.getElementById("divComentarios");
	
	// cria um objeto para fazer requisição HTTP
	var requisicaoHTTP = new XMLHttpRequest();
	if (!requisicaoHTTP)
	{
		alert("Seu navegador não suporta AJAX");
		return false;
	}

	
	// inicia uma requisição ajax
	// 3 parametros:
	//    1º método: POST ou GET
	//    2º página que deve ser executada no servidor
	//    3º sincrona FALSE, ou assíncrona TRUE
		
	requisicaoHTTP.open("GET", "../../querys/exibirComentario.php?acao="+tipoAcao, true);
	requisicaoHTTP.send();
	
	// monitora o evento de retorno do requisicaoHTTP
	requisicaoHTTP.onreadystatechange = function()
	{
		// verifica se toda a operação de requisição e recepção da resposta foi realizada e finalizada
		if (requisicaoHTTP.readyState == 4)
		{
			// verifica se o resultado é "um HTML válido"
			if (requisicaoHTTP.status == 200)
			{
				// coloca o resultado enviado pelo servidor no divResultado
				resultado.innerHTML = requisicaoHTTP.responseText;
			}
			else
			{
				// coloca uma mensagem de erro no divResultado
				resultado.innerHTML = "Erro no AJAX";
			}
		}
	};
	
	// "apaga" o objeto requisicaoHTTP da memória
	requisicaoHTTP.send(null);
}