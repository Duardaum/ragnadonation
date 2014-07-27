
<?php

class Banco {

    private $cnn, $qry, $sql, $db;
    private $host = "localhost";//IP do servidor ragnadonation
    private $user = "root";//usuario de acesso ao banco de dados ragnadonation
    private $pass = "";//senha de acesso ao banco de dados ragnadonation
    private $banco = "ragnadonation_db";//nome do banco de dados ragnadonation

    /**
     * Method de Conexao com a base de dados Ragnadonation
     */
    protected function setConectionn(){
        $this->host = "localhost";//IP do servidor ragnadonation
        $this->user = "root";//usuario de acesso ao banco de dados ragnadonation
        $this->pass = "";//senha de acesso ao banco de dados ragnadonation
        $this->banco = "ragnadonation_db";//nome do banco de dados ragnadonation
    }

    /**
     * Method de Conexao com a base de dados Ragnarok
     */
    protected function setConection(){
        $this->host = "localhost";//IP do servidor ragnarok
        $this->user = "root";//usuario de acesso ao banco de dados ragnarok
        $this->pass = "";//senha de acesso ao banco de dados ragnarok
        $this->banco = "ragnarok";//nome do banco de dados ragnarok
    }

    public function setHost($ip){
        $this->host = $ip;
    }

    public function setUser($usr){
        $this->user = $usr;
    }

    public function setPass($pwd){
        $this->pass = $pwd;
    }

    public function setBanco($db){
        $this->banco = $db;
    }

    private function Conectar(){

        $DADOS = (object) array(
                            "host" => $this->host,
                            "user" => $this->user,
                            "pass" => $this->pass,
                            "banco" => $this->banco
                          );

        $this->cnn = mysql_connect($DADOS->host, $DADOS->user, $DADOS->pass) or die ("Erro ao tentar selecionar servidor da base de dados: " . mysql_error());
        $this->db = mysql_select_db($DADOS->banco, $this->cnn) or die ("Erro ao selecionar Base de Dados" . mysql_error());
    }

    protected function Executar($sql){
        $this->sql = (string) $sql;

        self::Conectar();
        $this->qry = mysql_query($this->sql, $this->cnn) or die ("Erro ao executar query na base de dados: " . mysql_error());

        $SELECT = explode(" ", $this->sql);
        if(strtoupper(trim($SELECT[0])) == "SELECT"){
            if(mysql_num_rows($this->qry) > 0){
                self::Desconectar();
                return $this->qry;
            }else{
                self::Desconectar();
                return 0;
            }
        }else{
            if(mysql_affected_rows($this->cnn) > 0){
                self::Desconectar();
                return 10;
            }else{
                self::Desconectar();
                return 0;
            }
        }
    }

    private function Desconectar(){
        return mysql_close($this->cnn);
    }
}
