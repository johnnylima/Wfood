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
    $ClassExtension = ($Class . ".class.php");

    /*     * Faz uma listagem de diretórios diretórios.
     * 
     * A seguir é feita um verificação em todos os caminhos (arquivos) para
     * confirmar se existe o nome da classe chamada em algum deles.
     * 
     * 
     * 
     * Se for achado a string da $ClassExtension no $file (caminho), será
     * chamado o include_once;
     */
    
    $root = (isset($root) ? $root : '.'); // Coloque o caminho raiz!
    $root = ($root[strlen($root) - 1] == '\\' || $root[strlen($root) - 1] == '/') ? $root : $root . DIRECTORY_SEPARATOR;
    $empytfile = null;
    
    $car = "*";
    $glob = glob($car, GLOB_MARK);
    while (!empty(glob($car, GLOB_MARK))):
        if (!empty($FileClass = glob(substr_replace($car, "", -1) . $ClassExtension))):
            include_once ($root.$FileClass[0]);
            //var_dump($root.$FileClass[0]);
            $empytfile = true;
        endif;
        $car = $car . "\*";
    endwhile;

    if (!$empytfile):
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
