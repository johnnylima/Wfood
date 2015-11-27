/* global GeraForm */

$(document).ready(function () {

    form = $('form').attr("name");
    controller = ("_app/_user/controller/" + form + "_cnt.php");

    //console.log(form);


    /*
     *  AÇÃO INICIAL
     */

    //camposForm = new Array();
    GeraForm = consultaTab("l_tab", "usuario");

    /*
     if (GeraForm) {
     GeraForm.done(
     function(dados){
     console.log(dados[0].COLUMN_NAME);
     });
     }//*/


    cadastro();


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
                            GeraForm.done(function (dados) {
                                $.each(dados, function (key, value) {
                                    $('<div>', {
                                        text: "ddada",
                                    });
                                    console.log(value.COLUMN_NAME);





                                    /*###################### < DIV CONTAIN > /*######################//*/
                                    $('<div>', {
                                        class: "ui-field-contain",
                                        /*###################### < DIV > /*######################//*/
                                        append: $('<div>', {
                                            class: "ui-input-text ui-body-a ui-corner-all ui-shadow-inset",
                                            /*###################### < INPUT > /*######################//*/
                                            append: $('<input>', {
                                                type: "text",
                                                name: value.COLUMN_NAME,
                                                id: value.COLUMN_NAME,
                                                'data-theme': "a",
                                                'data-form': "ui-body-a",
                                                class: "input",
                                                placeholder: value.COLUMN_NAME
                                            })
                                        })

                                    });
                                });
                            }),
                            $('<div>', {
                                text: "d"
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
                            })]//*/
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

        //console.log(dados);

        return $.ajax({
            type: "POST",
            url: controller,
            data: dados,
            //success: function(dados){console.log(dados[0]);},
            dataType: "json"
        });
    }

    function ok() {
        console.log("ok");
    }

});

