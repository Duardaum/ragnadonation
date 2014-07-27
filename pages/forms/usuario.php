<h2>Alterar Usuário do Sistema</h2>
<h3>Todos os campos marcados com asterisco (*) são obrigatórios</h3>

<form name="formAddPermissao" id="formAddPermissao" onsubmit="return AddPermissao(this);">
    <fieldset>
        <legend>Adicionar/Remover Permissão do usuário</legend>
    <table>
        <tr>
            <td class="titulo">*Login:</td>
            <td class="input"><input type="text" name="txtLogin" id="txtLogin"></td>
            <td class="descricao">Login de acesso do usuário do sistema Ragnadonation</td>
        </tr>
        <tr>
            <td class="titulo">*Nível</td>
            <td class="input">
                <select name="cboNivel" id="cboNivel">
                    <optgroup label="Selecione o nível da permissão">
                        <option value="" selected="selected">...</option>
                        <option value="1">Usuário Comum</option>
                        <option value="2">Usuário Administrador</option>
                    </optgroup>
                </select>
            </td>
            <td class="descricao">Tipo de permissão que deseja adicionar ao usuário</td>
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