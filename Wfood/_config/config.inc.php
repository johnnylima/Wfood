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

    $rootDir = str_replace("/", DIRECTORY_SEPARATOR, dirname($_SERVER['SCRIPT_FILENAME']));
    $ClassExtension = ($Class . ".class.php");

    /*     * Faz chamada a função DIR_FILE, onde serão listados todos os arquivos e
     * diretórios.
     * 
     * A seguir é feita um verificação em todos os caminhos (arquivos) para
     * confirmar se existe o nome da classe chamada em algum deles.
     * 
     * O exit faz com que seja percorrido somente o primeiro array do DIR_FILE,
     * ou seja, somente o array "arquivos" descartando o segundo array "diretorio".
     * Dessa forma elimina perda de tempo à mais. 
     * 
     * Se for achado a string da $ClassExtension no array de caminhos, será passado
     * para $FileClass, para ser submetido a vericação de existência na 
     * "VALIDAÇÃO DE CAMINHOS"
     */
    $FileClass = null;
    foreach (DIR_FILE($rootDir) as $arr2DirFile):
        foreach ($arr2DirFile as $arrFileClass):
            if (stripos($arrFileClass, $ClassExtension)):
                $FileClass = $arrFileClass;
            endif;
        endforeach;
    endforeach;

    // VALIDAÇÃO DE CAMINHOS
    $empytDir = null;
    if (!$empytDir && file_exists($FileClass) && !is_dir($FileClass)):
        include_once ($FileClass);
        $empytDir = true;
    endif;

    if (!$empytDir):
        trigger_error("A Classe <b><u>{$Class}</u></b> não existe.", E_USER_ERROR);
        die;
    endif;
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
function DIR_FILE($root = '.') {
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
