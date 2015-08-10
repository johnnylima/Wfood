$(document).ready(function () {
    
    
    $("body").html("<h1>Olá Mundo!</h1>");

    sub = $('form');
    acao = "teste.php";

    sub.submit(function () {
 
        var dados = $(this).serialize();
        
        alert ($(":submit",this).attr("name"));
        
        $.post(acao, dados, function (dados) {
            alert(dados.nome+" ok!");
        }, "json");
        
        //alert(dados);
        
    });
});