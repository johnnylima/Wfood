<!DOCTYPE html>
<?php
//require('./_config/config.inc.php');
//require('teste.class.php');
?>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        echo "Uso de memoria:" . (memory_get_usage() / 100000) . " Mb<hr>";

        $root = str_replace("/", DIRECTORY_SEPARATOR, dirname($_SERVER['SCRIPT_FILENAME']));
        $ClassExtension = ("teste.class.php");

        $directories = array();
        $root = (isset($root) ? $root : '.'); // Coloque o caminho raiz!
        $root = ($root[strlen($root) - 1] == '\\' || $root[strlen($root) - 1] == '/') ? $root : $root . DIRECTORY_SEPARATOR;


        $car = "*";
        $glob = glob($car, GLOB_MARK);
        while (!empty($glob)):
            if (!empty($v = glob(substr_replace($car, "", -1).$ClassExtension))):
                var_dump($v);
            endif;
            
            $car = $car . "\*";
            $glob = glob($car, GLOB_MARK);


        endwhile;
        
        
        die;
        if (!empty($glob)):
            var_dump($glob);
        endif;
        die;
        while (""):

        endwhile;


        $isd = (glob("*\*\*\*" . $ClassExtension, GLOB_MARK));

        var_dump($isd);




        echo "Uso de memoria:" . (memory_get_usage() / 100000) . " Mb<hr>";

        die;


        echo "Uso de memoria:" . (memory_get_usage() / 100000) . " Mb<hr>";

        $new = new create;

        echo "Uso de memoria:" . (memory_get_usage() / 100000) . " Mb<hr>";

        var_dump($new);

        echo "Uso de memoria:" . (memory_get_usage() / 100000) . " Mb<hr>";
        ?>
    </body>
</html>
