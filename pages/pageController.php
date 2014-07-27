<?php
ob_start();
session_start();
require_once '../db/models/index.php';

$method = $_SERVER['REQUEST_METHOD'];

if($method == 'GET' && !empty($_GET)){
    $doc = $_GET['doc'];
    switch($doc){
        case 'menu':{
            $pg = $_GET['pagina'];

            switch($pg){
                case 'publico':{
                    include 'menu/visit.php';
                break;
                }
                case 'usuario':{
                    include 'menu/user.php';
                break;
                }
                case 'administrator':{
                    include 'menu/adm.php';
                break;
                }
                case 'welcome':{
                    include '../db/config/welcome.php';
                break;
                }
                default:{
                    include_once '../db/error/404.php';
                break;
                }
            break;
            }
        break;
        }
        case 'pagina':{
            $pg = $_GET['pagina'];
            switch($pg){
                case 'cadastro':{
                    include 'forms/cadastro.php';
                break;
                }
                case 'meus_dados':{
                    if(!isset($_SESSION['usuario']->codcliente)) :
                        $_SESSION['mensagem'] = '<span class="alert">Sua sessão expirou. Efetue o login novamente.</span>';
                        header("LOCATION: ../db/log/loggout.php");
                    else :
                        include 'forms/cadastro.php';
                    endif;
                break;
                }
                case 'doar':{
                    include 'forms/doacao.php';
                break;
                }
                case 'add_vip':{
                    include 'forms/add_vip.php';
                break;
                }
                case 'add_don':{
                    include 'forms/add_donate.php';
                break;
                }
                case 'usuario':{
                    if(!isset($_SESSION['usuario']->codcliente)) :
                        echo '<span class="alert">Sua sessão expirou. Efetue o login novamente!!</span>';
                    elseif($_SESSION['usuario']->codcliente == '1') :
                        include 'forms/usuario.php';
                    else :
                        echo '<span class="alert">Apenas o usuário administrador tem permissão para acessar essa sessão!!</span>';
                    endif;
                break;
                }
                case 'recupera_senha':{
                    include 'forms/recupera_senha.php';
                break;
                }
                case 'relatorio':{
                    include 'forms/relatorio.php';
                break;
                }
                case 'comodoar':{
                    include '../db/config/who.php';
                break;
                }
                case 'sobre':{
                    include 'pg/sobre.php';
                break;
                }
                case 'statusdoacao':{
                    include 'pg/doacoes_status.php';
                break;
                }
                case 'doacoes_all':{
                    include 'pg/doacoes_all.php';
                break;
                }
                case 'doacoes_cod':{
                    include 'pg/doacoes_codigo.php';
                break;
                }
                case 'doacoes_cod_show':{
                    include 'pg/doacoes_codigo_show.php';
                break;
                }
                case 'loggout':{
                    include '../db/log/loggout.php';
                break;
                }
                default:{
                    include '../db/error/404.php';
                break;
                }
            }
        break;
        }
        case 'banco':{
            $pg = $_GET['pagina'];
            switch($pg){
                case 'cadastro_usuario':{
                    include 'banco/usuario_cadastro.php';
                break;
                }
                case 'permissao_usuario':{
                    include 'banco/usuario_permissao.php';
                break;
                }
                case 'doacao_usuario':{
                    include 'banco/usuario_doacao.php';
                break;
                }
                case 'doacoes_del':{
                    include 'banco/doacao_deleta.php';
                break;
                }
                case 'vip_add':{
                    include 'banco/add_vip.php';
                break;
                }
                case 'don_add':{
                    include 'banco/add_donante.php';
                break;
                }
                case 'recuperar_senha':{
                    include 'banco/back_pwd.php';
                break;
                }
                case 'relatorio':{
                    include 'banco/relatorio.php';
                break;
                }
                default:{
                    include '../db/error/500.php';
                break;
                }
            }
        break;
        }
        case 'cbo':{
            $pg = $_GET['pagina'];
            switch($pg){
                case 'estados':{
                    include 'cbo/estados.php';
                break;
                }
                default:{
                    include '../db/error/500.php';
                break;
                }
            }
        break;
        }
        default:{
            include '../db/error/500.php';
        break;
        }
    }
}else if($method == 'POST' && !empty($_POST)){

    $doc = $_GET['doc'];
    switch($doc){
        case 'pagina':{
            $pg = $_GET['pagina'];

            switch($pg){
                case 'login':{
                    include '../db/log/login.php';
                break;
                }
                default:{
                    include '../db/error/500.php';
                break;
                }
            }
        break;
        }
        default:{
            include '../db/error/500.php';
        break;
        }
    }
}else{
    include '../db/error/13.php';
}
?>
