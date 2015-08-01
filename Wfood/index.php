<!DOCTYPE html>
<?php
require('./_config/config.inc.php');
?>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php

        $new = new create;

        var_dump($new);

        echo "Uso de memoria:" . (memory_get_usage() / 100000) . " Mb<hr>";
        ?>
    </body>
</html>
