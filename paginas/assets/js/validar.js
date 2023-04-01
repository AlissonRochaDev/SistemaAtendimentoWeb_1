function ValidarCamposServico(){

    //Pega o valor em JS puro
    var nome_servico = document.getElementById("servico").value;
    //Pega o valor usando o JQUERY(Biblioteca que facilita a escrita do comando JavaScript)
    var descricao  = $("#desc").val();   

    if(nome_servico.trim() == "" ){
        alert("Preencher o campo NOME");
        $("#servico").focus();
        return false;
    }
    if(descricao.trim() == ""){
        alert("Preencher o campo DESCRIÇÃO");
        $("#desc").focus();
        return false;
    }


}

function ValidarConsultaAgenda(){
    if($('#dataI').val().trim() == "")
    {
        alert("Preencher o campo DATA INICIAL");
        $('#dataI').focus();
        return false;

    }
    if($("#dataF").val().trim() == ""){
        alert("Preencher o campo DATA FINAL");
        $("#dataF").focus();
        return false;
    }
}

function ValidarNovoFuncionario(){
    if($('#nome').val().trim() == "")
    {
        alert("preencher o campo NOME")
        $('#nome').focus();
        return false;
    }
    if($('#telefone').val().trim() == "")
    {
        alert("preencher o campo TELEFONE")
        $('#telefone').focus();
        return false;
    }
    if($('#dataA').val().trim() == "")
    {
        alert("preencher o campo ADMISSÃO")
        $('#dataA').focus();
        return false;
    }
    if($('#endereco').val().trim() == "")
    {
        alert("preencher o campo endereço")
        $('#endereco').focus();
        return false;
    }

    
}
function ValidarNovoCliente(){
    if($('#nome').val().trim() == "")
    {
        alert("Preencher o campo NOME");
        $('#nome').focus();
        return false;

    }
    if($("#telefone").val().trim() == ""){
        alert("Preencher o campo TELEFONE");
        $("#telefone").focus();
        return false;
    }
    if($("#endereco").val().trim() == ""){
        alert("Preencher o campo ENDEREÇO");
        $("#endereco").focus();
        return false;
    }
}
function ValidarMeusDados(){
    if($('#nome').val().trim() == "")
    {
        alert("Preencher o campo NOME");
        $('#nome').focus();
        return false;

    }
    if($('#salao').val().trim() == "")
    {
        alert("Preencher o campo SALÃO");
        $('#salao').focus();
        return false;

    }
    if($("#telefone").val().trim() == ""){
        alert("Preencher o campo TELEFONE");
        $("#telefone").focus();
        return false;
    }
    if($('#email').val().trim() == "")
    {
        alert("Preencher o campo EMAIL");
        $('#email').focus();
        return false;

    }
    if($("#endereco").val().trim() == ""){
        alert("Preencher o campo ENDEREÇO");
        $("#endereco").focus();
        return false;
    }
}
function ValidarAgendarCliente(){
    if($('#data').val().trim() == "")
    {
        alert("Preencher o campo DATA");
        $('#data').focus();
        return false;

    }
    if($("#hora").val().trim() == ""){
        alert("Preencher o campo HORÁRIO");
        $("#hora").focus();
        return false;
    }
}
function ValidarAlterarAgenda(){
    if($('#data').val().trim() == "")
    {
        alert("Preencher o campo DATA");
        $('#data').focus();
        return false;

    }
    if($("#hora").val().trim() == ""){
        alert("Preencher o campo HORÁRIO");
        $("#hora").focus();
        return false;
    }
}
function ValidarAlterarCliente(){
    if($('#nome').val().trim() == "")
    {
        alert("Preencher o campo NOME");
        $('#nome').focus();
        return false;

    }
    if($("#telefone").val().trim() == ""){
        alert("Preencher o campo TELEFONE");
        $("#telefone").focus();
        return false;
    }
    if($("#endereco").val().trim() == ""){
        alert("Preencher o campo ENDEREÇO");
        $("#endereco").focus();
        return false;
    }
}
function ValidarAlterarFuncionario(){
    if($('#nome').val().trim() == "")
    {
        alert("preencher o campo NOME")
        $('#nome').focus();
        return false;
    }
    if($('#telefone').val().trim() == "")
    {
        alert("preencher o campo TELEFONE")
        $('#telefone').focus();
        return false;
    }
    if($('#dataA').val().trim() == "")
    {
        alert("preencher o campo ADMISSÃO")
        $('#dataA').focus();
        return false;
    }
    if($('#endereco').val().trim() == "")
    {
        alert("preencher o campo endereço")
        $('#endereco').focus();
        return false;
    } 
}
function ValidarAtenderCliente(){
    
    if($("#valor").val().trim() == ""){
        alert("Preencher o campo VALOR");
        $("#valor").focus();
        return false;
    }
}

