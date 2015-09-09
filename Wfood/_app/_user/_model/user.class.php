<?php

/**
 * AdminUser.class [ MODEL ADMIN ]
 * Respnsável por gerenciar os usuários no Admin do sistema!
 * 
 * @copyright (c) 2015, Johnny Lima Wfood
 */
class user {
    
    private $Data;
    private $Msg;
    private $Result;
    
    const Entity = 'usuarios';
    
    /**
     * <b>Cadastrar Usuário:</b> Envelope os dados de um usuário em um array atribuitivo e execute esse método
     * para cadastrar o mesmo no sistema. Validações serão feitas!
     * @param ARRAY $Data = Atribuitivo
     */
    public function ExeCreate(array $Data) {
        $this->Data = $Data;
        $this->Result = true;

        if ($this->Result):
            $this->Create();
        endif;
    }
    
    /**
     * <b>Ler Tabela:</b> Faz leitura no esquema da tabela, buscando o nome dos
     * campos da tabela.
     * @param string $tabela = tabela a ser consultada.
     */
    public function ExeReadTable(string $tabela) {
        $this->tabela = $tabela;

        if ($this->Result):
            $this->ReadTable($tabela);
        endif;
    }

    function getResult() {
        return $this->Result;
    }
    
    function getMsg() {
        return $this->Msg;
    }
    
    
    
    /*
     * ***************************************
     * *********  MÉTODOS PRIVADOS  **********
     * ***************************************
     */
    
    
        //Cadasrtra Usuário!
    private function Create() {
        $Create = new Create;
//        $this->Data['nome'] = date('Y-m-d H:i:s');
//        $this->Data['senha'] = md5($this->Data['senha']);

        $Create->ExeCreate(self::Entity, $this->Data);

        if ($Create->getResult()):
            $this->Msg = ["O usuário <b>{$this->Data['user_name']}</b> foi cadastrado com sucesso no sistema!", WS_ACCEPT];
            $this->Result = $Create->getResult();
        endif;
    }
    
    //Consulta Tabela
    private function ReadTable($tabela) {
        $this->query = "SELECT COLUMN_NAME, DATA_TYPE FROM information_schema.columns WHERE table_name = '{$tabela}' AND ORDINAL_POSITION > 1";
    }

}
