<?php 
require_once '../DAO/clienteDAO.php';
if(isset($_POST['cadastrar'])){

    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $endereco = $_POST['endereco'];

    $obj = new ClienteDAO();
    $ret = $obj->GravarCliente($nome,$telefone,$endereco);

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
                    <?php include_once '_msg.php'?>
                    <h2>Novo Clientes</h2>
                    <h5>Aqui você cadastra os seus clientes </h5>

                </div>
            </div>
            <!-- /. ROW  -->
            <hr />
            <form method="post" action="novo_clientes.php">
                
            <div class="form-group col-md-6">
                <label>Nome do Cliente</label>
                <input class="form-control" placeholder="Digite o nome aqui..." name="nome" id="nome"/>
            </div>
            <div class="form-group col-md-6">
                <label>Telefone do cliente</label>
                <input class="form-control" placeholder="Digite o Telefone aqui..." name="telefone" id="telefone"/>
            </div>
            <div class="form-group col-md-12">
                <label>Endereço do cliente</label>
                <input class="form-control" placeholder="Digite o endereço aqui..." name="endereco" id="endereco"/>
            </div>
            <center>
                <button class="btn btn-success btn-lg " name="cadastrar" onclick="return ValidarNovoCliente()">Cadastrar </button>
                <a href="consultar_clientes.php" class="btn btn-primary btn-lg " name="consultar">Consultar </a>
            </center>
            </form>

        </div>
        <!-- /. PAGE INNER  -->
    </div>
    <!-- /. PAGE WRAPPER  -->
    </div>



</body>

</html>