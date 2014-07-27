var actionFormUsuario = 0;// 0 = cadastrar e 1 = alterar;

function CadastroUsuarios(form){
    if(form.txtNome.value == ''){
        alert('Digite seu nome!!');
        ErrorForm(form.name, form.txtNome.name);
        return false;
    }else if(form.cboUf.value == ''){
        alert('Selecione o seu estado!!');
        ErrorForm(form.name, form.cboUf.name);
        return false;
    }else if(form.cboCidade.value == ''){
        alert('Selecione a sua cidade!!');
        ErrorForm(form.name, form.cboCidade.name);
        return false;
    }else if((!MinCarac(form.txtEndereco, 5)) || (!MaxCarac(form.txtEndereco, 255))){
        alert('Digite o mínimo de 5 e máximo de 255 caracteres para o endereço');
        ErrorForm(form.name, form.txtEndereco.name);
        return false;
    }else if((!MinCarac(form.txtBairro, 5)) || (!MaxCarac(form.txtBairro, 50))){
        alert('Digite o mínimo de 5 e máximo de 50 caracteres para o bairro!!');
        ErrorForm(form.name, form.txtBairro.name);
        return false;
    }else if((!MinCarac(form.txtNumero, 1)) || (!MaxCarac(form.txtNumero, 10))){
        alert('Digite o mínimo de 1 e o máximo de 10 caracteres para o número. \n OBS: Caso nao tenha número na casa coloque S/N.');
        ErrorForm(form.name, form.txtNumero.name);
        return false;
    }else if(form.txtFone01Ddd.value != '' && ((!MinCarac(form.txtFone01Ddd, 2)) || (!MaxCarac(form.txtFone01Ddd, 4)))){
        alert('Digite um número de DDD válido!!');
        ErrorForm(form.name, form.txtFone01Num.name);
        ErrorForm(form.name, form.txtFone01Ddd.name);
        return false;
    }else if(form.txtFone01Ddd.value != '' && ((!MinCarac(form.txtFone01Num, 8)) || (!MaxCarac(form.txtFone01Num, 9)))){
        alert('Digite um número de Telefone válido!!');
        ErrorForm(form.name, form.txtFone01Num.name);
        return false;
    }else if(form.txtFone02Ddd.value != '' && ((!MinCarac(form.txtFone02Ddd, 2)) || (!MaxCarac(form.txtFone02Ddd, 4)))){
        alert('Digite um número de DDD válido!!');
        ErrorForm(form.name, form.txtFone02Num.name);
        ErrorForm(form.name, form.txtFone02Ddd.name);
        return false;
    }else if(form.txtFone02Ddd.value != '' && ((!MinCarac(form.txtFone02Num, 8)) || (!MaxCarac(form.txtFone02Num, 9)))){
        alert('Digite um número de Telefone válido!!');
        ErrorForm(form.name, form.txtFone02Num.name);
        return false;
    }else if(!ValidaEmail(form.txtEmail)){
        alert('Digite um Email Válido!!');
        ErrorForm(form.name, form.txtEmail);
        return false;
    }else if(!ValidaData(form.txtDataNascimento)){
        alert('Digite sua data de nascimento válida!!');
        ErrorForm(form.name, form.txtDataNascimento);
        return false;
    }else if((!MinCarac(form.txtLogin, 5)) || (!MaxCarac(form.txtLogin, 20))){
        alert('Digite o mínimo de 5 e o máximo de 20 caracteres para o login!!');
        ErrorForm(form.name, form.txtLogin.name);
        return false;
    }else if((!MinCarac(form.txtSenha, 6)) || (!MaxCarac(form.txtSenha, 12))){
        alert('Digite o mínimo de 6 e o máximo de 12 caracteres para a senha!!');
        ErrorForm(form.name, form.txtSenha.name);
        return false;
    }else{

        var DADOS = new Array(13);
        var dados = null;
        var acao = null;
        var result = null;

        if(actionFormUsuario == '0'){
            acao = "cadastrar";
        }else{
            acao = "atualizar";
        }

        DADOS['nome'] = form.txtNome.value;
        DADOS['codcidade'] = form.cboCidade.value;
        DADOS['endereco'] = form.txtEndereco.value;
        DADOS['bairro'] = form.txtBairro.value;
        DADOS['numero'] = form.txtNumero.value;
        DADOS['fone01ddd'] = ((form.txtFone01Ddd.value).replace("(", "")).replace(")", "");
        DADOS['fone01num'] = (form.txtFone01Num.value).replace("-", "");
        DADOS['fone02ddd'] = ((form.txtFone02Ddd.value).replace("(", "")).replace(")", "");
        DADOS['fone02num'] = (form.txtFone02Num.value).replace("-", "");
        DADOS['email'] = form.txtEmail.value;
        DADOS['datanascimento'] = form.txtDataNascimento.value;
        DADOS['login'] = form.txtLogin.value;
        DADOS['senha'] = form.txtSenha.value;

        dados = "doc=banco&pagina=cadastro_usuario&acao="+acao+"&nome="+DADOS['nome']+"&codcidade="+DADOS['codcidade']+"&endereco="+DADOS['endereco']+"&bairro="+DADOS['bairro']+"&numero="+DADOS['numero']+"&fone01ddd="+DADOS['fone01ddd']+"&fone01num="+DADOS['fone01num']+"&fone02ddd="+DADOS['fone02ddd']+"&fone02num="+DADOS['fone02num']+"&email="+DADOS['email']+"&datanascimento="+DADOS['datanascimento']+"&login="+DADOS['login']+"&senha="+DADOS['senha'];

        result = Requisicao('pages/pageController.php', dados, 'div#mensagem', 'acao');

        if(actionFormUsuario == '0'){
            form.reset();
        }

        if(!result){
            alert('FATAL ERROR - Erro ao tentar fazer requisicao!!');
            return false;
        }
    }
return false;
}