<?php

$coddoacao = $_GET['coddoacao'];

$objDoacao = new Doacao();

$rtn = $objDoacao->Deletar($coddoacao);
switch($rtn){
    case '0':{
        echo '<span class="error">Erro ao tentar deletar doação. Tente novamente Posteriormente. </span>';
    break;
    }
    case '10':{
        echo '<span class="complete">Doação deletada com sucesso!!</span>';
    break;
    }
    default:{
        include '../db/error/500.php';
    break;
    }
}
unset($objDoacao);
?>
