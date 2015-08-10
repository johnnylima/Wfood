<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title></title>
        <script src="mobile/jquery.mobile-1.4.5.min.js"></script>
        <link href="mobile/jquery.mobile.structure-1.4.5.css" rel="stylesheet">
        <link href="mobile/teste-theme.css" rel="stylesheet">
        
        <script async defer src="jquery-2.1.4.min.js"></script>
        <script async defer src="teste.js"></script>

    </head>
    <body>

        <div style="width: 500px;" class="ui-body ui-body-a ui-corner-all" data-form="ui-body-a" >
            <form method="POST" name="user">
                <div class="ui-field-contain">
                    <div class="ui-input-text ui-body-a ui-corner-all ui-shadow-inset">
                        <input type="text" name="nome" id="nome" data-theme="a" data-form="ui-body-a" class="input" placeholder="Nome"></div>
                </div>
                <div class="ui-field-contain">
                    <div class="ui-input-text ui-body-inherit ui-corner-all ui-shadow-inset">
                        <input type="text" name="apelido" id="apelido" placeholder="Apelido"></div>
                </div>
                <div class="ui-field-contain">
                    <div class="ui-input-text ui-body-inherit ui-corner-all ui-shadow-inset">
                        <input type="text" name="email" id="email" placeholder="Email"></div>
                </div>
                <div class="ui-field-contain">
                    <div class="ui-input-text ui-body-inherit ui-corner-all ui-shadow-inset">
                        <input type="text" name="celular" id="celular" placeholder="Celular"</div>
                </div>
                <div class="ui-field-contain">
                    <div class="ui-input-text ui-body-inherit ui-corner-all ui-shadow-inset">
                        <input type="text" name="senha" id="senha" placeholder="Senha"></div>
                </div>
                <div class="ui-field-contain">
                    <div class="ui-input-text ui-body-inherit ui-corner-all ui-shadow-inset">
                        <input type="text" name="cpf" id="cpf" placeholder="Cpf"></div>
                </div>
                <div class="ui-field-contain">
                    <label for="nascimento">Nascimento:</label>
                    <div class="ui-input-text ui-body-inherit ui-corner-all ui-shadow-inset">
                        <input type="date" name="nascimento" id="nascimento"></div>
                </div>

                <div class="ui-field-contain">
                        <button type="submit" name="create" class="ui-shadow ui-btn ui-corner-all ui-btn-a ">Enviar</button>
                </div>


            </form>
        </div>

    </body>
</html>
