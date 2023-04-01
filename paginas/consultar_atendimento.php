<?php
include_once '../DAO/clienteDAO.php';

if (isset($_POST['btnPesquisar'])) {
    $dataI = $_POST['dataI'];
    $dataF = $_POST['dataF'];

    $obj = new ClienteDAO();
    $atend = $obj->ConsultarAtendimento($dataI, $dataF);

    if (!is_array($atend)) {
        $ret = $atend;
    } else {
        $resultado = $atend;
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
                        <h2>Consultar atendimentos</h2>
                        <h5>Consulte os atendimentos aqui... </h5>

                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />
                <form method="post" action="consultar_atendimento.php">
                    <div class="form-group col-md-6">
                        <label>Data inicial do atendimento</label>
                        <input type="date" class="form-control" placeholder="Digite a data aqui..." name="dataI" id="dataI" />
                    </div>
                    <div class="form-group col-md-6">
                        <label>Data final do atendimento</label>
                        <input type="date" class="form-control" placeholder="Digite a data aqui..." name="dataF" id="dataF" />
                    </div>
                    <center>
                        <button class="btn btn-info btn-lg" name="btnPesquisar" onclick="return ValidarConsultarAtendimento()">Pesquisar</button>
                    </center>
                </form>
                <?php if (isset($resultado)) { ?>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <!-- Advanced Tables -->
                            <div class="panel panel-default">
                                <div class="panel-heading">

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
                                                    <th>Valor</th>
                                                    <th>Observação</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php for ($i = 0; $i < count($atend); $i++) { ?>
                                                    <tr class="odd gradeX">
                                                        <td>
                                                            <center>

                                                                <a href="alterar_atendimento.php?nome=<?= $atend[$i]['nome_cliente'] ?>&id=<?= $atend[$i]['id_atendimento'] ?>" class="btn btn-warning btn-xs">Alterar</a>
                                                            </center>
                                                        </td>
                                                        <td><?= $atend[$i]['data_agenda'] ?></td>
                                                        <td><?= $atend[$i]['horario_agenda'] ?></td>
                                                        <td><?= $atend[$i]['nome_cliente'] ?></td>
                                                        <td><?= $atend[$i]['nome_funcionario'] ?></td>
                                                        <td><?= $atend[$i]['nome_servico'] ?></td>
                                                        <td><?= $atend[$i]['valor_atendimento'] ?></td>
                                                        <td><?= $atend[$i]['obs_atendimento'] ?></td>

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