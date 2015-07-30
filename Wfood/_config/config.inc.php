<?php

// CONFIGRAÇÕES DO BANCO ####################
define('HOST', 'localhost');
define('USER', 'root');
define('PASS', '');
define('DBSA', 'wfood');

/*

  // DEFINE SERVIDOR DE E-MAIL ################
  define('MAILUSER', 'email@dominio.com.br');
  define('MAILPASS', 'senhadoemail');
  define('MAILPORT', 'postadeenvio');
  define('MAILHOST', 'servidordeenvio');

  // DEFINE IDENTIDADE DO SITE ################
  define('SITENAME', 'Cidade Online');
  define('SITEDESC', 'Este site foi desenvolvido no curso de PHP Orientado a Objetos da UPINSIDE TREINAMENTOS. O mesmo utiliza a arquitetura semântica do HTML5 e foi criado com as últimas técnologias disponíveis!');

  // DEFINE A BASE DO SITE ####################
  define('HOME', 'http://dominiocompleto.com.br');
  define('THEME', 'cidadeonline');

  define('INCLUDE_PATH', HOME . DIRECTORY_SEPARATOR . 'themes' . DIRECTORY_SEPARATOR . THEME);
  define('REQUIRE_PATH', 'themes' . DIRECTORY_SEPARATOR . THEME);
 */




// AUTO LOAD DE CLASSES ####################
function __autoload($Class) {

    $root = str_replace("/", DIRECTORY_SEPARATOR, dirname($_SERVER['SCRIPT_FILENAME']));
    $arrClass = dir_file($root);
    $arrFileClass = [];

    foreach ($arrClass as $dirFileClass):
        foreach ($dirFileClass[] as $fileClass):
            if (stripos($fileClass, "class.php")):
                $arrFileClass = $fileClass;
                
            endif;
        endforeach;
    endforeach;
    



    foreach ($cDir as $dirName):
        $arqv = substr_replace((getcwd() . "\n"), '', -1) . DIRECTORY_SEPARATOR . $dirName . DIRECTORY_SEPARATOR . $Class . '.class.php';
        //$arqv = $home . DIRECTORY_SEPARATOR . $dirName . DIRECTORY_SEPARATOR . $Class . '.class.php';
        //$arqv = substr_replace( (getcwd() . "\n") , '', -1) . '\teste.class.php';

        if (!$iDir && file_exists($arqv) && !is_dir($arqv)):
            echo "<b>teste de classe ok</b><br><br><hr>";

            include_once ($arqv);
            $iDir = true;

        endif;
    endforeach;

    if (!$iDir):
        echo getcwd() . "\n" . '\teste.class.php' . "<hr>";
        echo __DIR__ . "\n <hr>";
        echo $arqv . "<hr>"; //__DIR__ . DIRECTORY_SEPARATOR . $dirName . DIRECTORY_SEPARATOR . $Class . '.class.php'
    /*
      trigger_error("Não foi possível incluir {$Class}.class.php", E_USER_ERROR);

      die;
     //*/
    endif;
    //*/
}

// TRATAMENTO DE TIPO DE MENSAGENS#####################
// CSS constantes :: Mensagem
define('WF_ACCEPT', 'accept');
define('WF_INFOR', 'infor');
define('WF_ALERT', 'alert');
define('WF_ERROR', 'error');

//WFMsg :: Exibe erros lançados :: Front

function WFMsg($ErrMsg, $ErrNo, $ErrDie = null) {
    // Classe de identificação para o CSS
    $IdentClassCSS = "trigger";
    $CssClass = ($ErrNo == E_USER_NOTICE ? WF_INFOR : ($ErrNo == E_USER_WARNING ? WF_ALERT : ($ErrNo == E_USER_ERROR ? WF_ERROR : $ErrNo)));
    echo "<p class={$IdentClassCSS} {$CssClass}>{$ErrMsg}<span class=\"ajax_close\"></span></p>";

    if ($ErrDie):
        die;
    endif;
}

//PHPErro :: personaliza o gatilho do PHP
function PHPMsg($ErrNo, $ErrMsg, $ErrFile, $ErrLine) {
    // Classe de identificação para o CSS
    $IdentClassCSS = "trigger";
    $CssClass = ($ErrNo == E_USER_NOTICE ? WF_INFOR : ($ErrNo == E_USER_WARNING ? WF_ALERT : ($ErrNo == E_USER_ERROR ? WF_ERROR : $ErrNo)));
    echo "<p class={$IdentClassCSS}  {$CssClass}>";
    echo "<b>Erro na Linha: #{$ErrLine} ::</b> {$ErrMsg}<br>";
    echo "<small>{$ErrFile}</small>";
    echo "<span class=\"ajax_close\"></span></p>";

    if ($ErrNo == E_USER_ERROR):
        die;
    endif;
}

set_error_handler('PHPMsg');

/**
 * Localiza caminho , relativo à pasta raiz dado, de todos os arquivos e diretórios de um determinado diretório e seus sub- diretórios não de forma recursiva. 
 * Irá retornar um array no formato 
 * array( 
 *   'arquivo' => [], 
 *   'diretorio'  => [], 
 * ) 
 * @param string $root 
 * @result array
 */
// LISTA DE ARQUIVOS E DIRETORIOS. COM CAMINHO A PARTIR DO ROOT;
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
