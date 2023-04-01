<?php
require_once '../DAO/clienteDAO.php';
$nome = '';
$telefone = '';
$endereco = '';
$obj = new ClienteDAO();

if (isset($_POST['btnGravar'])) {
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $endereco = $_POST['endereco'];
    $codigo = $_POST['codigo'];


    $ret = $obj->AlterarCliente($nome, $telefone, $codigo, $endereco);
    header('location: consultar_clientes.php?ret=' . $ret);
    exit;
} else if (isset($_GET['cod'])) {
    $idcliente = $_GET['cod'];
    $cliente = $obj->Detalharcliente($idcliente);
    if (empty($cliente)) {
        header('location: consultar_clientes.php');

        exit;
    }
} else {
    header('location: consultar_clientes.php');
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
                        <?php
                        include_once '_msg.php' ?>
                        <h2>Alterar Clientes</h2>
                        <h5>Aqui você altera os seus clientes </h5>

                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />
                <form method="post" action="alterar_clientes.php">
                    <input type="hidden" name="codigo" value="<?= $cliente['id_cliente'] ?>">
                    <div class="form-group col-md-6">
                        <label>Nome do Cliente</label>
                        <input class="form-control" placeholder="Digite o nome aqui..." value="<?= $cliente['nome_cliente'] ?>" name="nome" id="nome" />
                    </div>
                    <div class="form-group col-md-6">
                        <label>Telefone do cliente</label>
                        <input class="form-control" placeholder="Digite o Telefone aqui..." value="<?= $cliente['tel_cliente'] ?>" name="telefone" id="telefone" />
                    </div>
                    <div class="form-group col-md-12">
                        <label>Endereço do cliente</label>
                        <input class="form-control" placeholder="Digite o endereço aqui..." value="<?= $cliente['endereco_cliente'] ?>" name="endereco" id="endereco" />
                    </div>
                    <center>
                        <button class="btn btn-success btn-lg " name="btnGravar" onclick="return ValidarAlterarCliente()">Gravar </button>
                        <a href="consultar_clientes.php" class="btn btn-primary btn-lg ">Consultar </a>
                    </center>
                </form>

            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>



</body>

</html>