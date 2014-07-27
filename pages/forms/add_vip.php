<h2>Adicionar dias V.I.P. a conta</h2>
<h3>Todos os campos marcados com asterisco (*) são obrigatórios </h3>

<form name="formAddVip" id="formAddVip" onsubmit="return AddVip(this);">
    <fieldset>
        <legend>Adicionar V.I.P.</legend>
    <table>
        <tr>
            <td class="titulo">*Cod. Doação:</td>
            <td class="input"><input type="text" name="txtCodDoacao" id="txtCodDoacao"></td>
            <td class="descricao">Código da doação VIP que deseja adicionar os dias V.I.P.</td>
        </tr>
        <tr>
            <td class="titulo">*Dias V.I.P.:</td>
            <td class="input"><input type="text" name="txtDiasVip" id="txtDiasVip"></td>
            <td class="descricao">Nº de dias V.I.P. que desejas adicionar.</td>
        </tr>
        <tr>
            <td colspan="3" class="btnForm">
                <input type="reset" value="Limpar Tudo <<">
                <input type="submit" value="Submeter Dados >>">
            </td>
        </tr>
    </table>
    </fieldset>
</form>