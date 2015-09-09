$(document).ready(function () {

    form = $('form').attr("name");
    controller = ("_app/_user/controller/" + form + "_cnt.php");

    //console.log(form);


    /*
     *  AÇÃO INICIAL
     */

    camposForm = new Array();
    if (consultaTab("l_tab", "usuario")){
        console.log("ois");
    }
    
    
    //cadastro();


    /**
     * 
     * CADASTRO DE USUÁRIO
     *
     */

    /*
     form.submit(function () {
     
     var dados = $(this).serialize();
     //var acao = (":submit", this).attr("name");
     $.post(
     controller,
     dados,
     function (dados) {
     console.log(dados.nome + " ok!");
     }, "json");
     
     return false;
     
     });//*/

    /**
     * 
     * GERAÇÃO FORMULÁRIO
     * 
     */
    function cadastro() {

        //CRIAR FORMULÁRIO
        var form =
                $('<div>', {
                    style: "width: 500px;",
                    class: "ui-body ui-body-a ui-corner-all",
                    'data-form': "ui-body-a",
                    //text: "Brasil",
                    /*###################### < FORM > /*######################*/
                    append: $('<form>', {
                        method: "POST",
                        name: "user",
                        append: [
                            /*###################### < DIV CONTAIN > /*######################*/
                            $('<div>', {
                                class: "ui-field-contain",
                                /*###################### < DIV > /*######################*/
                                append: $('<div>', {
                                    class: "ui-input-text ui-body-a ui-corner-all ui-shadow-inset",
                                    /*###################### < INPUT > /*######################*/
                                    append: $('<input>', {
                                        type: "text",
                                        name: "nome",
                                        id: "nome",
                                        'data-theme': "a",
                                        'data-form': "ui-body-a",
                                        class: "input",
                                        placeholder: "Nome"
                                    })
                                })

                            }),
                            /*###################### < DIV CONTAIN > /*######################*/
                            $('<div>', {
                                class: "ui-field-contain",
                                /*###################### < INPUT > /*######################*/
                                append: $('<button>', {
                                    type: "submit",
                                    name: "create",
                                    class: "ui-shadow ui-btn ui-corner-all ui-btn-a",
                                    text: "Enviar"
                                })
                            })]
                    })
                });
        //#CRIAR FORMULÁRIO

        $("body").append(form);
    }




    /**
     * 
     * CONSULTA DE TABELA
     *
     */
    function consultaTab(acao, tabela) {

        var form = ($('form').attr("name") ? $('form').attr("name") : "user");
        var controller = ("_app/_user/controller/" + form + "_cnt.php");
        var dados = $('form').serialize();

        var ac = (acao ? "acao=" + acao + "&" : false);
        var tb = (tabela ? "tabela=" + tabela + "&" : '');
        //alert($(this).attr("tag"));

        dados = ac + tb + dados;

        //console.log(form);

        return $.post(
                controller,
                dados,
                function (dados) {
                    console.log(dados[0].COLUMN_NAME);
                }, "json");
    }

    function ok() {
        console.log("ok");
    }

});

