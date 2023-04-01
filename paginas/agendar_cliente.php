<?php
require_once '../DAO/agendaDAO.php';
require_once '../DAO/funcionarioDAO.php';
require_once '../DAO/servicoDAO.php';


if (isset($_POST['btnGravar'])) {
    $data = $_POST['data'];
    $hora = $_POST['hora'];
    $obs = $_POST['obs'];
    $func = $_POST['funcionarios'];
    $servico = $_POST['servicos'];
    $id = $_POST['id_cliente'];
    $nome = $_POST['nome'];
    $objA = new AgendaDAO();


    $ret = $objA->Agendar($data, $hora, $func, $servico, $obs, $id);
    header("location: agendar_cliente.php?ret=$ret&id=$id&nome=$nome");
    exit;

} else if (isset($_GET['id']) && !isset($_GET['id_excluir'])) {
    $idcliente = $_GET['id'];
    $nome = $_GET['nome'];
    if (empty($idcliente)) {
        header('location: consultar_cliente.php');
        exit;
    } else{
        $objF = new funcionarioDAO();
        $funcionarios = $objF->Consultarfuncionarios();
        $objS = new ServicoDAO();
        $servico = $objS->ConsultarServico();
        $objA = new AgendaDAO();
        $agendas = $objA->ConsultarAgendaCliente($idcliente);
        
    }
}else if(isset($_GET['id_excluir']))
{
    $id_exluir = $_GET['id_excluir'];
    $idcliente = $_GET['id'];
    $nome = $_GET['nome'];
    $objA = new AgendaDAO();
    $ret = $objA->ExcluirAgenda($id_exluir);
    header("location: agendar_cliente.php?ret=$ret&id=$idcliente&nome=$nome");
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
                        <h2>Agendamento</h2>
                        <h5>Agende os clientes aqui... </h5>

                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />
                <form action="agendar_cliente.php" method="post">
                    <input type="hidden" name="nome" value="<?= $nome?>">
                    <input type="hidden" name="id_cliente" value="<?= $idcliente ?>">
                    <div class="form-group col-md-12">
                        <label>Cliente selecionado:</label>
                        <input disabled class="form-control" value="<?= $nome ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Data do agendamento</label>
                        <input type="date" class="form-control" placeholder="Digite a data aqui..." name="data" id="data" />
                    </div>
                    <div class="form-group col-md-6">
                        <label>Horário do agendamento</label>
                        <input type="time" class="form-control" placeholder="Digite o horário aqui..." name="hora" id="hora" />
                    </div>
                    <div class="form-group col-md-6">
                        <label> Funcionários</label>
                        <select name="funcionarios" class="form-control">
                            <option value="">SELECIONE</option>
                            <?php for ($i = 0; $i < count($funcionarios); $i++) {  ?>
                                <option value="<?= $funcionarios[$i]['id_funcionario'] ?>"><?= $funcionarios[$i]['nome_funcionario'] ?></option>
                            <?php } ?>

                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Serviços</label>
                        <select name="servicos" class="form-control">
                            <option value="">SELECIONE</option>
                            <?php for($i = 0; $i <count($servico);$i++){ ?>
                            <option value="<?= $servico[$i]['id_servico'] ?>"><?= $servico[$i]['nome_servico']?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group col-md-12">
                        <label>Observação</label>
                        <textarea class="form-control" rows="3" name="obs"></textarea>
                    </div>

                    <center>
                        <button class="btn btn-success btn-lg" name="btnGravar" onclick="return ValidarAgendarCliente()"> Agendar</button>
                        <a href="consultar_clientes.php" class="btn btn-info btn-lg">Voltar</a> 
                    </center>
                </form>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <!-- Advanced Tables -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Agendas do <?= $nome ?>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>Ação</th>
                                                <th>Data</th>
                                                <th>Hora</th>
                                                <th>Funcionário</th>
                                                <th>Serviço</th>
                                                <th>Observação</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php for ($i = 0; $i < count($agendas); $i++) {
                                                
                                                 ?>
                                                <tr class="odd gradeX">
                                                    <td>
                                                        <center>
                                                            <a href="agendar_cliente.php?id_excluir=<?= $agendas[$i]['id_agenda']?>&id=<?= $idcliente ?>&nome=<?=$nome?>" class="btn btn-danger btn-xs "> Excluir</a>
                                                        </center>
                                                    </td>
                                                    <td> <?= $agendas[$i]['data_agenda'] ?></td>
                                                    <td> <?= $agendas[$i]['horario_agenda'] ?></td>
                                                    <td> <?= $agendas[$i]['nome_funcionario'] ?></td>
                                                    <td> <?= $agendas[$i]['nome_servico'] ?></td>
                                                    <td> <?= $agendas[$i]['obs_agenda'] ?></td>
                                                </tr>
                                            <?php } ?>

                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                        <!--End Advanced Tables -->
                    </div>
                </div>

            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>


</body>

</html>