<h2>Fazer Doação</h2>
<h3>Todos os campos marcados com asterisco (*) são obrigatórios</h3>
<form name="formDoacao" id="formDoacao" onsubmit="return DoacaoCliente(this);">
    <fieldset>
        <legend>Dados para Doação:</legend>

        <table>
            <thead>
                <th>Campo:</th>
                <th>Field:</th>
                <th>Descrição</th>
            </thead>
            <tbody>
                <tr>
                    <td class="titulo">* Dia da Doação:</td>
                    <td class="input"><input type="text" name="txtDiaDoacao" id="txtDiaDoacao"></td>
                    <td class="descricao">Dia da doação que está registrado no comprovante de depósito.</td>
                </tr>
                <tr>
                    <td class="titulo">* Hora da Doação:</td>
                    <td class="input"><input type="text" name="txtHoraDoacao" id="txtHoraDoacao"></td>
                    <td class="descricao">Hora da doação que está registrado no comprovante de depósito.</td>
                </tr>
                <tr>
                    <td class="titulo">* Tipo da Doação:</td>
                    <td class="input">
                        <select name="cboTipoDoacao" id="cboTipoDoacao">
                            <optgroup label="Selecione o tipo da doação">
                                <option value="" selected="selected">...</option>
                                <option value="1">V.I.P.</option>
                                <option value="2">Donation</option>
                            </optgroup>
                        </select>
                    </td>
                    <td class="descricao">Selecione o tipo da sua doação: vip ou donation.</td>
                </tr>
                <tr>
                    <td class="titulo">* Valor $:</td>
                    <td class="input"><input type="text" name="txtValor" id="txtValor"></td>
                    <td class="descricao">Valor da sua doação escrito no comprovante.</td>
                </tr>
                <tr>
                    <td class="titulo">* Char do Doador:</td>
                    <td class="input"><input type="text" name="txtCharDoador" id="txtCharDoador"></td>
                    <td class="descricao">Nome do personagem principal do jogo do doador para futuros contatos. Caso não jogue, digite <b>S/N</b> - Sem Nick.</td>
                </tr>
                <tr>
                    <td class="titulo">* Char do Receptor:</td>
                    <td class="input"><input type="text" name="txtCharReceptor" id="txtCharReceptor"></td>
                    <td class="descricao">Nome do personagem principal do jogo de quem vai receber a bonificação pela doação para futuros contatos.</td>
                </tr>
                <tr>
                    <td class="titulo">* Login do Char Receptor:</td>
                    <td class="input"><input type="text" name="txtCharReceptorLogin" id="txtCharReceptorLogin"></td>
                    <td class="descricao">Login da conta do do char que irá receber a bonificação pela doação.</td>
                </tr>
                <tr>
                    <td class="titulo">Mensagem:</td>
                    <td class="input"><textarea name="txtMensagem" id="txtMensagem"></textarea></td>
                    <td class="descricao">(Opcional) Deixe nos uma mensagem.</td>
                </tr>
                <tr>
                    <td colspan="3" class="btnForm">
                        <input type="reset" value="Limpar Tudo <<">
                        <input type="submit" value="Submeter Dados >>">
                    </td>
                </tr>
            </tbody>
            <tfoot>
                <th>Campo:</th>
                <th>Field:</th>
                <th>Descrição</th>
            </tfoot>
        </table>
    </fieldset>
</form>

<script type="text/javascript">
<!--
$(document).ready(Mascaras);
$(document).ready(function(){
    $("#txtValor").priceFormat({
                                prefix: '',
                                centsSeparator: ',',
                                thousandsSeparator: '.'
                                });
});
-->
</script>