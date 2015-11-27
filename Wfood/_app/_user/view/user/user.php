<?php
//  CARREGANDO TABELA USUÁRIO PARA FORM
/*  QUERY NO MYSQL
 *  SELECT * FROM wfood.usuario;
  SELECT * FROM information_schema.columns WHERE table_name = 'usuario' AND ORDINAL_POSITION > 1;
  SELECT COLUMN_NAME, DATA_TYPE FROM information_schema.columns WHERE table_name = 'usuario' AND ORDINAL_POSITION > 1;
 *


  $Tabela = "usuario";
  $Query = "SELECT COLUMN_NAME, DATA_TYPE FROM information_schema.columns WHERE table_name = '{$Tabela}' AND ORDINAL_POSITION > 1";

  //  $nCT = nameColumnTable
  $nCT = new read();
  $nCT->FullRead($Query);
  $result = $nCT->getResult();

  echo($result); */
?>

<script async defer>
    $(document).ready(function () {

        cadastro();
        //consultaTab();
        
        





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
         * CADASTRO DE USUÁRIO
         *
         */

        $(this).on('submit', "form", function () {

            var form = $('form').attr("name");
            var controller = ("_app/_user/controller/" + form + "_cnt.php");

            var dados = $(this).serialize();

            var acao = $(":submit", this).attr("name");
            //alert($(this).attr("tag"));

            //alert(controller);


            $.post(
                    controller,
                    dados,
                    function (dados) {
                        //alert("" );
                        alert(dados.nome);
                    }, "json");

            //alert(dados);
        });

        function consultaTabs(){
            console.log("ok");
        }

        /**
         * 
         * CONSULTA DE TABELA
         *
         */
        function consultaTab(acao) {

            var form = $('form').attr("name");
            var controller = ("_app/_user/controller/" + form + "_cnt.php");
            var dados = $(this).serialize();

            var ac = (acao ? acao : false);
            //alert($(this).attr("tag"));

            alert(ac);

            $.post(
                    controller,
                    dados,
                    function (dados) {
                        alert(dados);
                    }, "json");
        }


    });//FIM READY
</script>

