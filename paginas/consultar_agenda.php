<?php
require_once '../DAO/agendaDAO.php';

if (isset($_POST['btnPesquisar'])) {
    $dataI = $_POST['dataI'];
    $dataF = $_POST['dataF'];

    $obj = new AgendaDAO();
    $agendas = $obj->ConsultarAgenda($dataI, $dataF);

    // Verifica se NAO eh array
    if(!is_array($agendas))
    {
        $ret = $agendas;
    }
    else{
        $resultado = $agendas;
    }
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
                        <h2>Consulta da agenda</h2>
                        <h5>Consulte a agenda aqui...</h5>

                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />
                <form method="post" action="consultar_agenda.php">
                    <div class="form-group col-md-6">
                        <label>Data inicial do agendamento</label>
                        <input type="date" class="form-control" placeholder="Digite a data aqui..." name="dataI" id="dataI" value="<?= $dataI?>" />
                    </div>
                    <div class="form-group col-md-6">
                        <label>Data final do agendamento</label>
                        <input type="date" class="form-control" placeholder="Digite a data aqui..." name="dataF" id="dataF" value="<?= $dataF?>" />
                    </div>
                    <center>
                        <button class="btn btn-info btn-lg" name="btnPesquisar" onclick="return ValidarConsultaAgenda()">Pesquisar</button>
                    </center>
                </form>
                <?php if(isset($resultado)){ ?>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <!-- Advanced Tables -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Agenda
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>Ação</th>
                                                <th>Data</th>
                                                <th>Hora</th>
                                                <th>Cliente</th>
                                                <th>Funcionário</th>
                                                <th>Serviço</th>
                                                <th>Observação</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php for($i = 0;$i<count($resultado);$i++) {?>
                                            <tr class="odd gradeX">
                                                <td>
                                                    <center>
                                                        <a href="atender_cliente.php?cod=<?=$resultado[$i]['id_agenda']?>&nomef=<?=$resultado[$i]['nome_funcionario']?>&servico=<?=$resultado[$i]['nome_servico']?>" class="btn btn-success btn-xs">Atender</a>
                                                        <a href="alterar_agenda.php?cod=<?=$resultado[$i]['id_agenda']?>" class="btn btn-warning btn-xs">Alterar</a>
                                                    </center>
                                                </td>
                                                <td><?= $resultado[$i]['data_agenda']?></td>
                                                <td><?= $resultado[$i]['horario_agenda']?></td>
                                                <td><?= $resultado[$i]['nome_cliente']?></td>
                                                <td><?= $resultado[$i]['nome_funcionario']?></td>
                                                <td><?= $resultado[$i]['nome_servico']?></td>
                                                <td><?= $resultado[$i]['obs_agenda']?></td>

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
                <?php } ?>

            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>



</body>

</html>