function DoacaoCliente(form){
    if(!ValidaData(form.txtDiaDoacao)){
        alert('Digite uma data Válida!!');
        ErrorForm(form.name, form.txtDiaDoacao.name);
        return false;
    }else if(!MinCarac(form.txtHoraDoacao, 8)){
        alert('Digite a hora da doação!!');
        ErrorForm(form.nome, form.txtHoraDoacao.name);
        return false;
    }else if(form.cboTipoDoacao.value == ''){
        alert('Selecione o Tipo da sua Doação!!');
        ErrorForm(form.name, form.cboTipoDoacao.name);
        return false;
    }else if((!ValidaNumeros(form.txtValor)) || form.txtValor.value == '0,00'){
        alert('Digite o valor da doação no formato  $0,00 !!');
        ErrorForm(form.name, form.txtValor.name);
        return false;
    }else if(form.txtCharDoador.value == ''){
        alert('Digite seu nick name do char principal no jogo. Caso nao jogue digite S/N !!');
        ErrorForm(form.name, form.txtCharDoador.name);
        return false;
    }else if(form.txtCharReceptor.value == ''){
        alert('Digite o nick name do char principal no jogo que irá receber a bonificação!!');
        ErrorForm(form.name, form.txtCharReceptor.name);
        return false;
    }else if(form.txtCharReceptorLogin.value == ''){
        alert('Digite o login do char receptor que irá receber a bonificação pela doação!!');
        ErrorForm(form.name, form.txtCharReceptorLogin.name);
        return false;
    }else{

        var DADOS = new Array(8);
        var dados = null;
        var result = null;
        
        DADOS['dia_doacao'] = form.txtDiaDoacao.value;
        DADOS['hora_doacao'] = form.txtHoraDoacao.value;
        DADOS['tipo_doacao'] = form.cboTipoDoacao.value;
        DADOS['valor'] = ((form.txtValor.value).replace(".", "")).replace(",", ".");
        DADOS['char_doador'] = form.txtCharDoador.value;
        DADOS['char_receptor'] = form.txtCharReceptor.value;
        DADOS['char_receptor_login'] = form.txtCharReceptorLogin.value;
        DADOS['mensagem'] = form.txtMensagem.value;

        dados = "doc=banco&pagina=doacao_usuario&dia_doacao="+DADOS['dia_doacao']+"&hora_doacao="+DADOS['hora_doacao']+"&tipo_doacao="+DADOS['tipo_doacao']+"&valor="+DADOS['valor']+"&char_doador="+DADOS['char_doador']+"&char_receptor="+DADOS['char_receptor']+"&char_receptor_login="+DADOS['char_receptor_login']+"&mensagem="+DADOS['mensagem'];

        result = Requisicao('pages/pageController.php', dados, 'div#mensagem', 'acao');

        form.reset();

        if(!result){
            alert('FATAL ERROR - Erro ao tentar fazer requisicao!!');
            return false;
        }
    }
return false;
}

function DeletaDoacao(coddoacao){
    var dados = null;
    var result = null;

    dados = "doc=banco&pagina=doacoes_del&coddoacao="+coddoacao;

    result = Requisicao('pages/pageController.php', dados, 'div#mensagem', 'acao');

    if(!result){
        alert('FATAL ERROR - Erro ao tentar fazer requisição!!');
        return false;
    }else{
        var data = "doc=pagina&pagina=doacoes_all";
        Requisicao('pages/pageController.php', data, 'div#centro', 'pagina');
    }
    
return false;
}

function BuscaDoacaoCodigo(form){
    if(!ValidaNumInteiro(form.txtCodDoacao)){
        alert('Digite apenas números e inteiros no Campo.');
        ErrorForm(form.name, form.txtCodDoacao.name);
        return false;
    }else{
        var dados = null;
        var result = null;
        var coddoacao = form.txtCodDoacao.value;
        
        dados = "doc=pagina&pagina=doacoes_cod_show&coddoacao="+coddoacao;

        result = Requisicao('pages/pageController.php', dados, 'div.doacao_codigo', 'pagina');

        if(!result){
            alert('FATAL ERROR - Erro ao tentar fazer requisição.');
            return false;
        }
    }
return false;
}