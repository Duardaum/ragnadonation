<?php


final class Busca extends Banco {

    private $sql, $qry, $codcliente, $data_inicial, $data_final;

    public function Estados(){
        $this->sql = "SELECT * FROM estados ORDER BY nome ASC";
        $this->qry = parent::Executar($this->sql);

        return $this->qry;
    }

    public function Cidades($uf){
        $this->sql = "SELECT * FROM cidades WHERE uf = '".$uf."' ORDER BY nome ASC";
        $this->qry = parent::Executar($this->sql);

        return $this->qry;
    }

    public function Doacoes($codcliente){
        $this->codcliente = (int) $codcliente;
        $this->sql = "SELECT * FROM doacao WHERE codcliente = '$this->codcliente' ORDER BY status, dia ASC";
        $this->qry = parent::Executar($this->sql);

        return $this->qry;
    }

    public function DadosCliente($codcliente){
        $this->sql = "SELECT * FROM vw_clientes WHERE codcliente = '$codcliente' LIMIT 1";
        $this->qry = parent::Executar($this->sql);

        return $this->qry;
    }

    public function DoacoesAbertas(){
        $this->sql = "SELECT * FROM vw_doacoes WHERE status = '0' ORDER BY dia, dia_doacao, hora_doacao ASC";
        $this->qry = parent::Executar($this->sql);

        return $this->qry;
    }

    public function DoacoesCodigo($coddoacao){
        $this->sql = "SELECT * FROM doacao WHERE coddoacao = '$coddoacao' LIMIT 1";
        $this->qry = parent::Executar($this->sql);

        return $this->qry;
    }

    public function Relatorio($data_inicial, $data_final){
        $this->data_inicial = (string) InverteDataBanco($data_inicial);
        $this->data_final = (string) InverteDataBanco($data_final);

        if((empty($this->data_inicial)) || (empty($this->data_final))){
            return 1;
        }else{

            $this->sql = "SELECT * FROM vw_relatorio WHERE dia >= '$this->data_inicial' AND dia <= '$this->data_final'";
            $this->qry = parent::Executar($this->sql);

            return $this->qry;
        }
    }

}

?>
