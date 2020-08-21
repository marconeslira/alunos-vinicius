 //mostra turma por escola selecionada
  $("#escolas").on("change",function(){
   var idEscolas = $("#escolas").val();
    $.ajax({
      url:'comboturmas/pega_turmas.php',
      type: 'POST',
      data: {id:idEscolas},
      beforeSend: function(){
        $("#turmas").css ({'display':'block'});
        $("#turmas").html("Carregando...");
      },
      success: function(data){
        $("#turmas").css ({'display':'block'});
        $("#turmas").html(data);
      },
      error: function(data){
        $("#turmas").css ({'display':'block'});
        $("#turmas").html("Houve um erro ao Carregar.");
      }
    });
  });


 //calcula idade e mostra no input
function calcidade(){
  var dtnasc = document.getElementById('dtnasc').value;
  var data_atual = new Date();
  var data_nascimento = new Date(dtnasc);
//subtração dos anos
  var anos = data_atual.getFullYear() - data_nascimento.getFullYear();
//analise dos meses
  if(data_atual.getMonth() != data_nascimento.getMonth()){
    //verificar a diferença nos meses
    if(data_atual.getMonth() < data_nascimento.getMonth()){
      anos--;
    }
  } else{
     //analise do dia do mês
     if(data_atual.getDate() < data_nascimento.getDate()){
       anos--;
     }
  }
  document.getElementById('compidade').setAttribute("value", anos);
}



//troca a virgula por ponto conforme digita
function substituiVirgula(campo) {
campo.value = campo.value.replace(/,/gi, ".");
}



//calcula imc e mostra no input
function calcimc(){
var peso = document.getElementById('peso').value;
var altura = document.getElementById('altura').value;
var peso1 = peso / (altura * altura);
var imc = parseFloat(peso1).toFixed(1);
document.getElementById('imc').setAttribute("value", imc);
}


 //mostra resultado estado nutricional
function calestnutri(){
var imc = document.getElementById('imc').value;
var estnutricional;
  if(imc < 18.5){
    estnutricional = "Baixo Peso";
}else if((imc >=18.5) && (imc< 24.9)){
    estnutricional = "Peso Normal";
}else if((imc >=25) && (imc <=29.9)){
    estnutricional = "Sobrepeso";
}else if((imc >=30) && (imc <=34.9)){
    estnutricional = "Obesidade Grau 1";
}else if((imc >=35) && (imc <=39.9)){
    estnutricional = "Obesidade Grau 2";
}else if(imc >=40){
    estnutricional = "Obesidade Grau 3";
};
document.getElementById('estnutri').setAttribute("value", estnutricional);
}
