/**
 *Função de colocar máscaras em input através do id
 *@name Mascaras
 *@description Basca colocar o id dos imputs de acordo com os que existem dentro da função
 **/
function Mascaras(){
    jQuery(AddMask);

    function AddMask(mask){
            //Para usar letras use na mascara a letra "a";
            //Para usar numeros use na mascara o numero "9";
            //Alpha numericos utilize o "*";
            
            //Datas
            $("#txtDataNascimento").mask("99/99/9999");
            $("#txtDiaDoacao").mask("99/99/9999");
            $("#txtData01").mask("99/99/9999");
            $("#txtData02").mask("99/99/9999");
            
            //Telefones
            $("#txtFone01Ddd").mask("(99)");
            $("#txtFone02Ddd").mask("(99)");
            $("#txtFone01Num").mask("9999-9999");
            $("#txtFone02Num").mask("9999-9999");

            //Horas
            $("#txtHoraDoacao").mask("99:99:99");
    }
}
