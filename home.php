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
<script type="text/javascript" src="scripts/fw/jquery-1.4.2.js"></script>
<script type="text/javascript" src="scripts/plugins/arredonda_cantos.js"></script>
<script type="text/javascript" src="scripts/plugins/arredonda_excanvas.js"></script>
<script type="text/javascript" src="scripts/plugins/jquery.maskedinput-1.2.2.js"></script>
<script type="text/javascript" src="scripts/plugins/mascara.js"></script>
<script type="text/javascript" src="scripts/plugins/prince_format.js"></script>
<script type="text/javascript" src="scripts/another/funcoes.js"></script>
<script type="text/javascript" src="scripts/another/requisicao.js"></script>
<script type="text/javascript" src="scripts/another/acao.js"></script>
<script type="text/javascript" src="scripts/forms/clientes.js"></script>
<script type="text/javascript" src="scripts/forms/doacao.js"></script>
<script type="text/javascript" src="scripts/forms/vip_donate.js"></script>
<style type="text/css">
<!--
@import url('styles/estrutura.css');
-->
</style>
</head>
<body class="bghome">

<div id="topo"></div>
<div class="formLoginSistema">
    <form name="formLogarSistema" id="formLogarSistema" onSubmit="return LogarSistema(this);" method="post" action="pages/pageController.php?doc=pagina&pagina=login">
        <input type="button" id="btnRelogio">
        Login:<input type="text" name="txtLogin" id="txtLogin">Senha:<input type="password" name="txtSenha" id="txtSenha">
        <input type="submit" value="Logar >>">
    </form>
</div>
<div class="status">
    <?php
    if(isset($_SESSION['usuario']))
        include 'db/log/usuario.php';
    ?>
</div>
<div id="mensagem"></div>
<div id="corpo">
	<div id="menu">
            <?php
            if(isset($_SESSION['usuario'])) :
            switch($_SESSION['usuario']->tipo){
                case '1':{
                    include 'pages/menu/user.php';
                break;
                }
                case '2':{
                    include 'pages/menu/adm.php';
                break;
                }
                default:{
                    include 'pages/menu/visit.php';
                break;
                }
            }
            else :
                include 'pages/menu/visit.php';
            endif;
            ?>
        </div>
	<div id="loading"><img src="images/carregando.gif" alt="Carregando Requisição Aguarde.." title="Carregando Requisição Aguarde..."></div>
        <div class="msg">
            <?php
                if(isset($_SESSION['mensagem'])) :
                    echo $_SESSION['mensagem'];
                    unset($_SESSION['mensagem']);
                endif;
            ?>
        </div>
	<div id="centro"></div>
</div>

<br class="apagar">
<div id="comunidades">
	<a href="#" target="_blank"><img src="images/orkut.png" alt="Participe da nossa comunidade no Orkut"></a>Orkut,
	<a href="#" target="_blank"><img src="images/facebook.png" alt="Torne-se no Facebook"></a>Facebook,
	<a href="#" target="_blank"><img src="images/twitter.png" alt="Siga nos no Twitter"></a>Twitter.

        <!-- INICIO FORMULARIO BOTAO PAGSEGURO -->
<form target="pagseguro" action="https://pagseguro.uol.com.br/checkout/v2/donation.html" method="post">
<input type="hidden" name="receiverEmail" value="mr.eduardosantos@gmail.com" />
<input type="hidden" name="currency" value="BRL" />
<input type="image" src="https://p.simg.uol.com.br/out/pagseguro/i/botoes/doacoes/120x53-doar.gif" name="submit" alt="Pague com PagSeguro - é rápido, grátis e seguro!" />
</form>
<!-- FINAL FORMULARIO BOTAO PAGSEGURO -->

</div>
<div id="direitos">
	Criado e desenvolvido por <b>E³ Software - www.e3software.com.br</b>. Todos os direitos reservados.<br>
	Ragnadonation Versão 1.3.2
</div>
</body>
</html>