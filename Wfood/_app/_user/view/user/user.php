<script async defer>
    $(document).ready(function () {

        cadastro();

        function cadastro() {

            //CRIAR FORMULÁRIO
            var form =
                    $('<div>', {
                        style: "width: 500px;",
                        class: "ui-body ui-body-a ui-corner-all",
                        text: "Brasil"
                    })
                    .attr({
                        "data-form": "ui-body-a"
                    })
                    .append($('<form>', {
                        method: "POST",
                        name: "cadastro"
                    }));
            //#CRIAR FORMULÁRIO

            $("body").append(form);

        }
    });
</script>