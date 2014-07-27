<?php

$DADOS = (object) array(
                        'login' => $_GET['login'],
                        'nivel' => $_GET['nivel']
                        );

$objUsuario = new Usuario();
$rtn = $objUsuario->Permissao($DADOS->login, $DADOS->nivel);
switch($rtn){
    case '0':{
        echo '<span class="error">Erro ao tentar alterar nível de permissão do usuário</span>';
    break;
    }
    case '1':{
        echo '<span class="error">Erro ao tentar validar dados. Possivelmente você deve esta tentando fazer merda no sistema _|_ kkkkkkkkkkkk!!</span>';
    break;
    }
    case '2':{
        echo '<span class="alert">Login não cadastrados na nossa base de dados!!</span>';
    break;
    }
    case '3':{
        echo '<span class="alert">Usuário padrão não pode ser modificado!!</span>';
    break;
    }
    case '10':{
        echo '<span class="complete">Nível de permissão alterado com sucesso!!</span>';
    break;
    }
    default:{
        echo '<span class="alert">FATAL ERROR - Erro inesperado. Comunique esse erro ao webmaster do servidor ragnarok.</span>';
    break;
    }
}
unset($objUsuario);
unset($DADOS);
?>
