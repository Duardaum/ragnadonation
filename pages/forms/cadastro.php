<?php
if(isset($_SESSION['usuario']->codcliente)){
    $objDados = new Busca();
    $rtn = $objDados->DadosCliente($_SESSION['usuario']->codcliente);
    $Dados = mysql_fetch_object($rtn);
}
?>

<h2>Cadastro de usuários</h2>
<h3>Todos os campos marcados com asterisco (*) são obrigatórios</h3>
<form name="formCadastroUsuario" id="formCadastroUsuario" onsubmit="return CadastroUsuarios(this);">
    <fieldset>
        <legend>Dados para cadastro:</legend>

        <table>
            <thead>
                <th>Campo:</th>
                <th>Field:</th>
                <th>Descrição</th>
            </thead>
            <tbody>
            <tr>
                <td class="titulo">* Nome:</td>
                <td class="input">
                    <input type="text" name="txtNome" id="txtNome" <?php if(isset($Dados)) :?> value="<?=$Dados->nome?>" <?php endif; ?> />
                </td>
                <td class="descricao">Digite o seu nome</td>
            </tr>
            <tr>
                <td class="titulo">* Estado:</td>
                <td class="input">
                    <select name="cboUf" id="cboUf" onchange="return GetCidades(this.value);">
                        <optgroup label="Selecione o Estado">
                            <option value="">...</option>
                            <?php $objQuery = new Busca(); $rtn = $objQuery->Estados(); ?>
                            <?php while($Uf = mysql_fetch_object($rtn)) : ?>
                            <?php   if($Uf->uf == $Dados->uf) :?>
                            <option value="<?=$Uf->uf?>" selected="selected"><?=utf8_encode($Uf->nome)?></option>
                            <?php   else : ?>
                            <option value="<?=$Uf->uf?>"><?=utf8_encode($Uf->nome)?></option>
                            <?php   endif; ?>
                            <?php endwhile; ?>
                        </optgroup>
                    </select>
                </td>
                <td class="descricao">Selecione seu estado.</td>
            </tr>
            <tr>
                <td class="titulo">* Cidade:</td>
                <td class="input">
                    <select name="cboCidade" id="cboCidade">
                        <optgroup label="Selecione sua cidade">
                        <?php
                            if(isset($objDados)){
                                $rtn = $objDados->Cidades($Dados->uf);
                                while($Cidade = mysql_fetch_object($rtn)) :
                                    if($Cidade->codcidade == $Dados->codcidade ):
                                    ?>
                            <option value="<?=$Cidade->codcidade?>" selected="selected"><?=$Cidade->nome?></option>
                              <?php else : ?>
                            <option value="<?=$Cidade->codcidade?>"><?=$Cidade->nome?></option>
                                    <?php
                                    endif;
                                endwhile;
                            }
                            unset($objDados); unset($objQuery);
                        ?>
                        </optgroup>
                    </select>
                </td>
                <td class="descricao">Selecione sua cidade.</td>
            </tr>
            <tr>
                <td class="titulo">* Endereço:</td>
                <td class="input"><input type="text" name="txtEndereco" id="txtEndereco" maxlength="255" <?php if(isset($Dados)) :?> value="<?=$Dados->endereco?>" <?php endif; ?> /></td>
                <td class="descricao">Digite o seu endereço.</td>
            </tr>
            <tr>
                <td class="titulo">* Bairro:</td>
                <td class="input"><input type="text" name="txtBairro" id="txtBairro" maxlength="50" <?php if(isset($Dados)) :?> value="<?=$Dados->bairro?>" <?php endif; ?> /></td>
                <td class="descricao">Digite o seu Bairro.</td>
            </tr>
            <tr>
                <td class="titulo">* Nº:</td>
                <td class="input"><input type="text" name="txtNumero" id="txtNumero" maxlength="10" <?php if(isset($Dados)) :?> value="<?=$Dados->numero?>" <?php endif; ?> /></td>
                <td class="descricao">Digite o seu Bairro.</td>
            </tr>
            <tr>
                <td class="titulo">Telefone 01:</td>
                <td class="input">
                    <input type="text" name="txtFone01Ddd" id="txtFone01Ddd" size="3" maxlength="2" <?php if(isset($Dados)) :?> value="(<?=$Dados->fone01ddd?>)" <?php endif; ?> />
                    <input type="text" name="txtFone01Num" id="txtFone01Num" maxlength="10" size="14" <?php if(isset($Dados)) :?> value="<?=$Dados->fone01num?>" <?php endif; ?> /></td>
                <td class="descricao">(Opcional) Digite um numero de telefone.</td>
            </tr>
            <tr>
                <td class="titulo">Telefone 02:</td>
                <td class="input">
                    <input type="text" name="txtFone02Ddd" id="txtFone02Ddd" size="3" maxlength="2" <?php if(isset($Dados)) :?> value="(<?=$Dados->fone02ddd?>)" <?php endif; ?> />
                    <input type="text" name="txtFone02Num" id="txtFone02Num" maxlength="10" size="14" <?php if(isset($Dados)) :?> value="<?=$Dados->fone02num?>" <?php endif; ?> /></td>
                <td class="descricao">(Opcional) Digite um numero de telefone.</td>
            </tr>
            <tr>
                <td class="titulo">* Email</td>
                <td class="input"><input type="text" name="txtEmail" id="txtEmail" maxlength="255" <?php if(isset($Dados)) :?> value="<?=$Dados->email?>" <?php endif; ?> /></td>
                <td class="descricao">Digite o seu Email.</td>
            </tr>
            <tr>
                <td class="titulo">* Data de Nascimento</td>
                <td class="input"><input type="text" name="txtDataNascimento" id="txtDataNascimento" maxlength="10" <?php if(isset($Dados)) :?> value="<?=InverteDataBanco($Dados->datanascimento)?>" <?php endif; ?> /></td>
                <td class="descricao">Digite a data do seu nascimento.</td>
            </tr>
            <tr>
                <td class="titulo">* Login:</td>
                <td class="input"><input type="text" name="txtLogin" id="txtLogin" maxlength="20" <?php if(isset($Dados)) :?> value="<?=$Dados->login?>" <?php endif; ?> /></td>
                <td class="descricao">Digite um login para acesso.</td>
            </tr>
            <tr>
                <td class="titulo">* Senha:</td>
                <td class="input"><input type="password" name="txtSenha" id="txtSenha" maxlength="12" <?php if(isset($Dados)) :?> value="<?=$Dados->senha?>" <?php endif; ?> /></td>
                <td class="descricao">Digite a senha do login para acesso.</td>
            </tr>
            <tr>
                <td colspan="3" class="btnForm">
                    <input type="reset" value="Limpar Tudo <<">
                    <input type="submit" value="Submeter Dados >>">
                </td>
            </tr>
            </tbody>
            <tfoot>
                <th>Campo</th>
                <th>Field</th>
                <th>Descrição</th>
            </tfoot>
        </table>
    </fieldset>
</form>
<?php if(isset($_SESSION['usuario']->codcliente)) : ?>
<script type="text/javascript">
<!--
$(document).ready(Mascaras);
actionFormUsuario = 1;
$("input#txtLogin").attr("disabled", "disabled");
-->
</script>
<?php else : ?>
<script type="text/javascript">
<!--
$(document).ready(Mascaras);
actionFormUsuario = 0;
-->
</script>
<?php endif; ?>