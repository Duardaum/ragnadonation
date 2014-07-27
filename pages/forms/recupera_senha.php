<h2>Recupere sua Senha</h2>
<h3>Todos os campos marcados com asterisco (*) são obrigatórios </h3>

<form name="formRecuperaSenha" id="formRecuperaSenha" onsubmit="return RecuperaSenha(this);">
    <fieldset>
        <legend>Recuperar Senha</legend>
    <table>
        <tr>
            <td class="titulo">* Login:</td>
            <td class="input"><input type="text" name="txtLogin" id="txtLogin"></td>
            <td class="descricao">Digite o login da sua conta</td>
        </tr>
        <tr>
            <td class="titulo">* Email:</td>
            <td class="input"><input type="text" name="txtEmail" id="txtEmail"></td>
            <td class="descricao">Digite o email da sua conta</td>
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