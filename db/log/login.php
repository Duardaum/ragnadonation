<?php

$DADOS = (object) array(
                        'login' => $_POST['txtLogin'],
                        'senha' => $_POST['txtSenha']
                    );

$objUsuario = new Usuario();
$rtn = $objUsuario->Autenticar($DADOS->login, $DADOS->senha);
switch($rtn){
    case '0':{
        $_SESSION['mensagem'] = '<span class="error">Login ou senha não cadastrados na nossa base de dados.</span>';
        header("LOCATION: ../home.php");
    break;
    }
    case '1':{
        unset($_SESSION['usuario']);
        $_SESSION['mensagem'] = '<span class="error">Tentando fazer merda no sistema FDP???  kkkkkkkkkkkkkk   _|_</span>';
        header("LOCATION: ../home.php");
    break;
    }
    default:{
        $_SESSION['usuario'] = mysql_fetch_object($rtn);
        header("LOCATION: ../home.php");
    break;
    }
}
unset($objUsuario);
unset($_POST);
?>
