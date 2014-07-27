<h2>Relatório das doações feitas</h2>
<h3>Todos os campos marcados com asterisco (*) são obrigatórios </h3>

<form name="formRelatorio" id="formRelatorio" onsubmit="return Relatorio(this);">
    <fieldset>
        <legend>Buscar</legend>
    <table>
        <tr>
            <td class="titulo">* Data Inicial:</td>
            <td class="input"><input type="text" name="txtData01" id="txtData01"></td>
            <td class="descricao">Data de início da busca</td>
        </tr>
        <tr>
            <td class="titulo">* Data Final:</td>
            <td class="input"><input type="text" name="txtData02" id="txtData02"></td>
            <td class="descricao">Data final da busca</td>
        </tr>
        <tr>
            <td colspan="3" class="btnForm">
                <input type="reset" value="Limpar Tudo <<">
                <input type="submit" value="Buscar Dados >>">
            </td>
        </tr>
    </table>
    </fieldset>
</form>

<div class="relatorio"></div>

<script type="text/javascript">
<!--
$(document).ready(Mascaras);
-->
</script>