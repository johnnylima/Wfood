/* global GeraForm, camposForm*/

$(document).ready(function () {

    form = $('form').attr("name");
    controller = ("_app/_user/controller/" + form + "_cnt.php");

    //console.log(form);


    /*
     *  AÇÃO INICIAL
     */

    camposForm = ({
        1: 'Nome',
        2: 'Apelido',
        3: 'Email',
        4: 'Celular',
        5: 'Senha',
        6: 'CPF',
        7: 'Data de Nascimento'
    });
    GeraForm = consultaTab("l_tab", "usuario");

    cadastro();

    /**
     * 
     * GERAÇÃO FORMULÁRIO
     * 
     */
    function cadastro() {

        //CRIAR FORMULÁRIO
        var form =
                $('<div>', {
                    id: "ok",
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
                                $.map(dados.reverse(), function (v, i) {
                                    //camposForm.push("COLUMN_NAME" : v.COLUMN_NAME);
                                    //console.log(i + ": " + v.COLUMN_NAME + " (" + v.DATA_TYPE + ")");
                                    //$("#ok").append(document.createTextNode(v.COLUMN_NAME+'\t'));
                                    if (i == camposForm{){
                                        console.log(i);
                                    };
                                    $("form").prepend(
                                            $('<div>', {
                                                class: "ui-field-contain",
                                                /*###################### < DIV > /*######################*/
                                                append: $('<div>', {
                                                    class: "ui-input-text ui-body-a ui-corner-all ui-shadow-inset",
                                                    /*###################### < INPUT > /*######################*/
                                                    append: $('<input>', {
                                                        type: "text",
                                                        name: v.COLUMN_NAME,
                                                        id: v.COLUMN_NAME,
                                                        'data-theme': "a",
                                                        'data-form': "ui-body-a",
                                                        class: "input",
                                                        placeholder: v.COLUMN_NAME
                                                    })
                                                })

                                            })
                                            );

                                });
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

