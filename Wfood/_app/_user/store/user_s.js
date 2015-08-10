$(document).ready(function () {

    form = $('form');
    cnt = ("_app/_user/controller/"+ form.attr("name") +"_cnt.php");
    
    
    /**
     * 
     * CADASTRO DE USUÁRIO
     *
     */
    
    form.submit(function () {
 
        var dados = $(this).serialize();
        var acao = (":submit",this).attr("name");
        
        $.post(cnt, dados, function (dados) {
            alert(dados.nome+" ok!");
        }, "json");
        
        //alert(dados);
        
    });
});

