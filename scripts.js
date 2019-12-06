function pad(num, size) {
    var s = num+"";
    while (s.length < size) s = "0" + s;
    return s;
}

jQuery(document).ready(function($) {

	$("body").on('keydown', function(e) {
		var senhaAtual   = $("#senhaAtualNumero");
		var senhaNormal  = $("#senhaNormal");
		var audioChamada = $("#audioChamada");

        if(e.keyCode == 39){ //seta a direita
        	ultimaSenha.html(senhaAtual.html());
            senha = parseInt(senhaNormal.val()) + 4;
            senhaAtual.html(pad(senha, 4));
            senhaNormal.val(pad(senha, 4));
            audioChamada.trigger("play");
        }
        if(e.keyCode == 65){ //tecla a
            senha = parseInt(senhaNormal.val()) - 1;
            senhaAtual.html(pad(senha, 4));
            senhaNormal.val(pad(senha, 4));
        }
    });
});