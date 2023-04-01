<?php
require_once '../DAO/agendaDAO.php';
require_once '../DAO/funcionarioDAO.php';
require_once '../DAO/servicoDAO.php';

$obj = new AgendaDAO();
if (isset($_POST['btnGravar'])) {
    $data = $_POST['data'];
    $hora = $_POST['hora'];
    $func = $_POST['funcionario'];
    $servico = $_POST['servico'];
    $obs = $_POST['obs'];
    $codigo = $_POST['codigo'];


    $ret = $obj->AlterarAgenda($data, $hora, $func, $servico, $obs, $codigo);
    header("location: consultar_agenda.php?ret=$ret");
    exit;
} else if (isset($_GET['cod'])) {
    $idagenda = $_GET['cod'];

    $agenda = $obj->DetalharAgenda($idagenda);
    if (empty($agenda)) {
        header('location: consultar_agenda.php');
        exit;
    }
    $objF = new funcionarioDAO();
    $Funcionarios = $objF->Consultarfuncionarios();
    $objS = new ServicoDAO();
    $servicos = $objS->ConsultarServico();
    
    
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
                        <?php include_once '_msg.php' ?>
                        <h2>Alterar Agenda do:</h2>
                        <h5>Altere a agenda aqui... </h5>

                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />
                <form method="post" action="alterar_agenda.php">
                    <input type="hidden" name="codigo" value="<?= $agenda['id_agenda'] ?>">
                    <div class="form-group col-md-6">
                        <label>Data do agendamento</label>
                        <input type="date" class="form-control" placeholder="Altere a data aqui..." value="<?= $agenda['data_agenda'] ?>" name="data" id="data" />
                    </div>
                    <div class="form-group col-md-6">
                        <label>Horário do agendamento</label>
                        <input type="time" class="form-control" placeholder="Altere o horário aqui..." value="<?= $agenda['horario_agenda'] ?>" name="hora" id="hora" />
                    </div>
                    <div class="form-group col-md-6">
                        <label> Funcionário do agendamento</label>
                        <select name="funcionario" class="form-control">
                            <?php for ($i = 0; $i < count($Funcionarios); $i++) { ?>
                                <option value="<?= $Funcionarios[$i]['id_funcionario'] ?>" <?= $Funcionarios[$i]['id_funcionario'] == $agenda['id_funcionario'] ? 'selected' : '' ?>><?= $Funcionarios[$i]['nome_funcionario'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label> Serviço do agendamento</label>
                        <select name="servico" class="form-control">
                            <?php for ($i = 0; $i < count($servicos); $i++) { ?>
                                <option value="<?= $servicos[$i]['id_servico'] ?>" <?= $servicos[$i]['id_servico'] == $agenda['id_servico'] ? 'selected' : '' ?>><?= $servicos[$i]['nome_servico'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group col-md-12">
                        <label>Observação do agendamento</label>
                        <textarea class="form-control" rows="3" placeholder="Altere a observação aqui..." name="obs"><?= $agenda['obs_agenda'] ?></textarea>
                    </div>
                    <center>
                        <button class="btn btn-success btn-lg" name="btnGravar" onclick="return ValidarAlterarAgenda()">Alterar</button>
                    </center>
                </form>
            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>



</body>

</html>