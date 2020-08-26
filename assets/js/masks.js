/* VALIDACOES */
//adiciona mascara ao CPF
function MascaraCPF(cpf){
    if(mascaraInteiro(cpf)==false){
        event.returnValue = false;
    }       
    return formataCampo(cpf, '000.000.000-00', event);
 }
 
 function ValidarCPF(campo) {
    var CPF = campo.value; // Recebe o valor digitado no campo
    exp = /\.|\-/g
    CPF = CPF.toString().replace( exp, "" ); 
    
    // Aqui começa a checagem do CPF
    var POSICAO, I, SOMA, DV, DV_INFORMADO;
    var DIGITO = new Array(10);
    DV_INFORMADO = CPF.substr(9, 2); // Retira os dois últimos dígitos do número informado
    
    // Desemembra o número do CPF na array DIGITO
    for (I=0; I<=8; I++) {
      DIGITO[I] = CPF.substr( I, 1);
    }
    
    // Calcula o valor do 10º dígito da verificação
    POSICAO = 10;
    SOMA = 0;
       for (I=0; I<=8; I++) {
          SOMA = SOMA + DIGITO[I] * POSICAO;
          POSICAO = POSICAO - 1;
       }
    DIGITO[9] = SOMA % 11;
       if (DIGITO[9] < 2) {
            DIGITO[9] = 0;
    }
       else{
           DIGITO[9] = 11 - DIGITO[9];
    }
    
    // Calcula o valor do 11º dígito da verificação
    POSICAO = 11;
    SOMA = 0;
       for (I=0; I<=9; I++) {
          SOMA = SOMA + DIGITO[I] * POSICAO;
          POSICAO = POSICAO - 1;
       }
    DIGITO[10] = SOMA % 11;
       if (DIGITO[10] < 2) {
            DIGITO[10] = 0;
       }
       else {
            DIGITO[10] = 11 - DIGITO[10];
       }
    
    // Verifica se os valores dos dígitos verificadores conferem
    DV = DIGITO[9] * 10 + DIGITO[10];
        if(CPF==""){
            $('#cpf').removeClass('border-success');
            $('#cpf').addClass('border-danger');
        }else{
            if (DV != DV_INFORMADO) {
                document.getElementById('alertaCPF').style.display="inline";
                $('#cpf').addClass('border-danger');
           
                campo.value = '';
                campo.focus();
                return false;
            } else{
                document.getElementById('alertaCPF').style.display="none";
                $('#cpf').removeClass('border-danger');
                $('#cpf').addClass('border-success');
            }
        }
    }

    //SENHA
 
    function ValidarSenha(campo) {
       var senha = document.getElementById('senha').value;
       var confirmacao = campo.value; 
      
       if(senha!=confirmacao){
          document.getElementById('alertaSenha').style.display="inline";
          campo.value = '';
          return false;
       } else{
          document.getElementById('alertaSenha').style.display="none";
       }
       
    }

    //CEP
    function MascaraCEP(cep){
        if(mascaraInteiro(cep)==false){
            event.returnValue = false;
        }       
        return formataCampo(cep, '00000-000', event);
     }

    //TELEFONE
    function MascaraTEL(tel){
        if(mascaraInteiro(tel)==false){
            event.returnValue = false;
        }       
        var qtd = tel.value;
        if(qtd.length>=14){
            return formataCampo(tel, '(00) 00000-0000', event);
        }else{
            return formataCampo(tel, '(00) 0000-0000', event);
        }
     }

	function MascaraNota(nota){
        if(mascaraInteiro(nota)==false){
            event.returnValue = false;
        }       
        return formataCampo(nota, '00.00', event);
     }

    function mascaraValor(valor){
        
        $('#'+valor).maskMoney();
          
    }
 
    //valida numero inteiro com mascara
 function mascaraInteiro(){
    if (event.keyCode < 48 || event.keyCode > 57){
        event.returnValue = false;
        return false;
    }
    return true;
 }
 
 
 //formata de forma generica os campos
 function formataCampo(campo, Mascara, evento) { 
    var boleanoMascara; 
    
    var Digitato = evento.keyCode;
    exp = /\-|\.|\/|\(|\)|\:| /g
    campoSoNumeros = campo.value.toString().replace( exp, "" ); 
 
    var posicaoCampo = 0;    
    var NovoValorCampo="";
    var TamanhoMascara = campoSoNumeros.length;; 
    
    if (Digitato != 8) { // backspace 
            for(i=0; i<= TamanhoMascara; i++) { 
                    boleanoMascara  = ((Mascara.charAt(i) == "-") || (Mascara.charAt(i) == ".")|| (Mascara.charAt(i) == ":")
                                                            || (Mascara.charAt(i) == "/")) 
                    boleanoMascara  = boleanoMascara || ((Mascara.charAt(i) == "(") 
                                                            || (Mascara.charAt(i) == ")") || (Mascara.charAt(i) == " ")) 
                    if (boleanoMascara) { 
                            NovoValorCampo += Mascara.charAt(i); 
                              TamanhoMascara++;
                    }else { 
                            NovoValorCampo += campoSoNumeros.charAt(posicaoCampo); 
                            posicaoCampo++; 
                      }              
              }      
            campo.value = NovoValorCampo;
              return true; 
    }else { 
            return true; 
    }
 }
 //fim das formatacoes de campo