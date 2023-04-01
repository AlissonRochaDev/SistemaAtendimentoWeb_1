<?php
require_once '../DAO/agendaDAO.php';
require_once '../DAO/clienteDAO.php';
require_once '../DAO/funcionarioDAO.php';
require_once '../DAO/servicoDAO.php';
$objA = new AgendaDAO;
$obs = '';
$valor = '';
if (isset($_POST['btnGravar'])) {

    $valor = $_POST['valor'];
    $obs = $_POST['obs'];
    $codigo = $_POST['codigo'];

    $obj = new ClienteDAO;
    $ret = $obj->AtenderCliente($valor, $obs, $codigo);

    header("location:consultar_agenda.php?ret=$ret");
    exit;
} else if (isset($_GET['cod']) && isset($_GET['nomef']) && isset($_GET['servico'])) {
    $idagenda = $_GET['cod'];
    $fun = $_GET['nomef'];
    $servico = $_GET['servico'];


    $agenda = $objA->DetalharAgenda($idagenda);
    if (empty($agenda)) {
        header('location: consultar_agenda.php');
        exit;
    }
} else {
    header('location: consultar_agenda.php');
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
                        <?php include_once '_msg.php'  ?>
                        <h2>Atendimento do cliente: </h2>
                        <h5>registre o atendimento aqui...</h5>

                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />
                <form action="atender_cliente.php" method="post">
                    <input name="codigo" type="hidden" value="<?= $idagenda ?>">
                    <div class="form-group col-md-6">
                        <label>Data do atendimento</label>
                        <input disabled type="date" class="form-control" value="<?= $agenda['data_agenda'] ?>" name="data" id="data" />
                    </div>
                    <div class="form-group col-md-6">
                        <label>Horário do atendimento</label>
                        <input disabled type="time" class="form-control" value="<?= $agenda['horario_agenda'] ?>" name="hora" id="hora" />
                    </div>
                    <div class="form-group col-md-6">
                        <label> Funcionário do atendimento</label>
                        <input readonly name="funcionario" class="form-control" value="<?= $fun ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label> Serviço do atendimento</label>
                        <input readonly name="servico" class="form-control" value="<?= $servico ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Valor do atendimento</label>
                        <input class="form-control" placeholder="Digite o valor aqui..." value="<?= $valor ?>" name="valor" id="valor" />
                    </div>
                    <div class="form-group col-md-12">
                        <label>Observação do atendimento</label>
                        <textarea class="form-control" rows="3" placeholder="Digite a observação aqui..." name="obs"><?= $obs ?></textarea>
                    </div>
                    <div class="col-md-12">
                        <center>
                            <button class="btn btn-success btn-lg " name="btnGravar" onclick="return ValidarAtenderCliente()">Finalizar </button>
                        </center>

                    </div>
                </form>
            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>



</body>

</html>