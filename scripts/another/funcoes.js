$(document).ready(Relogio);
/**
 *Funcao Imprimir
 *
 *@name Imprimir
 *@description Função que para impressão. Imprimi exatamente o que esta aparecendo na tela do usuário
 *@return Retorna 'false' para bem sucedidade e 'true' para mal sucedida
 **/
function Imprimir(){

    try{
        self.print();
        return false;
    }catch(e){
        alert('Erro ao efetuar a impressão. Tente novamente mais tarde');
        return true;
    }

}

/**
 *Funcao para Validar Datas
 *
 *@name ValidaData
 *@param 'digData'-> Campo do formulario que contem os caracteres a verificar se a data é uma data válida
 *@description Verifica se a data digitada no campo especificado é uma data válida
 *@return Retorna 'true' para válido e 'false' para inválido
 **/
function ValidaData(digData)
{
        var bissexto = 0;
        var data = digData.value; 
        var tam = data.length;
        if (tam == 10) 
        {
                var dia = data.substr(0,2)
                var mes = data.substr(3,2)
                var ano = data.substr(6,4)
                if ((ano > 1900)||(ano < 2100))
                {
                        switch (mes) 
                        {
                                case '01':
                                case '03':
                                case '05':
                                case '07':
                                case '08':
                                case '10':
                                case '12':
                                        if  (dia <= 31) 
                                        {
                                                return true;
                                        }
                                        break
                                
                                case '04':              
                                case '06':
                                case '09':
                                case '11':
                                        if  (dia <= 30) 
                                        {
                                                return true;
                                        }
                                        break
                                case '02':
                                        /* Validando ano Bissexto / fevereiro / dia */ 
                                        if ((ano % 4 == 0) || (ano % 100 == 0) || (ano % 400 == 0)) 
                                        { 
                                                bissexto = 1; 
                                        } 
                                        if ((bissexto == 1) && (dia <= 29)) 
                                        { 
                                                return true;                             
                                        } 
                                        if ((bissexto != 1) && (dia <= 28)) 
                                        { 
                                                return true; 
                                        }                       
                                        break                                           
                        }
                }
        }       
        return false;
}

/**
 *Funcao Valida Placa de Veiculo
 *
 *@name ValidaPlacaVeiculo
 *@param 'numero'-> Campo do formulario que contem os caracteres a validar a placa no formato Brasileiro 'AAA-9999'
 *@description Verifica se os caracteres digitados em um determinado campo são no formato Brasileiro 'AAA-9999' e placa
 *@return Retorna 'true' para válido e 'false' para inválido
 **/
function ValidaPlacaVeiculo(numero){
	var placa = numero.value;
	placa = placa.replace("-", "");
	
	var str = placa.substr(0, 3);
	var num = placa.substr(3, 4);
	
	if(placa == ''){
		return false;
	}else if(!isNaN(str)){
		return false;
	}else if(isNaN(num)){
		return false;
	}else{
		return true;
	}
}

/**
 *Funcao Valida Chassi
 *
 *@name ValidaChassi
 *@param 'numero'-> Campo do formulario que contem os caracteres que deseja validar
 *@description Funcao apenas conta se no campo especificado contem os 17 caracteres referentes ao chassi de um veículo já que é basicamente impossivel validar o chassi.
 *@return Retorna 'true' para válido e 'false' para inválido
 **/
function ValidaChassi(numero){
	var chassi = numero.value;
	
	if(chassi.length != 17){
		return false;
	}else{
		return true;
	}
}

/**
 *Funcao Conta caracteres para verificar se tem o minimo exigido
 *
 *@name ManCarac
 *@param 'campo'-> Campo do formulario que contem os caracteres a verificar o máximo permitido
 *@param 'quantidade'-> A quantidade máxima de caracteres que deve conter no campo especificado
 *@description Conta a quantidade máxima de caracteres que deve conter em um determinado campo de acordo com o que o usuário deseja passado no parametro 'quantidade'
 *@return Retorna 'true' para válido e 'false' para inválido
 **/
function MaxCarac(campo, quantidade){

	valor = campo.value;
	if(valor == ''){
		return false;
	}else if(valor.length > quantidade){
		return false;
	}else{
		return true;
	}
}

/**
 *Funcao Conta caracteres para verificar se tem o minimo exigido
 *
 *@name MinCarac
 *@param 'campo'-> Campo do formulario que contem os caracteres a verificar o mínimo exigido
 *@param 'quantidade'-> A quantidade mínima de caracteres que deve conter no campo especificado
 *@description Conta a quantidade mínima de caracteres que deve conter em um determinado campo de acordo com o que o usuário deseja passado no parametro 'quantidade'
 *@return Retorna 'true' para válido e 'false' para inválido
 **/
function MinCarac(campo, quantidade){
	
	valor = campo.value;
	if(valor == ''){
		return false;
	}else if(valor.length < quantidade){
		return false;
	}else{
		return true;
	}
}

/**
 *Funcao Retira Mascara do CEP
 *
 *@name RetirarMascaraCep
 *@param 'cep'-> Campo do formulario que contem os numeros do telefone com mascara e deseja retirar
 *@description Retira a mascara do campo que foi digitado para por ex. enviar via ajax para gravar na base de dados.
 *@return Retorna o campo com o numero sem a mascara
 **/
function RetirarMascaraCep(cep){
	newcep = cep.value;
	newcep = newcep.replace("-", "");
	
	return newcep;
}

/**
 *Funcao Retira Mascara do Cnpj
 *
 *@name RetirarMascaraCnpj
 *@param 'cnpj'-> Campo do formulario que contem os numeros do cnpj com mascara e deseja retirar
 *@description Retira a mascara do campo que foi digitado para por ex. enviar via ajax para gravar na base de dados.
 *@return Retorna o campo com o numero sem a mascara
 **/
function RetirarMascaraCnpj(cnpj){
	newcnpj = cnpj.value;
	newcnpj = newcnpj.replace(".", "");
	newcnpj = newcnpj.replace(".", "");
	newcnpj = newcnpj.replace("/", "");
	newcnpj = newcnpj.replace("-", "");
	
	return newcnpj;
}

/**
 *Funcao Retira Mascara do CPF
 *
 *@name RetirarMascaraCpf
 *@param 'cpf'-> Campo do formulario que contem os numeros do cpf com mascara e deseja retirar
 *@description Retira a mascara do campo que foi digitado para por ex. enviar via ajax para gravar na base de dados.
 *@return Retorna o campo com o numero sem a mascara
 **/
function RetirarMascaraCpf(cpf){
	newcpf = cpf.value;
	newcpf = newcpf.replace(".", "");
	newcpf = newcpf.replace(".", "");
	newcpf = newcpf.replace("-", "");
	
	return newcpf;
}

/**
 *Funcao Retira Mascara do Telefone
 *
 *@name RetirarMascaraTel
 *@param 'numero'-> Campo do formulario que contem os numeros do telefone com mascara e deseja retirar
 *@description Retira a mascara do campo que foi digitado para por ex. enviar via ajax para gravar na base de dados.
 *@return Retorna o campo com o numero sem a mascara
 **/
function RetirarMascaraTel(numero){
	var fone = numero.value;
	fone = fone.replace("(", "");
	fone = fone.replace(")", "");
	fone = fone.replace("-", "");
	
	return fone;
}

/**
 *Funcao Valida Email
 *
 *@name ValidaEmail
 *@param 'mail'-> Campo do formulario que contem o email que deseja validar
 *@description Valida o email digitado no campo verificando se ele tem um formato valido de email ex: exemplo@email.com ou exemplo@email.com.br
 *@return Retorna 'true' para valido e 'false' para inválido.
 **/
function ValidaEmail(mail){
	var er = new RegExp(/^[A-Za-z0-9_\-\.]+@[A-Za-z0-9_\-\.]{2,}\.[A-Za-z0-9]{2,}(\.[A-Za-z0-9])?/);
	
	if(typeof(mail) == "string"){
		if(er.test(mail)){return true;}
	}else if(typeof(mail) == "object"){
		if(er.test(mail.value)){ 
                    return true;
		}
	}else{
            return false;
	}
return false;
}

/**
 *Funcao Valida Números Inteiros
 *
 *@name ValidaNumInteiro
 *@param 'campo'-> Campo do formulario que contem os numeros que deseja validar
 *@description Valida os números que foram digitados no campo verificando se ele é enteiro ou nao.
 *@return Retorna 'true' para valido e 'false' para inválido.
 **/
function ValidaNumInteiro(campo){
	var tamanho = campo.value.replace("-", "").length;
	var valor   = campo.value.replace("-", "");
	
	if(tamanho <= 0 || tamanho == ""){
		return false;
	}else{
		if(!isNaN(valor)){
			return true;
		}else{
			return false;
		}
	}
}

/**
 *Funcao para Validar CPF
 *
 *@name ValidaCpf
 *@param 'cpf'-> Campo do formulario que contem os numeros do CPF que deseja validar
 *@description Valida os números que foram digitados no campo e se conter Mascara ele retira e valida.
 *@return Retorna 'true' para valido e 'false' para inválido.
 **/
 function ValidaCpf(cpf)   
 {  
   erro = new String;
     cpf = cpf.value.replace(".", "");
     cpf = cpf.replace(".", "");
     cpf = cpf.replace("-", "");
     
     if (cpf.length == 11)  
     {     
             cpf = cpf.replace('.', '');  
             cpf = cpf.replace('.', '');  
             cpf = cpf.replace('-', '');  
   
             var nonNumbers = /\D/;  
       
             if (nonNumbers.test(cpf))   
             {  
                     erro = "A verificacao de CPF suporta apenas números!";   
             }  
             else  
             {  
                     if (cpf == "00000000000" ||   
                             cpf == "11111111111" ||   
                             cpf == "22222222222" ||   
                             cpf == "33333333333" ||   
                             cpf == "44444444444" ||   
                             cpf == "55555555555" ||   
                             cpf == "66666666666" ||   
                             cpf == "77777777777" ||   
                             cpf == "88888888888" ||   
                             cpf == "99999999999") {  
                               
                             erro = "Número de CPF inválido!"  
                     }  
       
                     var a = [];  
                     var b = new Number;  
                     var c = 11;  
   
                     for (i=0; i<11; i++){  
                             a[i] = cpf.charAt(i);  
                             if (i < 9) b += (a[i] * --c);  
                     }  
       
                     if ((x = b % 11) < 2) {a[9] = 0} else {a[9] = 11-x}  
                     b = 0;  
                     c = 11;  
       
                     for (y=0; y<10; y++) b += (a[y] * c--);   
       
                     if ((x = b % 11) < 2) {a[10] = 0;} else {a[10] = 11-x;}  
       
                     if ((cpf.charAt(9) != a[9]) || (cpf.charAt(10) != a[10])) {  
                         erro = "Número de CPF inválido.";  
                     }  
             }  
     }  
     else  
     {  
         if(cpf.length == 0)  
             return false  
         else  
             erro = "Número de CPF inválido.";  
     }  
     if (erro.length > 0) { 
             return false;  
     }     
     return true;      
 }
/**
 *Funcao para validar CNPJ
 *
 *@name ValidaCnpj
 *@param 'campo'-> Campo do formulario que contem os numeros do CNPJ que deseja validar
 *@description Valida os números que foram digitados no campo. Se o campo contiver máscara ele retira e valida do mesmo jeito.
 *@return Retorna 'true' para valido e 'false' para inválido.
 **/
function ValidaCnpj(campo){
var numeros, digitos, soma, i, resultado, pos, tamanho, digitos_iguais, cnpj;
digitos_iguais = 1;
cnpj = campo.value;
cnpj = cnpj.replace(".", "");
cnpj = cnpj.replace(".", "");
cnpj = cnpj.replace("/", "");
cnpj = cnpj.replace("-", "");

if (cnpj.length < 14)
   return false;
for (i = 0; i < cnpj.length - 1; i++)
   if (cnpj.charAt(i) != cnpj.charAt(i + 1))
         {
         digitos_iguais = 0;
         break;
         }
if (!digitos_iguais){
   tamanho = cnpj.length - 2
   numeros = cnpj.substring(0,tamanho);
   digitos = cnpj.substring(tamanho);
   soma = 0;
   pos = tamanho - 7;
   for (i = tamanho; i >= 1; i--)
         {
         soma += numeros.charAt(tamanho - i) * pos--;
         if (pos < 2)
               pos = 9;
         }
   resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
   if (resultado != digitos.charAt(0))
         return false;
   tamanho = tamanho + 1;
   numeros = cnpj.substring(0,tamanho);
   soma = 0;
   pos = tamanho - 7;
   for (i = tamanho; i >= 1; i--)
         {
         soma += numeros.charAt(tamanho - i) * pos--;
         if (pos < 2)
               pos = 9;
         }
   resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
   if (resultado != digitos.charAt(1))
         return false;
   return true;
   }
else
   return false;
} 

/**
 *Funcao Valida Números com ponto '.' e virgula ','
 *
 *@name ValindaNumeros
 *@param 'campo'-> Campo do formulario que contem os numeros que deseja validar
 *@description Valida os números que foram digitados no campo com ponto '.' e vírgula ','
 *@return Retorna 'true' para valido e 'false' para inválido.
 **/
function ValidaNumeros(campo) {

	var digits = "0123456789.,"
	var temp 
	var ok = true;
	var valor = campo.value;
	
	if(valor == ''){
		return false;
	}
	
	for(var i=0;i < valor.length; i++){
  		temp = valor.substring(i,i+1)

  		if(digits.indexOf(temp) == -1){
    		ok = false;
    		return false;
    		break;
   	}
   }
   
return true;   
}

/**
 *Funcao Valida Números com ponto '.' e virgula ',' e aceita que o campo esteja vazio
 *
 *@name ValindaNumeros
 *@param 'campo'-> Campo do formulario que contem os numeros que deseja validar
 *@description Valida os números que foram digitados no campo com ponto '.' e vírgula ',' e se caso o camo estiver vazinho retorna 'true'
 *@return Retorna 'true' para valido e 'false' para inválido.
 **/
function ValidaNumerosNull(campo) {

	var digits = "0123456789.,"
	var temp
	var ok = true;
	var valor = campo.value;

	for(var i=0;i < valor.length; i++){
  		temp = valor.substring(i,i+1)

  		if(digits.indexOf(temp) == -1){
    		ok = false;
    		return false;
    		break;
   	}
   }

return true;
}


/**
 *Função Setar Erro no formulário
 *
 *@name ErrorForm
 *@param 'idForm'-> o 'id' do formulário que está o sendo validado
 *@param 'idCampo'-> o 'id' do campo que está sendo validado e está com o valor incorreto.
 *@description Função adiciona uma borda vermelha entorno do input que está com o valor incorreto, para deixar mais evidente o erro do usuario, seta o campo com o erro e limpa ele para receber o falor correto
 *@return retorna sempre false
 *
 **/
function ErrorForm(idForm, idCampo){

    $("form#"+idForm+" input, select").removeAttr("style");
    $("form#"+idForm+" #"+idCampo).removeAttr("style");
    $("form#"+idForm+" #"+idCampo).css({'border':'1px dotted #f00'});
    $("form#"+idForm+" #"+idCampo).focus();
    $("form#"+idForm+" #"+idCampo).val("");
    
return false;
}

/**
 *Função que abre uma janela estilo popup.
 *
 *@name PopUp
 *@param url (obrigatório) Caminho do arquivo que deve gostaria de abrir na tela.
 *@param param (opcional) Parâmetros adicionais que você queira especificar para a requisição
 *@return false Abre a tela com a pagina requisitada!!
 **/
function PopUp(url, param){
    
jQuery.facebox('<iframe frameborder="0" scrolling="no" id="popup" src="'+url+"?"+param+'"> </iframe>');
$("iframe#popup").animate({width: "680px"}, {queue:false, duration:3000})
                 .animate({height: '550px'}, {queue:false, duration:3000});

return false;
}

/**
 *Função que mostra a hora atual
 *
 *@name Relogio
 *@description Relogio que tras a hora atual do servidor e imprime em um local setado pelo usuario através do id do objeto.
 *@return string Retorna as horas.
 **/
function Relogio(){
        var idcampo = '#btnRelogio';//ID do campo onde aparecerá as horas. Relógio para jquery

	var Data   = new Date();
	var ano    = Data.getFullYear();
	var dia    = Data.getDate();
	var mes    = Data.getMonth();
	var semana = Data.getDay();

	var hora   = Data.getHours();
	var min    = Data.getMinutes();
	var seg    = Data.getSeconds();

	strHora = new String(hora);
	if(strHora.length <= 1){hora = "0"+hora;}

	strMin = new String(min);
	if(strMin.length <= 1){min = "0"+min;}

	strSeg = new String(seg);
	if(strSeg.length <= 1){seg = "0"+seg;}

	strDia = new String(dia);
	if(strDia.length <= 1){dia = "0"+dia;}

	var Meses = new Array("Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro");
	var Semana = new Array("Domingo", "Segunda", "Terça", "Quarta", "Quinta", "Sexta", "Sábado");

	DataAtual = ""+Semana[semana]+", "+dia+" de "+Meses[mes]+" de "+ano+" as "+hora+":"+min+":"+seg+".";

	$(idcampo).val(DataAtual);

	setTimeout("Relogio()", 1000);

}