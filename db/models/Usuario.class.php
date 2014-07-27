<?php

final class Usuario extends Banco {

    private $login, $senha, $sql, $qry, $codcliente;
    private $email, $nivel;

    public function Autenticar($login, $senha){
        
        $this->login = (string) addslashes($login);
        $this->senha = (string) addslashes($senha);

        return self::Verificar();
    }

    private function Verificar(){
        
        $this->sql = "SELECT codcliente FROM vw_usuarios WHERE cryplogin = MD5('$this->login') AND crypsenha = MD5('$this->senha') LIMIT 1";
        $this->qry = parent::Executar($this->sql);

        if($this->qry == '0'){
            return 0;
        }else{
            $user = mysql_fetch_object($this->qry);

            if(!isset($user->codcliente)){
                return 1;
            }else{
                $this->codcliente = $user->codcliente;
                return self::Logar();
            }
        }
    }

    private function Logar(){

        parent::setConection();//Base de dados Ragnarok
        $this->sql = "SELECT coddoacao, status FROM ragdon WHERE codcliente = '$this->codcliente' AND status = '2'";
        $this->qry = parent::Executar($this->sql);

        if($this->qry != '0'){
            $this->sql = "UPDATE ragdon SET status = '3' WHERE codcliente = '$this->codcliente' AND status = '2'";
            parent::Executar($this->sql);

            parent::setConectionn();//Base de dados Ragnadonation

            while($Status = mysql_fetch_object($this->qry)){
                parent::Executar("UPDATE doacao SET status = '$Status->status' WHERE coddoacao = '$Status->coddoacao' LIMIT 1");
            }
        }
        
        parent::setConectionn();//Base de dados Ragnadonation
        $this->sql = "UPDATE login SET
                        contador_log = contador_log + '1',
                        ip = '".$_SERVER[REMOTE_ADDR]."'
                      WHERE cryplogin = MD5('$this->login') AND crypsenha = MD5('$this->senha');
                     ";
        parent::Executar($this->sql);

        $this->sql = "SELECT * FROM vw_usuarios WHERE cryplogin = MD5('$this->login') AND crypsenha = MD5('$this->senha') LIMIT 1";
        $this->qry = parent::Executar($this->sql);
        
        $this->sql = "UPDATE login SET
                        ultimo_log = NOW()
                      WHERE cryplogin = MD5('$this->login') AND crypsenha = MD5('$this->senha');
                     ";
        parent::Executar($this->sql);
        return $this->qry;
    }

    public function Permissao($login, $nivel){
        $this->login = (string) addslashes($login);
        $this->nivel = (int) $nivel;

        return self::ValidaDados();
    }

    private function ValidaDados(){
        if((empty($this->login) || (empty($this->nivel)))){
            return 1;
        }else if((!is_numeric($this->nivel))){
            return 1;
        }else{
            return self::AlteraPermissao();
        }
    }

    private function AlteraPermissao(){
        $this->sql = "SELECT codcliente FROM vw_clientes WHERE login = '$this->login' LIMIT 1";
        $this->qry = parent::Executar($this->sql);

        if($this->qry == '0'){
            return 2;//Não existem ou nao compativeis
        }else{
            $this->sql = "SELECT codcliente FROM vw_clientes WHERE codcliente = '1' AND login = '$this->login' LIMIT 1";
            $this->qry = parent::Executar($this->sql);

            if($this->qry != '0'){
                return 3;//Usuário padrao nao pode ser modificado
            }else{
                $this->sql = "UPDATE login SET tipo = '$this->nivel' WHERE login = '$this->login'";
                $this->qry = parent::Executar($this->sql);

                return $this->qry;
            }
        }
    }

    public function RecuperaSenha($login, $email){
        $this->login = (string) addslashes($login);
        $this->email = (string) $email;

        return self::ValidaBackPwd();
    }

    private function ValidaBackPwd(){
        if((empty($this->login)) || (empty($this->email))){
            return 1;
        }else if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)){
            return 1;
        }else{
            return self::GetPwd();
        }
    }

    private function GetPwd(){
        $this->sql = "SELECT login, senha FROM vw_clientes WHERE login = '$this->login' AND email = '$this->email' LIMIT 1";
        $this->qry = parent::Executar($this->sql);

        if($this->qry != '0'){
            $Dados = mysql_fetch_object($this->qry);
            return $Dados;
        }else{
            return 2;
        }
    }
}
?>
