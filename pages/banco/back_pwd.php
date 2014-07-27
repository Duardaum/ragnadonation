<?php

$DADOS = (object) array(
                        'login' => $_GET['login'],
                        'email' => $_GET['email']
                        );

$objPwd = new Usuario();
$rtn = $objPwd->RecuperaSenha($DADOS->login, $DADOS->email);
switch($rtn){
    case '0':{
        echo '<span class="error">Erro ao tentar verificar existencia de cadastro na base de dados!!</span>';
    break;
    }
    case '1':{
        echo '<span class="error">Erro ao tentar validar dados. Possivelmente você está tentando fazer merda no sistema _|_ kkkkkkkkkkkkkkk</span>';
    break;
    }
    case '2':{
        echo '<span class="alert">Login ou Email não cadastrado na nossa base de dados ou incompativeis!!</span>';
    break;
    }
    default:{
        $objMail = new Email();
        $objMsg = new Mensagem();

        $envio = $objMail->setEnderecoEnvio($DADOS->email, $_SESSION['usuario']->nome)
                         ->setTituloEmail('Recuperacao de Senha - Painel de Doacao '.$objMail->getNomeServidor())
                         ->setMensagemHTML($objMsg->getMensagemRecuperacaoSenha($objMail->getNomeServidor(), $rtn->login, $rtn->senha))
                         ->enviar();
        if($envio){
            $msg = '<span class="complete">Email enviado para <b>'.$DADOS->email.'</b> com os dados.</span>';
        }else{
            $msg = '<span class="error">Erro ao enviar dados para o email: '.$DADOS->email.'</span>';
        }

        echo $msg;
    break;
    }
}
unset($objPwd);
unset($DADOS);
?>