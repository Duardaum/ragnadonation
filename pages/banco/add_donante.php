<?php

$coddoacao = $_GET['coddoacao'];
$qnt_rops = $_GET['rops'];

$objDon = new VipDonante();

$objDon->DadosDon($coddoacao, $qnt_rops);
$rtn = $objDon->ValidaDon();
switch($rtn){
    case '0':{
        echo '<span class="error">Erro ao tentar aprovar doação de ROP\'s/Donante. ao cliente. Possivelmente não seja uma doação de ROP\'s/Donante!!</span>';
    break;
    }
    case '1':{
        echo '<span class="error">Erro ao tentar validar dados. Possivelmente você deve está tentando fazer merda no sistema _|_ kkkkkkkkkk</span>';
    break;
    }
    case '2':{
        echo '<span class="alert">Não existe nenhuma doação com esse código!!</span>';
    break;
    }
    case '3':{
       echo '<span class="alert">Doação já aprovada!!</span>';
    break;
    }
    case '4':{
        echo '<span class="alert">Essa doação não é uma doação para a obtenção de ROP\'s. Verifique se é uma doação V.I.P..!!</span>';
    break;
    }
    case '10':{
        echo '<span class="complete">Doação de ROP\'s/Donante ativada com sucesso!!</span>';
    break;
    }
    default:{
        echo '<span class="alert">FATAL ERROR - Erro inesperado. Comunique esse erro ao webmaster do servidor !!</span>';
    break;
    }
}
unset($objDon);
?>
