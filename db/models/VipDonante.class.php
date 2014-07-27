<?php

final class VipDonante extends Banco {

    private $coddoacao, $diasvip, $qnt_rops;
    private $sql, $qry;

    public function DadosVIP($coddoacao, $diasvip){
        $this->coddoacao = (int) $coddoacao;
        $this->diasvip = (int) $diasvip;
    }

    public function ValidaVIP(){
        if((empty($this->coddoacao) || (empty($this->diasvip)))){
            return 1;//Erro ao validar
        }else if((!is_int($this->coddoacao)) || (!is_numeric($this->coddoacao))){
            return 1;//Erro ao validar
        }else if((!is_int($this->diasvip)) || (!is_numeric($this->diasvip))){
            return 1;//Erro ao validar
        }else{
            return self::VerificarVIP();
        }
    }

    private function VerificarVIP(){
        $this->sql = "SELECT coddoacao FROM doacao WHERE coddoacao = '$this->coddoacao' LIMIT 1";
        $this->qry = parent::Executar($this->sql);
        if($this->qry == '0'){ return 2;} //Não existe nenhuma doação com esse código

        $this->sql = "SELECT coddoacao FROM doacao WHERE coddoacao = '$this->coddoacao' AND status = '0' LIMIT 1";
        $this->qry = parent::Executar($this->sql);
        if($this->qry == '0'){ return 3; } //Doação já aprovada

        $this->sql = "SELECT coddoacao FROM doacao WHERE coddoacao = '$this->coddoacao' AND tipo = '1' LIMIT 1";
        $this->qry = parent::Executar($this->sql);
        if($this->qry == '0'){ return 4; } //Doação não é VIP, verifique se é uma doação para obtenção de rops

        return self::AdicionarVIP();
    }

    private function AdicionarVIP(){

        $this->sql = "UPDATE doacao SET status = '1' WHERE coddoacao = '$this->coddoacao' LIMIT 1";
        parent::Executar($this->sql);

        parent::setConection();//Base de dados ragnarok

        $this->sql = "UPDATE ragdon SET status = '1', valor_abono = '$this->diasvip' WHERE coddoacao = '$this->coddoacao' AND status = '0' LIMIT 1;";
        $this->qry = parent::Executar($this->sql);

        return $this->qry;
    }

    public function DadosDon($coddoacao, $qnt_rops){
        $this->coddoacao = (int) $coddoacao;
        $this->qnt_rops = (int) $qnt_rops;
    }

    public function ValidaDon(){
        if((empty($this->coddoacao) || (empty($this->qnt_rops)))){
            return 1;
        }else if((!is_int($this->coddoacao)) || (!is_numeric($this->coddoacao))){
            return 1;
        }else if((!is_int($this->qnt_rops)) || (!is_numeric($this->qnt_rops))){
            return 1;
        }else{
            return self::VerificarDon();
        }
    }

    private function VerificarDon(){
        $this->sql = "SELECT coddoacao FROM doacao WHERE coddoacao = '$this->coddoacao' LIMIT 1";
        $this->qry = parent::Executar($this->sql);
        if($this->qry == '0'){ return 2;} //Não existe nenhuma doação com esse código

        $this->sql = "SELECT coddoacao FROM doacao WHERE coddoacao = '$this->coddoacao' AND status = '0' LIMIT 1";
        $this->qry = parent::Executar($this->sql);
        if($this->qry == '0'){ return 3; } //Doação já aprovada

        $this->sql = "SELECT coddoacao FROM doacao WHERE coddoacao = '$this->coddoacao' AND tipo = '2' LIMIT 1";
        $this->qry = parent::Executar($this->sql);
        if($this->qry == '0'){ return 4; } //Doação não é para obtenção de ROP's, verifique se é uma doação para obtenção de VIP

        return self::AdicionarDon();
    }

    private function AdicionarDon(){

        $this->sql = "UPDATE doacao SET status = '1' WHERE coddoacao = '$this->coddoacao' LIMIT 1";
        parent::Executar($this->sql);

        parent::setConection();//Base de dados ragnarok

        $this->sql = "UPDATE ragdon SET status = '1', valor_abono = '$this->qnt_rops' WHERE coddoacao = '$this->coddoacao' AND status = '0' LIMIT 1;";
        $this->qry = parent::Executar($this->sql);

        return $this->qry;
    }
}
?>
