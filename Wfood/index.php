<!DOCTYPE html>
<?php
require('./_config/config.inc.php');
?>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title></title>

        <!--MOBILE--> 
        <!--<script async defer src="resources/library/jquery/mb/jquery.mobile-1.4.5.min.js"></script>-->
        <link href="resources/style/css/jquery/mb/jquery.mobile.structure-1.4.5.css" rel="stylesheet">
        <link href="resources/style/css/teste-theme.css" rel="stylesheet">

        <!--JQUERY-->
        <script async defer src="resources/library/jquery/jquery-2.1.4.min.js"></script>

        <!--MATRIZ-->
        <!--<script async defer src="_config/config.inc.js"></script>-->

        <!--TESTE-->
        <script async defer src="_app/_user/store/user.js"></script>


    </head>
    <body>
        <?php
        /*
        $new = new create;

        var_dump($new);

        echo "Uso de memoria:" . (memory_get_usage() / 100000) . " Mb<hr>";



        $Query = "SELECT COLUMN_NAME FROM information_schema.columns WHERE table_name = 'usuario' AND ORDINAL_POSITION > 1";

        //  $nCT = nameColumnTable
        $nCT = new read;
        $nCT->FullRead($Query);
        $result = $nCT->getResult();

        var_dump($result);
//        header("location: ./_app/_user/view/user/cadastro.html");

    */
        ?>
    </body>
</html>
