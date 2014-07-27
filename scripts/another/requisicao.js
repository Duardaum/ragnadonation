function Requisicao(url, parametros, idobj, tipo){
    var caminho = url;
    var param = parametros;
    var container = idobj;
    var acao = tipo;
    var msg = 'Erro ao tentar fazer requisição da pagina: ';
    var time = '10000';//10 segundos
    
    $.ajax({
            method: 'GET',
            url: caminho,
            data: param,
            beforeSend: MostrarDiv,
            complete: EsconderDiv,
            error: function(error){
                        $(container).empty().html(msg+error).slideDown("slide");
                        setTimeout("EsconderMsg('"+container+"')", time);
                   },
            success: function(html){
                        switch(acao){
                            case 'acao':{
                                $(container).slideUp("slide").empty().html(html).slideDown("slide");
                                $('html, body').animate({ scrollTop: $(container).offset().top }, 'slow');
                                setTimeout("EsconderMsg('"+container+"')", time);
                                return true;
                            break;
                            }
                            case 'pagina':{
                                $(container).slideUp("slide").empty().html(html).slideDown("slide");
                                $('html, body').animate({ scrollTop: $(container).offset().top }, 'slow');
                                return true;
                            break;
                            }
                            default:{
                                alert('Tipo de Ação inexistente');
                                return false;
                            break;
                            }
                        }
                        
                    }
            });
return true;
}

function MostrarDiv(){
    var idobj = 'div#loading';
    $(idobj).slideDown("slide");
return true;
}

function EsconderDiv(){
    var idobj = 'div#loading';
    $(idobj).slideUp("slide");
return true;
}

function EsconderMsg(idObj){
    $(idObj).slideUp("slide").empty();
return true;
}