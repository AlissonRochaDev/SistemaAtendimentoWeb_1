<?php
require_once '../DAO/funcionarioDAO.php';

if(isset($_POST['cadastrar'])){
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $dataA = $_POST['dataA'];
    $dataD = $_POST['dataD'];
    $endereco = $_POST['endereco'];

    $obj = new funcionarioDAO();
    $ret = $obj->Gravarfuncionario($nome,$dataA,$telefone,$dataD,$endereco);
}
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<?php
include_once '_head.php';
?>

<body>
    <div id="wrapper">
        <?php
        include_once '_topo.php';
        include_once '_menu.php';
        ?>


        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <?php  include_once '_msg.php'?>
                        <h2> Novo Funcionario</h2>
                        <h5>Aqui você gerência os funcionarios</h5>

                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />
                <form method="post" action="novo_funcionario.php">
                <div class="form-group col-md-6">
                    <label>Nome do funcionario</label>
                    <input class="form-control" placeholder= "Digite o nome aqui..." name="nome" id="nome"/>
                </div>
                <div class="form-group col-md-6">
                    <label>Telefone</label>
                    <input class="form-control" placeholder="Digite o telefone aqui..." name="telefone" id="telefone"/>
                </div>
                <div class="form-group col-md-6">
                    <label>Data de Admissão</label>
                    <input type="date" class="form-control" placeholder="Digite a data aqui..." name="dataA" id="dataA"/>
                </div>
                <div class="form-group col-md-6">
                    <label>Data de Demissão</label>
                    <input type="date"class="form-control" placeholder="Digite a data aqui..." name="dataD" id="dataD"/>
                </div>
                <div class="form-group col-md-12">
                    <label>Endereço</label>
                    <input class="form-control" placeholder="Digite o endereço aqui..." name="endereco" id="endereco"/>
                </div>

                <center>
                    <button class="btn btn-success btn-lg " name="cadastrar" onclick="return ValidarNovoFuncionario()" >Cadastrar </button>
                    <a href="consultar_funcionarios.php" class="btn btn-primary btn-lg " name="consultar">Consultar </a>
                </center>
                </form>



            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>



</body>

</html>