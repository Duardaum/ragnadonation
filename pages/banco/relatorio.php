<?php

$DADOS = (object) array(
                        'data_inicial' => $_GET['data_inicial'],
                        'data_final' => $_GET['data_final']
                        );

$objRelatorio = new Busca();
$rtn = $objRelatorio->Relatorio($DADOS->data_inicial, $DADOS->data_final);

$TITULO = array('Cod. Doação', 'Dia', 'Hora', 'Tipo', 'Valor $');
?>
<table>
    <thead>
    <?php
    foreach($TITULO as $titulo){
        echo '<th>'.$titulo.'</th>';
    }
    ?>
    </thead>
    <tbody>
        <?php
        if($rtn > '1'):
            $vlrtt = (float) "0";
            while($Relatorio = mysql_fetch_object($rtn)) :
                $vlrtt = (float) $vlrtt + (float) $Relatorio->valor;

                switch($Relatorio->tipo){
                    case '1':{
                        $img_tipo = '<img src="images/vip.png" alt="Doação VIP" title="Doação VIP">';
                    break;
                    }
                    case '2':{
                        $img_tipo = '<img src="images/donate.png" alt="Doação Donante" title="Doação Donante">';
                    break;
                    }
                }
        ?>
        <tr>
            <td><?=$Relatorio->coddoacao?></td>
            <td><?=InverteDataBanco($Relatorio->dia)?></td>
            <td><?=$Relatorio->hora?></td>
            <td><?=$img_tipo?></td>
            <td><?=number_format($Relatorio->valor, 2, ',', '.')?></td>
        </tr>
        <?php
            endwhile;
        endif;
        ?>
        <tr>
            <td colspan="4" class="titulo">Total Geral R$:</td>
            <td class="input"><?=number_format($vlrtt, 2, ',', '.')?></td>
        </tr>
    </tbody>
    <tfoot>
    <?php
    foreach($TITULO as $titulo){
        echo '<th>'.$titulo.'</th>';
    }
    ?>
    </tfoot>
</table>
<br />
<?php
if($rtn == '0') {
    echo '<span class="alert">Nenhuma doação encontrada neste período!!</span>';
}else if($rtn == '1'){
    echo '<span class="error">Erro ao validar dados. Possivelmente você deve está tentando fazer merda no sistema _|_ kkkkkkkkkkkk</span>';
}
?>
<br /><br />