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
var imc = parseFloat(peso1.toFixed(1));
document.getElementById('imc').setAttribute("value", imc);
}


 //mostra resultado estado nutricional
function calestnutri(){
var percentil = document.getElementById('percentil').value;
var estnutricional;
if((percentil == "-p3") || (percentil == "p3")){
  estnutricional = "Baixo Peso";
}else if(percentil == "p3-p5"){
  estnutricional = "Eutrófico/Risco Baixo Peso";
}else if((percentil == "p3-p15") || (percentil == "p15") || ( percentil == "p50-p85") || ($percentil == "p15-p50")){
  estnutricional = "Eutrófico";
}else if(percentil == "p85-p97"){
  estnutricional = "Eutrófico/Risco de Obesidade";
}else if(percentil == "+p97"){
  estnutricional = "Obesidade";
};
document.getElementById('estnutricional').setAttribute("value", estnutricional);
}

//chamada tabela filtros

$(document).ready(function(){
    $('#minhaTabela').DataTable({
        "language": {
          "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Portuguese.json"
          }
      });
});
