<?php
echo '<h2 style="display: block; text-align: center; background-color: yellow;">Relatório da Instalação</h2>';

$DADOS = (object) $_POST;
$erro_msg = 'Reinicie o processo de instalação - <a href="index.php">Voltar</a>';

/*Banco de dados RAgnarok*/
echo 'VALIDACAO DOS DADOS E CONEXOES:<br /> Validando dados para conexao com o banco de dados Ragnarok:<br />';
if(empty($DADOS->txtUserRag) || empty($DADOS->txtIpRag) || empty($DADOS->txtBancoRag)){
    echo '<span style="color: red;">Erro ao tentar validar dados de conexao com a base de Dados Ragnarok. Verifique se o nome do banco de dados do servidor ragnarok é <b>'.$DADOS->txtBancoRag.'</b></span><br />';
    echo $erro_msg;
    exit;
}else{
    echo '<span style="color: green;">OK!</span><br />';
}

echo 'Efetuando conexao com a base de dados do Ragnarok:<br />';
if(!mysql_connect($DADOS->txtIpRag, $DADOS->txtUserRag, $DADOS->txtPassRag)){
    echo '<span style="color: red;">Erro ao tentar conectar ao servidor de Ragnarok. Verifique se o IP, usuário e senha estao corretos.</span><br />';
    echo $erro_msg;
    exit;
}else{
    if(!mysql_select_db($DADOS->txtBancoRag)){
        echo '<span style="color: red;">Erro ao tentar selecionar banco de dados do servidor de Ragnarok. Verifique se o nome do banco de dados realmente é <b>'.$DADOS->txtBancoRag.'</b></span><br />';
        echo $erro_msg;
        exit;
    }else{
        echo '<span style="color: green;">OK!</span><br />';
    }
}
/* Fim Banco de dados RAgnarok*/
/* Banco de dados do RagnaDonation */
echo 'Validando dados para conexao com o banco de dados do Painel RagnaDonation: <br />';

if(empty($DADOS->txtUserRagDon) || empty($DADOS->txtIpRagDon) || empty($DADOS->txtBancoRagDon)){
    echo '<span style="color: red;">Erro ao tentar validar dados de conexao com a base de dados do Painel RagnaDonation. Verifique se o nome do banco de dados é <b>'.$DADOS->txtBancoRagDon.'</b></span><br />';
    echo $erro_msg;
    exit;
}else{
    echo '<span style="color: green;">OK!</span><br />';
}

echo 'Efetuando conexao com a base de dados do RagnaDonation:<br />';
if(!mysql_connect($DADOS->txtIpRagDon, $DADOS->txtUserRagDon, $DADOS->txtPassRagDon)){
    echo '<span style="color: red;">Erro ao tentar conectar ao servidor do RagnaDonation. Verifique se o IP, usuário e senha estao corretos.</span><br />';
    echo $erro_msg;
    exit;
}else{
    if(!mysql_select_db($DADOS->txtBancoRagDon)){
        echo '<span style="color: red;">Erro ao tentar selecionar banco de dados do RagnaDonation. Verifique se o nome do banco de dados realmente é <b>'.$DADOS->txtBancoRagDon.'</b></span><br />';
        echo $erro_msg;
        exit;
    }else{
        echo '<span style="color: green;">OK!</span><br />';
    }
}
/* Fim Banco de dados do RagnaDonation */
/* Dados da conta do banco*/
echo 'Validando dados da Conta Bancaria:<br />';
if(empty($DADOS->txtBancoDeposito) || empty($DADOS->txtAgenciaDeposito) || empty($DADOS->txtContaDeposito) || empty($DADOS->rdTipoContaDeposito)){
    echo '<span style="color: red;">Erro ao validar dados da Conta Bancaria. Verifique se todos os dados foram preencidos corretamente.</span><br />';
    echo $erro_msg;
    exit;
}else{
    echo '<span style="color: green;">OK!</span><br />';
}
/* Fim Dados da conta do banco*/
/* Mensagem de Boas vindas */
echo 'Validando Mensagems de boas vindas..<br />';
if(empty($DADOS->txtMsgRagDon)){
    echo '<span style="color: red;">Erro ao validar a mensagem de boas vindas. Digite a mensagem de boas vindas para o Painel RagnaDonation.</span><br />';
    echo $erro_msg;
    exit;
}else{
    echo '<span style="color: green;">OK!</span><br />';
}
/* FIM Mensagem de Boas vindas */
/* Usuário Administrador */
echo 'Validando dados do Usuário Administrador..<br />';
if(empty($DADOS->txtNome) || empty($DADOS->txtLogin) || empty($DADOS->txtSenha) || empty($DADOS->txtReSenha) || empty($DADOS->txtEmail)){
    echo '<span style="color: red;">Erro ao validar dados do Usuário Administrador. Verifique se todos os campos foram preencidos corretamente.</span><br />';
    echo $erro_msg;
    exit;
}else if($DADOS->txtSenha != $DADOS->txtReSenha){
    echo '<span style="color: red;">Erro ao validar dados do Usuário Administrador. Senhas são incompatíveis.</span><br />';
    echo $erro_msg;
    exit;
}else if($DADOS->txtLogin == $DADOS->txtSenha){
    echo '<span style="color: red;">Erro ao validar dados do Usuário Administrador. Login e Senha são idênticos.</span><br />';
    echo $erro_msg;
    exit;
}else if(!filter_var($DADOS->txtEmail, FILTER_VALIDATE_EMAIL)){
    echo '<span style="color: red;">Erro ao validar dados do Usuário Administrador. <b>'.$DADOS->txtEmail.'</b> não é um endereço de email válido.</span><br />';
    echo $erro_msg;
    exit;
}else if(strlen($DADOS->txtLogin) < 5 || strlen($DADOS->txtSenha) > 20){
    echo '<span style="color: red;">Erro ao validar dados do Usuário Administrador. Login deve conter mínimo de 5 máximo de 20 caracteres.</span><br />';
    echo $erro_msg;
    exit;
}else if(strlen($DADOS->txtSenha) < 6 || strlen($DADOS->txtSenha) > 12){
    echo '<span style="color: red;">Erro ao validar dados do Usuário Administrador. Senha deve conter mínimo de 6 máximo de 12 caracteres.</span><br />';
    echo $erro_msg;
    exit;
}else{
    echo '<span style="color: green;">OK!</span><br />';
}
/* Fim Usuário Administrador */
/* Dados de email */
function fncValidaEmailGmail($email){
       $pos = strpos($email, '@');
       if(!$pos) return false;
       $gmail = substr($email, $pos);
       if($gmail != '@gmail.com') return false;
return true;
}
echo 'Validando dados para configuração de envio de Emails:<br />';
if(empty($DADOS->txtNomeServidor)){
    echo '<span style="color: red;">Erro ao validar dados do Email. Você não colocou o nome do servidor.</span><br />';
    echo $erro_msg;
    exit;
}else if(!fncValidaEmailGmail($DADOS->txtEmailServidor)){
    echo '<span style="color: red;">Erro ao validar dados do Email. Endereço não parece ser um Google Mail (GMail) válido.</span><br />';
    echo $erro_msg;
    exit;
}else if(empty($DADOS->txtSenhaEmailServidor)){
    echo '<span style="color: red;">Erro ao validar dados do Email. Senha de Email não pode ser vazio.</span><br />';
    echo $erro_msg;
    exit;
}else{
    echo '<span style="color: green;">OK!</span><br />';
}
/* Fim Dados de email */
echo 'CRIANDO OS ARQUIVOS:<br />';
echo 'Criando arquivo de Conexao com a Base de Dados:<br />';

$BancoClassPhp =
'
<?php

class Banco {

    private $cnn, $qry, $sql, $db;
    private $host = "'.$DADOS->txtIpRagDon.'";//IP do servidor ragnadonation
    private $user = "'.$DADOS->txtUserRagDon.'";//usuario de acesso ao banco de dados ragnadonation
    private $pass = "'.$DADOS->txtPassRagDon.'";//senha de acesso ao banco de dados ragnadonation
    private $banco = "'.$DADOS->txtBancoRagDon.'";//nome do banco de dados ragnadonation

    /**
     * Method de Conexao com a base de dados Ragnadonation
     */
    protected function setConectionn(){
        $this->host = "'.$DADOS->txtIpRagDon.'";//IP do servidor ragnadonation
        $this->user = "'.$DADOS->txtUserRagDon.'";//usuario de acesso ao banco de dados ragnadonation
        $this->pass = "'.$DADOS->txtPassRagDon.'";//senha de acesso ao banco de dados ragnadonation
        $this->banco = "'.$DADOS->txtBancoRagDon.'";//nome do banco de dados ragnadonation
    }

    /**
     * Method de Conexao com a base de dados Ragnarok
     */
    protected function setConection(){
        $this->host = "'.$DADOS->txtIpRag.'";//IP do servidor ragnarok
        $this->user = "'.$DADOS->txtUserRag.'";//usuario de acesso ao banco de dados ragnarok
        $this->pass = "'.$DADOS->txtPassRag.'";//senha de acesso ao banco de dados ragnarok
        $this->banco = "'.$DADOS->txtBancoRag.'";//nome do banco de dados ragnarok
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
';

$arquivo = '../db/models/Banco.class.php';
if(file_exists($arquivo)) unlink($arquivo);
$data = fopen($arquivo, 'w+');
fwrite($data, $BancoClassPhp);
if(!fclose($data)){
    echo '<span style="color: red;">Erro ao tentar criar arquivo <b>Banco.class.php</b>. Certifique-se de que todos os arquivos e diretorios do Painel tenha permissao 777.</span><br />';
    echo $erro_msg;
    exit;
}else{
    echo '<span style="color: green;">OK!</span><br />';
}

echo 'Criando arquivo de configuração de Email..<br />';
$EmailClassPhp =
'
<?php

final class Email extends PHPMailer {

    protected $_usuario_email = "'.$DADOS->txtEmailServidor.'";//conta gmail do servidor
    protected $_senha_usuario_email = "'.$DADOS->txtSenhaEmailServidor.'";//senha da conta gmail do servidor
    protected $_nome_servidor = "'.$DADOS->txtNomeServidor.'";//nome fantasia do servidor
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
';

$arquivo = '../db/models/Email.class.php';
if(file_exists($arquivo)) unlink($arquivo);
$data = fopen($arquivo, 'w+');
fwrite($data, $EmailClassPhp);
if(!fclose($data)){
    echo '<span style="color: red;">Erro ao tentar criar arquivo <b>Email.class.php</b>. Certifique-se de que todos os arquivos e diretorios do Painel tenha permissao 777.</span><br />';
    echo $erro_msg;
    exit;
}else{
    echo '<span style="color: green;">OK!</span><br />';
}

echo 'Criando arquivo de Boas Vindas: <br />';
$arquivo = '../db/config/welcome.php';
$msg = '<h2>'.$DADOS->txtMsgRagDon.'</h2>';
if(file_exists($arquivo)) unlink($arquivo);
$data = fopen($arquivo, 'w+');
fwrite($data, $msg);
if(!fclose($data)){
    echo '<span style="color: red;">Erro ao tentar criar arquivo <b>welcome.php</b>. Certifique-se de que todos os arquivos e diretorios do Painel tenha permissao 777.</span><br />';
    echo $erro_msg;
    exit;
}else{
    echo '<span style="color: green;">OK!</span><br />';
}

echo 'Criando arquivo com valores dos VIP/Donation';
$whophp01 =
'
<h2>Faça nos uma Doação!!</h2>

Doe para nós e ajude-nos a estarmos sempre ativos para poder
proporcionar a vocês a melhor diversão em ragnarok no mercado.<br><br>

<table>
    <tr>
        <td class="titulo">Banco:</td>
        <td class="input">'.$DADOS->txtBancoDeposito.'</td>
    </tr>
    <tr>
        <td class="titulo">Agência:</td>
        <td class="input">'.$DADOS->txtAgenciaDeposito.'</td>
    </tr>
    <tr>
        <td class="titulo">'.$DADOS->rdTipoContaDeposito.':</td>
        <td class="input">'.$DADOS->txtContaDeposito.'</td>
    </tr>
    <tr>
        <td class="titulo">Titular:</td>
        <td class="input">'.$DADOS->txtTitularDeposito.'</td>
    </tr>
</table>
';

$whophp02 =
'
<hr>

<h2>Adiquira agora dias V.I.P.!!</h2>
';
$whophp03 =
'
<br /><br />

Após a doação, faça seu cadastro no nosso Sistema, faça o login e coloque as
informações do comprovante clicando no menu \'Doar\' e assim, faremos a confirmação e
liberaremos sua bonificação!!
';
$whophp04 =
'
<hr>

<h2>Adiquira agora dias ROP\'s/Donation</h2>
';

$tabela_top = '<table>';
$tabela_down = '</table>';

$arquivo = '../db/config/who.php';
if(file_exists($arquivo)) unlink($arquivo);
$data = fopen($arquivo, 'w+');
echo 'Escrevendo dados da conta bancaria..<br />';

fwrite($data, $whophp01.$whophp02.$tabela_top);

echo 'Escrevendo dados dos valores vip..<br />';

$inicio = (int) 0;
$fim = (int) count($DADOS->diasvip);
while($inicio < $fim){
    if(!empty($DADOS->diasvip[$inicio])){
        $tr = '
            <tr>
                <td class="titulo">'.$DADOS->diasvip[$inicio].' dias = </td>
                <td class="input">R$ '.$DADOS->valorvip[$inicio].'</td>
            </tr>
        ';
        fwrite($data, $tr);
    }
$inicio ++;
}
fwrite($data, $tabela_down.$whophp04.$tabela_top);

echo 'Escrevendo dados dos valores ROPs..<br />';

$inicio = (int) 0;
$fim = (int) count($DADOS->qntrops);
while($inicio < $fim){
    if(!empty($DADOS->qntrops[$inicio])){
        $tr = '
            <tr>
                <td class="titulo">'.$DADOS->qntrops[$inicio].' ROP\'s = </td>
                <td class="input">R$ '.$DADOS->valorrops[$inicio].'</td>
            </tr>
        ';
        fwrite($data, $tr);
    }
$inicio ++;
}
fwrite($data, $tabela_down.$whophp03);

if(!fclose($data)){
    echo '<span style="color: red;">Erro ao tentar criar arquivo <b>who.php</b>. Certifique-se de que todos os arquivos e diretorios do Painel tenha permissao 777.</span><br />';
    echo $erro_msg;
    exit;
}else{
    echo '<span style="color: green;">OK!</span><br />';
}

echo 'VALIDANDO ENDEREÇO GMAIL:<br />';
echo 'Verificando se endereço de email do gmail é válido..<br />';
require_once '../db/models/index.php';
$objMsg = new Mensagem();
$objMail = new Email();
$envio = $objMail->setEnderecoEnvio("juniorbombardao@hotmail.com", "Eduardo Santos")
                 ->setTituloEmail("Novo usuario do RagnaDonation")
                 ->setMensagemHTML($objMsg->getMsgCriacaoServidor($objMail->getNomeServidor()))
                 ->enviar();
if(!$envio){
    echo '<span style="color: red;">O endereço de email <b>'.$DADOS->txtEmailServidor.'</b> parece nao ser válido. Certifique-se de que este email está registrado nso servidores do Gmail.</span><br />';
    echo $erro_msg;
    exit;
}else{
    $objMail->setEnderecoEnvio($DADOS->txtEmail, $DADOS->txtNome)
             ->setTituloEmail("RagnaDonation - Obrigado!!")
             ->setMensagemHTML($objMsg->getMsgCriacaoCliente())
             ->enviar();
    echo '<span style="color: green;">OK!</span><br />';
}

echo 'EXECUTANDO DADOS NO BANCO:<br />';
echo 'Criando tabelas na base de dados Ragnarok..<br />';
$cn = mysql_connect($DADOS->txtIpRag, $DADOS->txtUserRag, $DADOS->txtPassRag) or die (mysql_error());
$db = mysql_select_db($DADOS->txtBancoRag, $cn);

$DROP = explode('DROP', file_get_contents("sql/rag/drop.sql"));
$CREATE = explode('CREATE', file_get_contents("sql/rag/create.sql"));
$ALTER = explode('ALTER', file_get_contents("sql/rag/alter.sql"));

foreach($DROP as $sql){
    if(!empty($sql))
        mysql_query("DROP ".$sql, $cn) or die (mysql_error());
}
foreach($CREATE as $sql){
    if(!empty($sql))
        mysql_query("CREATE ".$sql, $cn) or die (mysql_error());
}
foreach($ALTER as $sql){
    if(!empty($sql))
        mysql_query("ALTER ".$sql, $cn) or die (mysql_error());
}

echo '<span style="color: green;">OK!</span><br />';

echo 'Criando tabelas na base de dados do RagnaDonation..<br />';
unset($cn);
unset($query);
$cn = mysql_connect($DADOS->txtIpRagDon, $DADOS->txtUserRagDon, $DADOS->txtPassRagDon) or die (mysql_error());
$db = mysql_select_db($DADOS->txtBancoRagDon, $cn);

unset($DROP);
unset($CREATE);
unset($ALTER);

$DROP = explode("DROP", file_get_contents("sql/ragdon/drop.sql"));
$CREATE = explode("CREATE", file_get_contents("sql/ragdon/create.sql"));
$ALTER = explode("ALTER", file_get_contents("sql/ragdon/alter.sql"));
$INSERT = explode("INSERT", file_get_contents("sql/ragdon/insert.sql"));

foreach($DROP as $sql){
    if(!empty($sql))
        mysql_query("DROP ".$sql, $cn) or die ("DROP ".mysql_error());
}
foreach($CREATE as $sql){
    if(!empty($sql))
        mysql_query("CREATE ".$sql, $cn) or die ("CREATE ".mysql_error());
}
foreach($ALTER as $sql){
    if(!empty($sql))
        mysql_query("ALTER ".$sql, $cn) or die ("ALTER ".mysql_error());
}
foreach($INSERT as $sql){
    if(!empty($sql))
        mysql_query("INSERT ".$sql, $cn) or die ("INSERT ".mysql_error());
}

$sql01 = "INSERT INTO clientes VALUES (1, '2130', '".$DADOS->txtNome."', 'internet', 'internet', '7', '00', '00000000', '00', '00000000', '".$DADOS->txtEmail."', CURRENT_DATE, CURRENT_DATE);";
$sql02 = "INSERT INTO login VALUES (1, 1, '".$DADOS->txtLogin."', '".$DADOS->txtSenha."', MD5('".$DADOS->txtLogin."'), MD5('".$DADOS->txtSenha."'), '2', 0, NOW(), '".$_SERVER['REMOTE_ADDR']."');";
try{
    mysql_query($sql01, $cn);
    mysql_query($sql02, $cn);
    echo '<span style="color: green;">OK!</span><br />';
}catch(Exception $e){
    echo '<span style="color: red;">Erro ao tentar criar arquivo <b>Email.class.php</b>. Certifique-se de que todos os arquivos e diretorios do Painel tenha permissao 777.</span><br />';
    echo $erro_msg;
    exit;
}

echo '
<h2 style="display: block; text-align: center; background-color: green; color: #fff;">RagnaDonation Instalado com Sucesso!!</h2>

Adicione esses dois NPC\'s no seu Servidor:
<ul>
<li><a href="../ragnadonation-files/npcs/ragdon_ativador.txt" target="_blank">Ragdon Ativador</a></li>
<li><a href="../ragnadonation-files/npcs/ragdon_verificador.txt" target="_blank">Ragdon Verificador</a></li>
</ul>

Escolha uma das opções:<br />
<ol>
<li><a href="../?end=1">Visualizar o RagnaDonation deletando pasta de instalação (recomendado).</a></li>
<li><a href="../?end=2">Visualizar o RagnaDonation renomeando pasta de instalação.</a></li>
</ol>
';