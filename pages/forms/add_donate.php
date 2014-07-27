<h2>Adicionar Donante (ROP's) a conta</h2>
<h3>Todos os campos marcados com asterisco (*) são obrigatórios </h3>

<form name="formAddVip" id="formAddVip" onsubmit="return AddDonante(this);">
    <fieldset>
        <legend>Adicionar ROP's.</legend>
    <table>
        <tr>
            <td class="titulo">*Cod. Doação:</td>
            <td class="input"><input type="text" name="txtCodDoacao" id="txtCodDoacao"></td>
            <td class="descricao">Código da doação VIP que deseja adicionar os dias V.I.P.</td>
        </tr>
        <tr>
            <td class="titulo">*Quantidade de ROP's:</td>
            <td class="input"><input type="text" name="txtRops" id="txtRops"></td>
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