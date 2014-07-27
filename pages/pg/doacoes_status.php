<h2>Doações Realizadas</h2>

<strong>Legenda:</strong><br />
<img src="images/aguardando.png" alt="Aguardando aprovação da STAFF" title="Aguardando aprovação da STAFF">: Aguardando Aprovação;<br />
<img src="images/aprovado.png" alt="Doação Aprovada" title="Doação Aprovada">: Doação Aprovada pela STAFF;<br />
<img src="images/usado.png" alt="Código Utilizado" title="Código Utilizado">: Código Ativado pelo Usuário.<br /><br />

<?php $TITULO = array('Cod.', 'Dia', 'Hora', 'Tipo', 'Cod. Ativação', 'Valor $', 'Status', 'Registro'); ?>
<table class="tb_show">
    <thead>
    <?php
    foreach($TITULO as $titulo ){
        echo '<th>'.$titulo.'</th>';
    }
    ?>
    </thead>
    <tbody>
        <?php
        $objDoacao = new Busca();
        $rtn = $objDoacao->Doacoes($_SESSION['usuario']->codcliente);

        if($rtn != 0){
            while($Doacao = mysql_fetch_object($rtn)) :
                switch($Doacao->status){
                    case '0':{
                        $img = '<img src="images/aguardando.png" alt="Aguardando aprovação da STAFF" title="Aguardando aprovação da STAFF">';
                    break;
                    }
                    case '1':{
                        $img = '<img src="images/aprovado.png" alt="Doação Aprovada" title="Doação Aprovada">';
                    break;
                    }
                    case '2':{
                        $img = '<img src="images/usado.png" alt="Código Utilizado" title="Código Utilizado">';
                    break;
                    }
                }

                switch($Doacao->tipo){
                    case '1':{
                        $img_tipo = '<img src="images/vip.png" alt="Doação para receber VIP" alt="Doação para receber VIP">';
                    break;
                    }
                    case '2':{
                        $img_tipo = '<img src="images/donate.png" alt="Doação para receber VIP" alt="Doação para receber VIP">';
                    break;
                    }
                }
        ?>
        <tr>
            <td><?=$Doacao->coddoacao?></td>
            <td><?=InverteDataBanco($Doacao->dia_doacao)?></td>
            <td><?=$Doacao->hora_doacao?></td>
            <td><?=$img_tipo?></td>
            <td><?=$Doacao->cod_ativacao?></td>
            <td><?=number_format($Doacao->valor, 2, ',', '.')?></td>
            <td><?=$img?></td>
            <td><?=InverteDataBanco($Doacao->dia)?></td>
        </tr>
        <?php
            endwhile;
        }
        ?>
    </tbody>
    <tfoot>
    <?php
    foreach($TITULO as $titulo ){
        echo '<th>'.$titulo.'</th>';
    }
    ?>
    </tfoot>
</table>

