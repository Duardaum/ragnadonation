<?php

final class Cliente extends Banco {

    private $codcidade, $nome, $endereco, $bairro, $numero, $fone01ddd, $fone01num, $fone02ddd, $fone02num, $email, $datanascimento, $login, $senha, $codcliente, $acao;
    private $qry, $sql, $qry02;

    public function Dados($codcidade, $nome, $endereco, $bairro, $numero, $fone01ddd, $fone01num, $fone02ddd, $fone02num, $email, $datanascimento, $login, $senha, $codcliente, $acao){
        $this->codcidade = (int) $codcidade;
        $this->nome = (string) RemoveCaracEsp($nome);
        $this->endereco = (string) RemoveCaracEsp($endereco);
        $this->bairro = (string) RemoveCaracEsp($bairro);
        $this->numero = (string) RemoveCaracEsp($numero);
        $this->fone01ddd = (int) trim($fone01ddd);
        $this->fone01num = (int) trim($fone01num);
        $this->fone02ddd = (int) trim($fone02ddd);
        $this->fone02num = (int) trim($fone02num);
        $this->email = (string) utf8_encode($email);
        $this->datanascimento = (string) InverteDataBanco($datanascimento);
        $this->login = (string) utf8_encode(addslashes($login));
        $this->senha = (string) utf8_encode(addslashes($senha));
        $this->codcliente = (int) $codcliente;
        $this->acao = (string) trim($acao);
    }

    public function Validar(){
        if((empty($this->codcidade)) || (!is_int($this->codcidade)) || (!is_numeric($this->codcidade))){
            return 1;
        }else if((empty($this->nome)) || (!is_string($this->nome))){
            return 1;
        }else if((empty($this->endereco)) || (!is_string($this->endereco)) || (strlen($this->endereco) > 255)){
            return 1;
        }else if((empty($this->bairro)) || (!is_string($this->bairro)) || (strlen($this->bairro) > 50)){
            return 1;
        }else if((empty($this->numero)) || (strlen($this->numero) > 10)){
            return 1;
        }else if(!empty($this->fone01ddd) && (!is_numeric($this->fone01ddd) || strlen($this->fone01ddd) != 2)){
            return 1;
        }else if(!empty($this->fone01ddd) && ((empty($this->fone01num)) || (!is_numeric($this->fone01num)) || (strlen($this->fone01num) != 8))){
            return 1;
        }else if(!empty($this->fone02ddd) && (!is_numeric($this->fone02ddd) || (strlen($this->fone02ddd) != 2))){
            return 1;
        }else if(!empty($this->fone02ddd) && ((empty($this->fone02num)) || (!is_numeric($this->fone02num)) || (strlen($this->fone02num) != 8))){
            return 1;
        }else if((empty($this->email)) || (!filter_var($this->email, FILTER_VALIDATE_EMAIL))){
            return 1;
        }else if((empty($this->datanascimento)) || (strlen($this->datanascimento) != 10)){
            return 1;
        }else if((empty($this->login)) || (strlen($this->login) < 6 || strlen($this->login > 20))){
            return 1;
        }else if((empty($this->senha)) || (strlen($this->senha) < 5 || strlen($this->senha) > 12)){
            return 1;
        }else if($this->acao == 'atualizar' && (empty($this->codcliente) || !is_int($this->codcliente))){
            return 1;
        }else{

            if($this->acao == 'cadastrar'){
                return  self::Verificar();
            }else if($this->acao == 'atualizar'){
                return self::Atualizar();
            }else{
                return 2;//Erro inesperado
            }

        }
    }

    private function Verificar(){
        $this->sql = "SELECT codcliente FROM clientes WHERE email = '".$this->email."' LIMIT 1";
        $this->qry = parent::Executar($this->sql);
        if($this->qry != '0'){ return 3; }// Email já cadastrado!!

        $this->sql = "SELECT codlogin FROM login WHERE login = '".$this->login."' LIMIT 1";
        $this->qry = parent::Executar($this->sql);
        if($this->qry != '0'){ return 4; }// Login já cadastrado

        return self::Cadastrar();
    }

    private function Cadastrar(){
        $this->sql = "INSERT INTO clientes VALUES (default, '$this->codcidade', '$this->nome', '$this->endereco', '$this->bairro', '$this->numero', '$this->fone01ddd', '$this->fone01num', '$this->fone02ddd', '$this->fone02num', '$this->email', '$this->datanascimento', NOW());";
        parent::Executar($this->sql);
        $this->sql = "INSERT INTO login VALUES (default, (SELECT MAX(codcliente) FROM clientes LIMIT 1), '$this->login', '$this->senha', MD5('$this->login'), MD5('$this->senha'), '1', '0', NOW(), '".$_SERVER[REMOTE_ADDR]."');";
        $this->qry = parent::Executar($this->sql);
        
        return $this->qry;
    }

    private function Atualizar(){
        $this->sql = "UPDATE clientes SET
                        codcidade = '$this->codcidade',
                        nome = '$this->nome',
                        endereco = '$this->endereco',
                        bairro = '$this->bairro',
                        numero = '$this->numero',
                        fone01ddd = '$this->fone01ddd',
                        fone01num = '$this->fone01num',
                        fone02ddd = '$this->fone02ddd',
                        fone02num = '$this->fone02num',
                        email = '$this->email',
                        datanascimento = '$this->datanascimento'
                      WHERE codcliente = '$this->codcliente';
                     ";
        $this->qry = parent::Executar($this->sql);
        
        $this->sql = "UPDATE login SET
                        senha = '$this->senha',
                        cryplogin = MD5('$this->login'),
                        crypsenha = MD5('$this->senha')
                      WHERE codcliente = '$this->codcliente';
                     ";
        $this->qry02 = parent::Executar($this->sql);
        
        if($this->qry == 0 && $this->qry02 == 0){
            return 0;
        }else{
            return 10;
        }
    }
}

?>
