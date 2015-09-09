<?php
require('../../../_config/config.inc.php');
//print_r($_POST);


//$Query = "SELECT COLUMN_NAME FROM information_schema.columns WHERE table_name = 'usuario' AND ORDINAL_POSITION > 1";
//
//        //$nCT = nameColumnTable
//        $nCT = new read;
//
//        
//        $nCT->FullRead($Query);
//        $result = $nCT->getResult();
//
//        var_dump($result);




extract($_POST);

/**
 * @var string acao: vem do arquivo .js e foi extraido;
 */
 
switch ($acao):
    case "l_tab": //leitura de tabela
        /**
         * @var string $tabela é referente ao nome da tabela no BD
         */
        


        // CARREGANDO TABELA USUÁRIO PARA FORM
        /**QUERY NO MYSQL
         * SELECT * FROM wfood.usuario;
         * SELECT * FROM information_schema.columns WHERE table_name = 'usuario' AND ORDINAL_POSITION > 1;
         * SELECT COLUMN_NAME, DATA_TYPE FROM information_schema.columns WHERE table_name = 'usuario' AND ORDINAL_POSITION > 1;
         */

        
        $Query = "SELECT COLUMN_NAME, DATA_TYPE FROM information_schema.columns WHERE table_name = '{$tabela}' AND ORDINAL_POSITION > 1";

        //  $nCT = nameColumnTable
        $nCT = new read;
        $nCT->FullRead($Query);
        $result = $nCT->getResult();

        print_r(json_encode($result));

        break;

    default:
        echo "default";
        break;
endswitch;

//*/