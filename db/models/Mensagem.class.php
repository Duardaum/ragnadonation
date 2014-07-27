<?php
final class Mensagem {

    public function getMensagemCadastro($servidor, $usuario, $login, $senha){
        $msg =
        '
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
        </head>
        <body>
            <h2>'.$servidor.' diz: Obrigado!!</h2>

            Agradecemos a voce <b>'.$usuario.'</b>, por se cadastrar no nosso painel  RagnaDonation.<br /><br />

            Dados do seu cadastro:<br /><br />

            <strong>Login:</strong> '.$login.';<br />
            <strong>Senha:</strong> '.$senha.'.<br /><br />

            Visite nosso painel clicando <a href="'.$_SERVER['HTTP_REFERER'].'">AQUI</a>.<br /><br />

            <div style="text-align: center; font-size: 10px;">
                Nao responda este email pois ele foi enviado automaticamente.
                <hr />
                '.$servidor.' - Todos os Direitos Reservados. <a href="mailto:juniorbombardao@hotmail.com">RagnaDonation</a>
            </div>
        </body>
        </html>
        ';

    return $msg;
    }

    public function getMensagemAtualizacaoCadastro($servidor, $usuario, $login, $senha){
    $msg =
        '
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
        </head>
        <body>
            <h2>'.$servidor.' - Atualizacao de Dados</h2>

            Dados do seu cadastro atualizados:<br /><br />

            <strong>Login:</strong> '.$login.';<br />
            <strong>Senha:</strong> '.$senha.'.<br /><br />
            
            Visite nosso painel clicando <a href="'.$_SERVER['HTTP_REFERER'].'">AQUI</a>.<br /><br />

            <div style="text-align: center; font-size: 10px;">
                Nao responda este email pois ele foi enviado automaticamente.
                <hr />
                '.$servidor.' - Todos os Direitos Reservados. <a href="mailto:juniorbombardao@hotmail.com">RagnaDonation</a>
            </div>
        </body>
        </html>
        ';

    return $msg;
    }

    public function getMensagemRecuperacaoSenha($servidor, $login, $senha){
    $msg =
        '
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
        </head>
        <body>
            <h2>'.$servidor.' - Recuperacao de senha</h2>

            <strong>Login:</strong> '.$login.';<br />
            <strong>Senha:</strong> '.$senha.'.<br /><br />

            Para acessar o painel clique <a href="'.$_SERVER['HTTP_REFERER'].'">AQUI</a>.<br /><br />

            <div style="text-align: center; font-size: 10px;">
                Nao responda este email pois ele foi enviado automaticamente.
                <hr />
                '.$servidor.' - Todos os Direitos Reservados. <a href="mailto:juniorbombardao@hotmail.com">RagnaDonation</a>
            </div>
        </body>
        </html>
        ';

    return $msg;
    }

    public function getMensagemDoacao($servidor, $valor, $tipo){
        if($tipo == '1') :
            $tp = 'VIP';
        else :
            $tp = 'DONATION';
        endif;
    $msg =
        '
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
        </head>
        <body>
            <h2>'.$servidor.' - Doação</h2>

            Uma nova Doação foi feita em seu servidor dia <b>'.date('d-m-Y H:i:s').'</b>.<br /><br />
                
            Valor da Doação: R$ '.$valor.'.<br />
            Tipo da Doação: '.$tp.'.<br /><br />

            Para acessar o painel clique <a href="'.$_SERVER['HTTP_REFERER'].'">AQUI</a>.<br /><br />

            <div style="text-align: center; font-size: 10px;">
                Nao responda este email pois ele foi enviado automaticamente.
                <hr />
                '.$servidor.' - Todos os Direitos Reservados. <a href="mailto:juniorbombardao@hotmail.com">RagnaDonation</a>
            </div>
        </body>
        </html>
        ';

    return $msg;
    }

    public function getMsgCriacaoServidor($nome_servidor){
        $msg =
        '
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
        </head>
        <body>
            <h2>RagnaDonation - Novo usuario</h2>

            Um novo usuário acabou de configurar o Ragnadonation em seu servidor.<br /><br />

            Nome do Servidor: <strong>'.$nome_servidor.'</strong><br /><br />
            Link do painel do novo usuario: Clique <a href="'.$_SERVER['HTTP_REFERER'].'">AQUI</a><br />
            Endereco I.P. do Servidor: <strong>'.$_SERVER['REMOTE_ADDR'].'</strong><br /><br />

            <div style="text-align: center; font-size: 10px;">
                Nao responda este email pois ele foi enviado automaticamente.
                <hr />
                Todos os Direitos Reservados. <a href="mailto:juniorbombardao@hotmail.com">RagnaDonation</a>
            </div>
        </body>
        </html>
        ';

    return $msg;
    }

    public function getMsgCriacaoCliente(){
        $msg =
        '
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
        </head>
        <body>
            <h2>RagnaDonation - Obrigado!!</h2>

            Agradecemos a sua preferencia por nos escolher como sua ferramenta de gerenciamento <br />
            de doacoes para o seu servidor ragnarok.<br /><br />

            Esperamos que usurfrua bem de nossa ferramenta.<br /><br />

            <string>Suporte Comercial:</strong><br /><br />
            MSN: <strong>juniorbombardao@hotmail.com</strong><br />
            Email: <strong>eduardosistec@globo.com</strong><br /><br />

            <div style="text-align: center; font-size: 10px;">
                Nao responda este email pois ele foi enviado automaticamente.
                <hr />
                Todos os Direitos Reservados. <a href="mailto:juniorbombardao@hotmail.com">RagnaDonation</a>
            </div>
        </body>
        </html>
        ';

    return $msg;
    }
}