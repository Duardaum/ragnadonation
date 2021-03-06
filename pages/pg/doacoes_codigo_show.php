<table class="tb_show">
    <?php
    $coddoacao = $_GET['coddoacao'];
    $objDoacao = new Busca();
    $rtn = $objDoacao->DoacoesCodigo($coddoacao);
    if($rtn != 0){
        while($Doacao = mysql_fetch_object($rtn)) :
            switch($Doacao->tipo){
                case '1':{
                    $img_tipo = '<img src="images/vip.png" alt="Doação VIP" title="Doação VIP">';
                break;
                }
                case '2':{
                    $img_tipo = '<img src="images/donate.png" alt="Doação tipo Donate" title="Doação tipo Donate">';
                break;
                }
            }

            switch($Doacao->status){
                case '0':{
                    $img_status = '<a href="#" onclick="return DeletaDoacao(\'<?=$Doacao->coddoacao?>\');"><img src="images/delete.png" alt="Deletar Requisição de VIP/Donate" title="Deletar Requisição de VIP/Donate"></a>';
                break;
                }
                case '1':{
                    $img_status = '<img src="images/aprovado.png" alt="Doação Aprovada" title="Doação Aprovada">';
                break;
                }
                case '2':{
                    $img_status = '<img src="images/usado.png" alt="Doação já Utilizada" title="Doação já Utilizada">';
                break;
                }
            }
    ?>
    <tr >
        <td class="linha" colspan="6"></td>
    </tr>
    <tr>
        <td class="titulo">Código:</td>
        <td class="input"><?=$Doacao->coddoacao?></td>
        <td class="titulo">I.P.:</td>
        <td class="input"><?=$Doacao->ip?></td>
        <td class="titulo">Valor $:</td>
        <td class="input"><?=number_format($Doacao->valor, 2, ',', '.')?></td>
    </tr>
    <tr>
        <td class="titulo">Hora Comprovante:</td>
        <td class="input" colspan="2"><?=InverteDataBanco($Doacao->dia_doacao)?> às <?=$Doacao->hora_doacao?></td>
        <td class="titulo">Hora Sistema:</td>
        <td class="input" colspan="2"><?=$Doacao->dia?></td>
    </tr>
    <tr>
        <td class="titulo">Tipo:</td>
        <td class="input" colspan="2"><?=$img_tipo?></td>
        <td class="titulo">Status:</td>
        <td class="input" colspan="2"><?=$img_status?></td>
    </tr>
    <tr>
        <td class="titulo">Mensagem:</td>
        <td class="input" colspan="5"><?=nl2br($Doacao->mensagem)?></td>
    </tr>
    <tr >
        <td class="linha" colspan="6"></td>
    </tr>
    <br />
    <?php
        endwhile;
    }else{
        echo '<span class="alert">Nenhuma doação encontrada com o código especificado!!</span>';
    }
    ?>
</table>
