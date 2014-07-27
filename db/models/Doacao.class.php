<?php

final class Doacao extends Banco {

    private $sql, $qry, $cod_ativacao, $coddoacao;
    private $dia_doacao, $hora_doacao, $tipo_doacao, $valor, $char_doador, $char_receptor, $char_receptor_login, $mensagem, $codcliente;

    public function Dados($dia_doacao, $hora_doacao, $tipo_doacao, $valor, $char_doador, $char_receptor, $char_receptor_login, $mensagem, $codcliente){
        $this->dia_doacao = (string) InverteDataBanco($dia_doacao);
        $this->hora_doacao = (string) $hora_doacao;
        $this->tipo_doacao = (string) $tipo_doacao;
        $this->valor = (float) $valor;
        $this->char_doador = (string) trim(utf8_encode($char_doador));
        $this->char_receptor = (string) trim(utf8_encode($char_receptor));
        $this->char_receptor_login = (string) trim(utf8_encode($char_receptor_login));
        $this->mensagem = $mensagem;
        $this->codcliente = (int) $codcliente;
    }

    public function Validar(){
        if((empty($this->dia_doacao)) || (strlen($this->dia_doacao) != 10)){
            return 1;
        }else if((empty($this->hora_doacao)) || (strlen($this->hora_doacao) != 8)){
            return 1;
        }else if((empty($this->tipo_doacao)) || (strlen($this->tipo_doacao) != 1) || (!is_numeric($this->tipo_doacao))){
            return 1;
        }else if((empty($this->valor)) || (!is_numeric($this->valor)) || (!is_float($this->valor))){
            return 1;
        }else if((empty($this->char_doador)) || (strlen($this->char_doador) < 3) || (!is_string($this->char_doador))){
            return 1;
        }else if((empty($this->char_receptor)) || (strlen($this->char_receptor) < 3) || (!is_string($this->char_receptor))){
            return 1;
        }else if((empty($this->char_receptor_login)) || (strlen($this->char_receptor_login) < 4) || (!is_string($this->char_receptor_login))){
            return 1;
        }else if((empty($this->codcliente)) || (!is_numeric($this->codcliente)) || (!is_int($this->codcliente))){
            return 1;
        }else{
            return self::Verificar();
        }
    }

    private function Verificar(){

        parent::setConection();//Conexao do RAgnarok
        $this->sql = "SELECT account_id FROM login WHERE userid = '$this->char_receptor_login' LIMIT 1";
        $this->qry = parent::Executar($this->sql);

        if($this->qry == '0'){
            return 2;//Não existe nenhuma conta com esse login registrada!!
        }else{
            return self::Doar();
        }
    }

    private function Doar(){
        parent::setConectionn();//Ragnadonation

        do{
            $this->cod_ativacao = GerarCodigo(20);
            $this->sql = "SELECT coddoacao FROM doacao WHERE cod_ativacao = '$this->cod_ativacao' AND (status <> '0' AND status <> '1') LIMIT 1";
            $this->qry = parent::Executar($this->sql);

            if($this->qry == '0'){
                break;
            }
        }while(1 == 2);
        
        $this->sql = "INSERT INTO doacao VALUES (default, '$this->codcliente', '$this->dia_doacao', '$this->hora_doacao', '$this->tipo_doacao', '$this->valor', '$this->mensagem', '$this->cod_ativacao', '0', NOW(), NOW(), '".$_SERVER['REMOTE_ADDR']."');";
        parent::Executar($this->sql);
        $this->sql = "INSERT INTO conta VALUES (default, (SELECT MAX(coddoacao) FROM doacao LIMIT 1), '$this->char_doador', '$this->char_receptor', '$this->char_receptor_login');";
        parent::Executar($this->sql);
        $this->sql = "SELECT MAX(coddoacao) as codigo FROM doacao LIMIT 1";
        $this->qry = parent::Executar($this->sql);
        $Doacao = mysql_fetch_object($this->qry);

        parent::setConection();//Conexao com a base de dados ragnarok

        $this->sql = "INSERT INTO ragdon VALUES (default, (SELECT account_id FROM login WHERE userid = '$this->char_receptor_login' LIMIT 1), '$Doacao->codigo', '$this->codcliente', '$this->cod_ativacao', '0', '$this->tipo_doacao', '0', CURRENT_DATE());";
        $this->qry = parent::Executar($this->sql);

        return $this->qry;
    }

    public function Deletar($coddoacao){
        $this->coddoacao = (int) $coddoacao;
        $this->sql = "DELETE FROM doacao WHERE coddoacao = '$this->coddoacao' LIMIT 1";
        parent::Executar($this->sql);
        $this->sql = "DELETE FROM conta WHERE coddoacao = '$this->coddoacao' LIMIT 1";
        parent::Executar($this->sql);

        parent::setConection();

        $this->sql = "DELETE FROM ragnadonation WHERE coddoacao = '$this->coddoacao' LIMIT 1";
        $this->qry = parent::Executar($this->sql);

        return $this->qry;
    }

}

?>
