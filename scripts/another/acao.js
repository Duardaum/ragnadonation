$(document).ready(CarregaMenu);

function CarregaMenu(){

    $("div.msg").click(function(){
       $(this).slideUp("slide").empty();
    });

    var welcome = "doc=menu&pagina=welcome";
    $.get('pages/pageController.php', welcome, function(menu){
                                                $("div#centro").slideUp("slide").empty().html(menu).slideDown("slide");
                                             });

    $("div#menu ul li a").click(GetPagina);

    function GetPagina(){
        var result = null;
        var pagina = $(this).attr("href");
        var dados = "doc=pagina&pagina="+pagina;

        result = Requisicao('pages/pageController.php', dados, 'div#centro', 'pagina');

        if(!result){
            alert('Erro ao tentar fazer Requisição - Contate esse erro ao WebMaster Servidor!!');
            return false;
        }

    return false;
    }

return false;
};

function GetCidades(uf){
    var result = null;
    var dados = "doc=cbo&pagina=estados&uf="+uf;

    result = Requisicao('pages/pageController.php', dados, 'select#cboCidade', 'pagina');

    if(!result){
        alert('Erro ao tentar fazer Requisição - Contate esse erro ao WebMaster Servidor!!');
        return false;
    }
return false;
}

function LogarSistema(form){
    if(form.txtLogin.value == ''){
        alert('Digite o seu Login de acesso!!');
        ErrorForm(form.name, form.txtLogin.name);
        return false;
    }else if(form.txtSenha.value == ''){
        alert('Digite a sua Senha de acesso!!');
        ErrorForm(form.name, form.txtSenha.name);
        return false;
    }else{
        $("div#loading").slideDown("slide");
        return true;

    }
return false;
}