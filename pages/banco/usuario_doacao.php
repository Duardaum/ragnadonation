<?php

if(empty($_SESSION['usuario'])) :
    $_SESSION['mensagem'] = '<span class="alert">Sua sessão expirou. Efetue o login novamente!!</span>';
    header("LOCATION: ../db/log/loggout.php");
endif;

$DADOS = (object) array(
                        'dia_doacao' => $_GET['dia_doacao'],
                        'hora_doacao' => $_GET['hora_doacao'],
                        'tipo_doacao' => $_GET['tipo_doacao'],
                        'valor' => $_GET['valor'],
                        'char_doador' => $_GET['char_doador'],
                        'char_receptor' => $_GET['char_receptor'],
                        'char_receptor_login' => $_GET['char_receptor_login'],
                        'mensagem' => $_GET['mensagem'],
                        'codcliente' => $_SESSION['usuario']->codcliente
                        );

$objDoacao = new Doacao();
$objDoacao->Dados($DADOS->dia_doacao, $DADOS->hora_doacao, $DADOS->tipo_doacao, $DADOS->valor, $DADOS->char_doador, $DADOS->char_receptor, $DADOS->char_receptor_login, $DADOS->mensagem, $DADOS->codcliente);
$rtn = $objDoacao->Validar();

switch($rtn){
    case '1':{
        echo '<span class="error">Erro ao tentar validar dados. Possivelmente você está tentando fazer algo indevido ao sistema _|_ .</span>';
    break;
    }
    case '2':{
        echo '<span class="alert">Não existe nenhuma conta com esse login registrada!!</span>';
    break;
    }
    case '0':{
        echo '<span class="error">Erro ao tentar efetuar doação. Comunique esse erro ao webmaster do servidor ragnarok.</span>';
    break;
    }
    case '10':{
        $objMail = new Email();
        $objMsg = new Mensagem();

        $objMail->setEnderecoEnvio($objMail->getEmailServidor(), $objMail->getNomeServidor())
                ->setTituloEmail('Nova Doacao - Painel de Doacao '.$objMail->getNomeServidor())
                ->setMensagemHTML($objMsg->getMensagemDoacao($objMail->getNomeServidor(), $DADOS->valor, $DADOS->tipo_doacao))
                ->enviar();
            
        echo '<span class="complete">Doação realizada com sucesso. Aguarde a confirmação de sua doação pela STAFF do servidor.</span>';
    break;
    }
    default:{
        echo '<span class="alert">FATAL ERROR - ERRO INESPERADO NO SERVIDOR!! - Comunique esse erro ao webmaster do servidor ragnarok.</span>';
    break;
    }
}
unset($objDoacao);
unset($DADOS);
unset($_GET);
?>
