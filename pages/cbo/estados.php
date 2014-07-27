<?php
$uf = $_GET['uf'];
$objCidade = new Busca();
$rtn = $objCidade->Cidades($uf);
?>
<optgroup label="Selecione sua cidade">
    <option value="" selected="selected">...</option>
    <?php while($Cidade = mysql_fetch_object($rtn)) : ?>
    <option value="<?=$Cidade->codcidade?>"><?=utf8_encode($Cidade->nome)?></option>
    <?php endwhile; ?>
</optgroup>