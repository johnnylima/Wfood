<!DOCTYPE html>
<?php
//require('./_config/config.inc.php');
?>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        
        
        
        

        /**
         * Localiza caminho , relativo à pasta raiz dado, de todos os arquivos e diretórios de um determinado diretório e seus sub- diretórios não de forma recursiva. 
         * Irá retornar um array no formato 
         * array( 
         *   'files' => [], 
         *   'dirs'  => [], 
         * ) 
         * @author sreekumar 
         * @param string $root 
         * @result array 
         */
        $root = str_replace("/", DIRECTORY_SEPARATOR, dirname($_SERVER['SCRIPT_FILENAME']));
        $a = dir_file($root);
        $arrFileClass = [];
        
        foreach ($a as $v):
            foreach ($v as $ae):
                if(stripos($ae, "class.php")):
                    $arrFileClass[] = $ae;
                endif;
            endforeach;
        endforeach;
        
        foreach ($arrFileClass as $pArr):
            echo $pArr . "<br>";
        endforeach;

        //var_dump($a);

        function dir_file($root = '.') {
            $files = array('arquivo' => array(), 'diretorio' => array());
            $directories = array();
            $last_letter = $root[strlen($root) - 1];
            $root = ($last_letter == '\\' || $last_letter == '/') ? $root : $root . DIRECTORY_SEPARATOR;

            $directories[] = $root;

            while (sizeof($directories)) {
                $dir = array_pop($directories);
                if ($handle = opendir($dir)) {
                    while (false !== ($file = readdir($handle))) {
                        if ($file == '.' || $file == '..') {
                            continue;
                        }
                        $file = $dir . $file;
                        if (is_dir($file)) {
                            $directory_path = $file . DIRECTORY_SEPARATOR;
                            array_push($directories, $directory_path);
                            $files['diretorio'][] = $directory_path;
                        } elseif (is_file($file)) {
                            $files['arquivo'][] = $file;
                        }
                    }
                    closedir($handle);
                }
            }

            return $files;
        }
        //*/
        ?>
    </body>
</html>
