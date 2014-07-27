
<?php

final class Email extends PHPMailer {

    protected $_usuario_email = "mr.eduardosantos@gmail.com";//conta gmail do servidor
    protected $_senha_usuario_email = "BaR887100";//senha da conta gmail do servidor
    protected $_nome_servidor = "Tutorial-RO";//nome fantasia do servidor
    private $_msg;

    public function  __construct() {
        parent::IsSMTP();
        parent::IsHTML();
        $this->SMTPAuth = true;
        $this->Host = "smtp.gmail.com";
        $this->Port = "587";
        $this->Username = $this->_usuario_email;
        $this->Password = $this->_senha_usuario_email;
        parent::AddReplyTo($this->_usuario_email, $this->_nome_servidor);
    }

    final public function setEmailEnvio($email){
        $this->_usuario_email = (string) $email;
    return $this;
    }

    final public function setEmailEnvioSenha($senha){
        $this->_senha_usuario_email = (string) $senha;
    return $this;
    }

    final public function setEnderecoEnvio($email, $nome = null){
        parent::AddAddress($email, $nome);
    return $this;
    }

    final public function setMultiEnderecoEnvio(array $EMAILS){
        foreach($EMAILS as $mail){
            parent::AddAddress($mail["email"], $mail["nome"]);
        }
    return $this;
    }

    final public function setAnexo($caminho){
        parent::AddAttachment($caminho);
    return $this;
    }

    final public function setMultiAnexos(array $CAMINHOS){
        foreach($CAMINHOS as $anexo)
            parent::AddAttachment($anexo);

    return $this;
    }

    final public function setTituloEmail($titulo){
        $this->Subject = $titulo;
    return $this;
    }

    final public function setMensagemHTML($mensagem){
        parent::MsgHTML($mensagem);
    return $this;
    }

    /**
     * @return boolean
     */
    final public function enviar(){
        parent::SetFrom($this->_usuario_email, $this->_nome_servidor);

        try{
            parent::Send();
            $this->_msg = "Mensagem Enviada com sucesso!!";
            return true;
        }catch(Exception $e){
            $this->_msg = "Erro ao tentar enviar mensagem: ".$e->getMessage();
            return false;
        }
    }

    final public function getMsg(){
        return $this->_msg;
    }

    final public function getNomeServidor(){
        return $this->_nome_servidor;
    }

    final public function getEmailServidor(){
        return $this->_usuario_email;
    }
}
