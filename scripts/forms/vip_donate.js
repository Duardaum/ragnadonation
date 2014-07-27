function AddVip(form){
    if(!ValidaNumInteiro(form.txtCodDoacao)){
        alert('Digite apenas números e inteiro no campo do Código da Doação!!');
        ErrorForm(form.name, form.txtCodDoacao.name);
        return false;
    }else if(!ValidaNumInteiro(form.txtDiasVip)){
        alert('Digite apenas números e inteiro no campo do Dias V.I.P.!!');
        ErrorForm(form.name, form.txtDiasVip)
        return false;
    }else{
        var result = null;
        var dados = null;
        var DADOS = new Array();

        DADOS['coddoacao'] = form.txtCodDoacao.value;
        DADOS['diasvip'] = form.txtDiasVip.value;

        dados = "doc=banco&pagina=vip_add&coddoacao="+DADOS['coddoacao']+"&diasvip="+DADOS['diasvip'];

        result = Requisicao('pages/pageController.php', dados, 'div#mensagem', 'acao');

        if(!result){
            alert('FATAL ERROR - Erro ao tentar fazer requisição!!');
            return false;
        }else{
            form.reset();
            return false;
        }
    }
return false;
}

function AddDonante(form){
    if(!ValidaNumInteiro(form.txtCodDoacao)){
        alert('Digite apenas números e inteiro no campo do Código da Doação!!');
        ErrorForm(form.name, form.txtCodDoacao.name);
        return false;
    }else if(!ValidaNumInteiro(form.txtRops)){
        alert('Digite apenas números e inteiro no campo do Quantidade de Rop\'s!!');
        ErrorForm(form.name, form.txtRops.name);
        return false;
    }else{
        var dados = null;
        var result = null;
        var DADOS = new Array();

        DADOS['coddoacao'] = form.txtCodDoacao.value;
        DADOS['qnt_rops'] = form.txtRops.value;

        dados = "doc=banco&pagina=don_add&coddoacao="+DADOS['coddoacao']+"&rops="+DADOS['qnt_rops'];

        result = Requisicao('pages/pageController.php', dados, 'div#mensagem', 'acao');

        if(!result){
            alert('FATAL ERROR - Erro ao tentar validar dados!!');
            return false;
        }else{
            form.reset();
            return false;
        }
    }
return false;
}

function AddPermissao(form){
    if(form.txtLogin.value == ''){
        alert('Digite o login do usuário que deseja alterar o nível de permissão!!');
        ErrorForm(form.name, form.txtLogin.name);
        return false;
    }else if(form.cboNivel.value == ''){
        alert('Selecione o nível de permissão que deseja adicionar ao usuário!!');
        ErrorForm(form.name, form.cboNivel.name);
        return false;
    }else{
        var dados = null;
        var result = null;
        var DADOS = new Array();

        DADOS['login'] = form.txtLogin.value;
        DADOS['nivel'] = form.cboNivel.value;

        dados = "doc=banco&pagina=permissao_usuario&login="+DADOS['login']+"&nivel="+DADOS['nivel'];

        result = Requisicao('pages/pageController.php', dados, 'div#mensagem', 'pagina');

        if(!result){
            alert('FATAL ERROR - Erro ao fazer requisição!!');
            return false;
        }else{
            form.reset();
        }
    }
return false;
}

function RecuperaSenha(form){
    if(form.txtLogin.value == ''){
        alert('Digite o login para recuperar a senha!!');
        ErrorForm(form.name, form.txtLogin.name);
        return false;
    }else if(!ValidaEmail(form.txtEmail)){
        alert('Digite o email válido para recuperar a senha!!');
        ErrorForm(form.name, form.txtEmail.name);
    }else{
        var dados = null;
        var result = null;
        var DADOS = new Array();

        DADOS['login'] = form.txtLogin.value;
        DADOS['email'] = form.txtEmail.value;

        dados = "doc=banco&pagina=recuperar_senha&login="+DADOS['login']+"&email="+DADOS['email'];

        result = Requisicao('pages/pageController.php', dados, 'div#centro', 'pagina');

        if(!result){
            alert('FATAL ERROR - Erro ao tentar fazer requisição!!');
            return false;
        }
    }
return false;
}

function Relatorio(form){
    if(!ValidaData(form.txtData01)){
        alert('Digite uma data válida!!');
        ErrorForm(form.name, form.txtData01.name);
        return false;
    }else if(!ValidaData(form.txtData02)){
        alert('Digite uma data válida');
        ErrorForm(form.name, form.txtData02.name);
        return false;
    }else if(form.txtData01.value > form.txtData02.value){
        alert('Data inicial tem qeu ser menor que a data final!!');
        return false;
    }else{
        var dados = null;
        var result = null;
        var DADOS = new Array();

        DADOS['data_inicial'] = form.txtData01.value;
        DADOS['data_final'] = form.txtData02.value;

        dados = "doc=banco&pagina=relatorio&data_inicial="+DADOS['data_inicial']+"&data_final="+DADOS['data_final'];

        result = Requisicao('pages/pageController.php', dados, 'div.relatorio', 'pagina');

        if(!result){
            alert('FATAL ERROR - Erro ao tentar fazer requisição!!');
            return false;
        }

        return false;
    }
return false;
}