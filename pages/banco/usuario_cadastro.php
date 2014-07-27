<?php

$DADOS = (object) array(
                    'nome' => $_GET['nome'],
                    'codcidade' => $_GET['codcidade'],
                    'endereco' => $_GET['endereco'],
                    'bairro' => $_GET['bairro'],
                    'numero' => $_GET['numero'],
                    'fone01ddd' => $_GET['fone01ddd'],
                    'fone01num'=> $_GET['fone01num'],
                    'fone02ddd' => $_GET['fone02ddd'],
                    'fone02num' => $_GET['fone02num'],
                    'email' => $_GET['email'],
                    'datanascimento' => $_GET['datanascimento'],
                    'login' => $_GET['login'],
                    'senha' => $_GET['senha'],
                    'acao' => $_GET['acao'],
                    'codcliente' => $_SESSION['usuario']->codcliente
                  );
unset($_GET); unset($_POST);

$objCliente = new Cliente();
$objCliente->Dados($DADOS->codcidade, $DADOS->nome, $DADOS->endereco, $DADOS->bairro, $DADOS->numero, $DADOS->fone01ddd, $DADOS->fone01num, $DADOS->fone02ddd, $DADOS->fone02num, $DADOS->email, $DADOS->datanascimento, $DADOS->login, $DADOS->senha, $DADOS->codcliente, $DADOS->acao);
$rtn = $objCliente->Validar();

switch($rtn){
    case '0':{
        if($DADOS->acao == 'cadastrar'){
            echo '<span class="error">Erro ao tentar cadastrar usuário. Comunique esse erro ao webmaster do servidor ragnarok.</span>';
        }else if($DADOS->acao == 'atualizar'){
            echo '<span class="error">Erro ao tentar atualizar os dados do usuário. Comunique esse erro ao webmaster do servidor ragnarok.</span>';
        }
    break;
    }
    case '10':{
        if($DADOS->acao == 'cadastrar'){
            $objMail = new Email();
            $objMsg = new Mensagem();

            $envio = $objMail->setEnderecoEnvio($DADOS->email, $DADOS->nome)
                             ->setTituloEmail('Cadastro - Painel de Doacao '.$objMail->getNomeServidor())
                             ->setMensagemHTML($objMsg->getMensagemCadastro($objMail->getNomeServidor(), $DADOS->nome, $DADOS->login, $DADOS->senha))
                             ->enviar();
            if($envio){
                $msg = '<span class="complete">Email enviado com sucesso para <b>'.$DADOS->email.'</b></span>';
            }else{
                $msg = '<span class="error">Erro ao enviar dados para o email: '.$DADOS->email.'</span>';
            }

            echo $msg.'<span class="complete">Cadastro realizado com sucesso!!</span>';
        }else if($DADOS->acao == 'atualizar'){
            $objMail = new Email();
            $objMsg = new Mensagem();

            $envio = $objMail->setEnderecoEnvio($DADOS->email, $DADOS->nome)
                             ->setTituloEmail('Atualizacao de Cadastro - Painel de Doacao '.$objMail->getNomeServidor())
                             ->setMensagemHTML($objMsg->getMensagemAtualizacaoCadastro($objMail->getNomeServidor(), $DADOS->nome, $DADOS->login, $DADOS->senha))
                             ->enviar();
            if($envio){
                $msg = '<span class="complete">Email enviado com sucesso para <b>'.$DADOS->email.'</b></span>';
            }else{
                $msg = '<span class="error">Erro ao enviar dados para o email: '.$DADOS->email.'</span>';
            }
            
            echo $msg.'<span class="complete">Dados Atualizados com sucesso!!</span>';
        }
    break;
    }
    case '1':{
        echo '<span class="error">Erro ao tentar validar dados. Possivelmente você está tentando fazer algo indevido ao sistema _|_ kkkkkkkkkkkk.</span>';
    break;
    }
    case '2':{
        if($DADOS->acao == 'atualizar' && empty($DADOS->codcliente)) :
                echo '<span class="alert">Sua sessão expirou. Efetue o login e tente novamente!!<span>';
        else :
            echo '<span class="error">FUCK YOU!!! - Você ta tentando fazer merda, mais aqui não tatu, aqui é azulejo kkkkkkk   _|_ !!</span>';
        endif;
    break;
    }
    case '3':{
        echo '<span class="alert">Email já cadastrado na nossa base de dados!!</span>';
    break;
    }
    case '4':{
        echo '<span class="alert">Login já está sendo utilizado!!</span>';
    break;
    }
    default:{
        echo '<span class="alert">FATAL ERROR - ERRO INESPERADO NO SERVIDOR!! - Comunique esse erro ao webmaster do servidor ragnarok.</span>';
    break;
    }
}
unset($objCliente);
unset($DADOS);
?>
