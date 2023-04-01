<?php
require_once '../DAO/funcionarioDAO.php';
$nome = '';
$tel = '';
$dataA = '';
$dataD = '';
$end = '';
$obj = new funcionarioDAO();
if (isset($_POST['btnGravar'])) {
    $nome = $_POST['nome'];
    $tel = $_POST['telefone'];
    $dataA = $_POST['dataA'];
    $dataD = $_POST['dataD'];
    $end = $_POST['endereco'];
    $codigo = $_POST['codigo'];

    $ret = $obj->AlterarFuncionario($nome, $dataA, $tel, $dataD, $end, $codigo);
    header('location: consultar_funcionarios.php?ret=' .$ret);
    exit;
}
else if(isset($_GET['cod']))
{
    $idFunc = $_GET['cod'];
    
    $funcionario = $obj->DetalharFuncionario($idFunc);
    if(empty($funcionario))
    {
        header('location: consultar_funcionarios.php');
    exit;
    }
    
}
else{
    header('location: consultar_funcionarios.php');
    exit;
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
                        <?php include_once '_msg.php' ?>
                        <h2> Alterar Funcionarios</h2>
                        <h5>Aqui você altera os funcionarios</h5>

                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />
                <form method="post" action="alterar_funcionario.php">
                    <input type="hidden" name="codigo" value="<?=$funcionario['id_funcionario']?>">
                    <div class="form-group col-md-6">
                        <label>Nome do funcionario</label>
                        <input class="form-control" placeholder="Digite o nome aqui..." value="<?=$funcionario['nome_funcionario']?>" name="nome" id="nome"/>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Telefone</label>
                        <input class="form-control" placeholder="Digite o telefone aqui..."value="<?=$funcionario['tel_funcionario']?>" name="telefone" id="telefone"/>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Data de Admissão</label>
                        <input type="date" class="form-control" placeholder="Digite a data aqui..." value="<?=$funcionario['data_admissao']?>" name="dataA" id="dataA"/>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Data de Demissão</label>
                        <input type="date" class="form-control" placeholder="Digite a data aqui..." value="<?=$funcionario['data_demissao']?>" name="dataD" id="dataD"/>
                    </div>
                    <div class="form-group col-md-12">
                        <label>Endereço</label>
                        <input class="form-control" placeholder="Digite o endereço aqui..." value="<?=$funcionario['endereco_funcionario'] ?>" name="endereco" id="endereco"/>
                    </div>

                    <center>
                        <button class="btn btn-success btn-lg " name="btnGravar" onclick="return ValidarAlterarFuncionario()">Gravar </button>
                        <a href="consultar_funcionarios.php" class="btn btn-primary btn-lg ">Consultar </a>
                    </center>
                </form>



            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>



</body>

</html>