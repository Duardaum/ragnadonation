<?php
ob_start();
session_start();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<title> RagnaDonation - Sistema de Controle de doações VIP/Donation (ROPs) </title>
<meta name="generator" content="Bluefish 1.0.7">
<meta name="author" content="Eduardo Jr. dos Santos">
<meta name="date" content="2010-01-30T13:22:30-0200">
<meta name="copyright" content="">
<meta name="keywords" content="jogo, jogo online, ragnarok, server, private server, ragnarok online, brasil, vip, sistema, sistema vip, donation, ragnadonation">
<meta name="description" content="jogo, jogo online, ragnarok, server, private server, ragnarok online, brasil, vip, sistema, sistema vip, donation, ragnadonation">
<meta name="ROBOTS" content="INDEX, FOLLOW">
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta http-equiv="content-type" content="application/xhtml+xml; charset=UTF-8">
<meta http-equiv="content-style-type" content="text/css">
<style type="text/css">
<!--
table tr:hover {
    background-color: #ccc;
}
-->
</style>
</head>
<body>

    <h2>Instalação do RagnaDonation</h2>
    <h4>Digite corretamente todas as informações que serão solicitadas neste arquivo para evitar erros de instalação.
    Ao final da instalação, será exibido um relatório do que ocorreu durante toda a instalação e se foi bem sucedida ou não. E logo mais abaixo do relatório os NPC's que são necessários instalar em seu servidor de Ragnarok.</h4>
    <h3>Todos os campos marcados com asterisco (*) são obrigatórios.</h3>
    <h3>Algumas Observações:</h3>
    Antes de mais nada, clique <a href="http://www.youtube.com/watch?v=C-E24gR4pV4" target="_blank">AQUI</a> e veja o video de apoio para a instalação.
    <ol>
        <li>Se estiver rodando ou for rodar essa aplicação em um servidor caseiro, recomendo que utilize o <a href="http://www.baixaki.com.br/download/xampp.htm" target="_blank">XAMPP</a>.</li>
        <li>Caso você estiver rodando essa aplicação em um servidor hospedado, dê permissão 777 para todos os arquivos. Veja esse <a href="http://www.youtube.com/watch?v=SckU91yku5c" target="_blank">VIDEO</a> para saber como.</li>
        <li>Instale o <a href="http://www.baixaki.com.br/download/xampp.htm" target="_blank">XAMPP</a> na raiz do disco que tiver mais espaço no seu computador: C:, D:, E: etc..</li>
        <li>Caso já use ou use algum outro servidor caseiro, para que não haja erro de exibição de dados, certifique-se de que as <a href="http://www.codigosnaweb.com/forum/Habilitar-short-tags-no-Xampp_1_4106.html" target="_blank">Short Tags</a> estão habilitadas.</li>
        <li>Caso não tenha, crie um email no Gmail para configurar o Envio de Emails do RagnaDonation.</li>
    </ol>
<form method="post" action="acao.php">
    <fieldset>
        <legend>Configuração do Banco de dados Ragnarok:</legend>
        <table>
            <tr>
                <td>* I.P.:</td>
                <td><input type="text" name="txtIpRag" value="localhost" /></td>
                <td>O valor padrão neste campo geralmente é <b>localhost</b>.</td>
            </tr>
            <tr>
                <td>* Usuário:</td>
                <td><input type="text" name="txtUserRag" /></td>
                <td></td>
            </tr>
            <tr>
                <td>Senha:</td>
                <td><input type="text" name="txtPassRag" /></td>
                <td></td>
            </tr>
            <tr>
                <td>* Banco:</td>
                <td><input type="text" name="txtBancoRag" value="ragnarok" /></td>
                <td>Digite o nome do banco de dados do seu servidor ragnarok o padrão é <b>ragnarok</b>. Caso nao seja, mude o nome aqui.</td>
            </tr>
        </table>
    </fieldset>
    <fieldset>
        <legend>Configuração do Banco de dados Ragnadonation:</legend>
        <table>
            <tr>
                <td>* I.P.:</td>
                <td><input type="text" name="txtIpRagDon" value="localhost" /></td>
                <td>O valor padrão neste campo geralmente é <b>localhost</b>.</td>
            </tr>
            <tr>
                <td>* Usuário:</td>
                <td><input type="text" name="txtUserRagDon" /></td>
                <td></td>
            </tr>
            <tr>
                <td>Senha:</td>
                <td><input type="text" name="txtPassRagDon" /></td>
                <td></td>
            </tr>
            <tr>
                <td>* Banco:</td>
                <td><input type="text" name="txtBancoRagDon" value="ragnadonation_db" /></td>
                <td>Crie um banco de dados para o RagnaDonation com um nome qualquer no seu phpmyadmin, recomendamos <b>ragnadonation_db</b>. Caso nao queira, coloque outro nome aqui.</td>
            </tr>
        </table>
    </fieldset>
    <fieldset>
        <legend>Configurações da Conta Bancaria:</legend>
        <table>
            <tr>
                <td>* Banco:</td>
                <td><input type="text" name="txtBancoDeposito" /></td>
                <td>Nome do banco da conta.</td>
            </tr>
            <tr>
                <td>* Agência:</td>
                <td><input type="text" name="txtAgenciaDeposito" /></td>
                <td>Nº da agencia da conta.</td>
            </tr>
            <tr>
                <td>* Conta
                    <input type="radio" name="rdTipoContaDeposito" value="Conta Poupança">Poupança
                    <input type="radio" name="rdTipoContaDeposito" value="Conta Corrente">Corrente:
                </td>
                <td><input type="text" name="txtContaDeposito" /></td>
                <td>Nº da conta para deposito.</td>
            </tr>
            <tr>
                <td>* Titular da Conta:</td>
                <td><input type="text" name="txtTitularDeposito" /></td>
                <td>Nome do titular da conta.</td>
            </tr>
        </table>
    </fieldset>
    <fieldset>
        <legend>Configuração dos Valores V.I.P.:</legend>
        <table>
            <tr>
                <td><input type="text" name="diasvip[]" size="5" />dias = </td>
                <td>R$<input type="text" name="valorvip[]" size="10" /></td>
                <td>(Caso nao queira colocar nenhum valor, deixe em branco)</td>
            </tr>
            <tr>
                <td><input type="text" name="diasvip[]" size="5" />dias = </td>
                <td>R$<input type="text" name="valorvip[]" size="10" /></td>
                <td>(Caso nao queira colocar nenhum valor, deixe em branco)</td>
            </tr>
            <tr>
                <td><input type="text" name="diasvip[]" size="5" />dias = </td>
                <td>R$<input type="text" name="valorvip[]" size="10" /></td>
                <td>(Caso nao queira colocar nenhum valor, deixe em branco)</td>
            </tr>
            <tr>
                <td><input type="text" name="diasvip[]" size="5" />dias = </td>
                <td>R$<input type="text" name="valorvip[]" size="10" /></td>
                <td>(Caso nao queira colocar nenhum valor, deixe em branco)</td>
            </tr>
            <tr>
                <td><input type="text" name="diasvip[]" size="5" />dias = </td>
                <td>R$<input type="text" name="valorvip[]" size="10" /></td>
                <td>(Caso nao queira colocar nenhum valor, deixe em branco)</td>
            </tr>
            <tr>
                <td><input type="text" name="diasvip[]" size="5" />dias = </td>
                <td>R$<input type="text" name="valorvip[]" size="10" /></td>
                <td>(Caso nao queira colocar nenhum valor, deixe em branco)</td>
            </tr>
            <tr>
                <td><input type="text" name="diasvip[]" size="5" />dias = </td>
                <td>R$<input type="text" name="valorvip[]" size="10" /></td>
                <td>(Caso nao queira colocar nenhum valor, deixe em branco)</td>
            </tr>
            <tr>
                <td><input type="text" name="diasvip[]" size="5" />dias = </td>
                <td>R$<input type="text" name="valorvip[]" size="10" /></td>
                <td>(Caso nao queira colocar nenhum valor, deixe em branco)</td>
            </tr>
            <tr>
                <td><input type="text" name="diasvip[]" size="5" />dias = </td>
                <td>R$<input type="text" name="valorvip[]" size="10" /></td>
                <td>(Caso nao queira colocar nenhum valor, deixe em branco)</td>
            </tr>
            <tr>
                <td><input type="text" name="diasvip[]" size="5" />dias = </td>
                <td>R$<input type="text" name="valorvip[]" size="10" /></td>
                <td>(Caso nao queira colocar nenhum valor, deixe em branco)</td>
            </tr>
        </table>
    </fieldset>
    <fieldset>
        <legend>* Configurações dos Valores ROP's:</legend>
        <table>
            <tr>
                <td><input type="text" name="qntrops[]" size="5" />ROP's = </td>
                <td>R$<input type="text" name="valorrops[]" size="10" /></td>
                <td>(Caso nao queira colocar nenhum valor, deixe em branco)</td>
            </tr>
            <tr>
                <td><input type="text" name="qntrops[]" size="5" />ROP's = </td>
                <td>R$<input type="text" name="valorrops[]" size="10" /></td>
                <td>(Caso nao queira colocar nenhum valor, deixe em branco)</td>
            </tr>
            <tr>
                <td><input type="text" name="qntrops[]" size="5" />ROP's = </td>
                <td>R$<input type="text" name="valorrops[]" size="10" /></td>
                <td>(Caso nao queira colocar nenhum valor, deixe em branco)</td>
            </tr>
            <tr>
                <td><input type="text" name="qntrops[]" size="5" />ROP's = </td>
                <td>R$<input type="text" name="valorrops[]" size="10" /></td>
                <td>(Caso nao queira colocar nenhum valor, deixe em branco)</td>
            </tr>
            <tr>
                <td><input type="text" name="qntrops[]" size="5" />ROP's = </td>
                <td>R$<input type="text" name="valorrops[]" size="10" /></td>
                <td>(Caso nao queira colocar nenhum valor, deixe em branco)</td>
            </tr>
            <tr>
                <td><input type="text" name="qntrops[]" size="5" />ROP's = </td>
                <td>R$<input type="text" name="valorrops[]" size="10" /></td>
                <td>(Caso nao queira colocar nenhum valor, deixe em branco)</td>
            </tr>
            <tr>
                <td><input type="text" name="qntrops[]" size="5" />ROP's = </td>
                <td>R$<input type="text" name="valorrops[]" size="10" /></td>
                <td>(Caso nao queira colocar nenhum valor, deixe em branco)</td>
            </tr>
            <tr>
                <td><input type="text" name="qntrops[]" size="5" />ROP's = </td>
                <td>R$<input type="text" name="valorrops[]" size="10" /></td>
                <td>(Caso nao queira colocar nenhum valor, deixe em branco)</td>
            </tr>
            <tr>
                <td><input type="text" name="qntrops[]" size="5" />ROP's = </td>
                <td>R$<input type="text" name="valorrops[]" size="10" /></td>
                <td>(Caso nao queira colocar nenhum valor, deixe em branco)</td>
            </tr>
            <tr>
                <td><input type="text" name="qntrops[]" size="5" />ROP's = </td>
                <td>R$<input type="text" name="valorrops[]" size="10" /></td>
                <td>(Caso nao queira colocar nenhum valor, deixe em branco)</td>
            </tr>
        </table>
    </fieldset>
    <fieldset>
        <legend>Configuração do usuário Administrador:</legend>
        <table>
            <tr>
                <td>* Nome:</td>
                <td><input type="text" name="txtNome" size="50" /></td>
                <td>Digite seu nome completo.</td>
            </tr>
            <tr>
                <td>* Login:</td>
                <td><input type="text" name="txtLogin" /></td>
                <td>Login de Acesso ao RagnaDonation. Mínimo de 5 máximo de 20 caracteres</td>
            </tr>
            <tr>
                <td>* Senha:</td>
                <td><input type="password" name="txtSenha" /></td>
                <td>Senha de Acesso ao RagnaDonation. Mínimo de 6 máximo de 12 caracteres</td>
            </tr>
            <tr>
                <td>* Re-Senha:</td>
                <td><input type="password" name="txtReSenha" /></td>
                <td>Repita a Senha de Acesso ao RagnaDonation</td>
            </tr>
            <tr>
                <td>* Email:</td>
                <td><input type="text" name="txtEmail" size="50" /></td>
                <td>Digite seu Email para Cadastro.</td>
            </tr>
        </table>
    </fieldset>
    <fieldset>
        <legend>Configuração para Envio de Emails:</legend>
        <table>
            <tr>
                <td>* Nome do seu Servidor:</td>
                <td><input type="text" name="txtNomeServidor" size="50" /></td>
                <td>Digite o nome do seu servidor ex: RagnaAlgumaCoisa - Blá blá blá.</td>
            </tr>
            <tr>
                <td>* Email do Servidor:</td>
                <td><input type="text" name="txtEmailServidor" size="50" /></td>
                <td>Crie uma conta no gmail para poder enviar os emails ou use uma que você ja tenha. <b>(OBS.: O envio de email é compativel apenas com o Gmail.)</b></td>
            </tr>
            <tr>
                <td>* Senha do Email:</td>
                <td><input type="password" name="txtSenhaEmailServidor" /></td>
                <td>Digite a senha do email que você criou ou que já possuia no Gmail aqui.</td>
            </tr>
        </table>
    </fieldset>
    <fieldset>
        <legend>Outras Configurações:</legend>
        <table>
            <tr>
                <td>* Mensagem de Boas Vindas:</td>
                <td><input type="text" name="txtMsgRagDon" value="Seja bem vindo ao RagnaDonation" size="50" /></td>
                <td>Digite uma mensagem de boas vindas para o seu RagnaDonation.</td>
            </tr>
        </table>
    </fieldset>
    <fieldset>
        <input type="reset" value="Limpar Campos" />
        <input type="submit" value="Instalar" /> - Todo o processo de instalação pode levar alguns minutos.
    </fieldset>
</form>

</body>
</html>