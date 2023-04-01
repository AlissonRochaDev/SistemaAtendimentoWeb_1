<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<?php
require_once '../DAO/clienteDAO.php';
include_once '_head.php';
$obj = new clienteDAO();
$clientes = $obj->ConsultarClientes()
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
                        <h2>Consultar Clientes</h2>
                        <h5>Consulte todos os clientes. podendo agendar, editar os mesmos </h5>

                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />
                <div class="row">
                    <div class="col-md-12">
                        <!-- Advanced Tables -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Clientes cadastrados
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>Ação</th>
                                                <th>Nome</th>
                                                <th>Telefone</th>
                                                <th>Endereço</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php for($i = 0; $i<count($clientes);$i++){ ?>
                                            <tr class="odd gradeX">
                                                <td>
                                                    <center>
                                                        <a href="alterar_clientes.php?cod=<?=$clientes[$i]['id_cliente']?>" class="btn btn-info btn-xs "> Editar</a>
                                                        <a href="agendar_cliente.php?id=<?=$clientes[$i]['id_cliente']?>&nome=<?=$clientes[$i]['nome_cliente']?>" class="btn btn-warning btn-xs "> Agendar</a>
                                                    </center>
                                                </td>
                                                <td><?= $clientes[$i]['nome_cliente'] ?></td>
                                                <td><?= $clientes[$i]['tel_cliente'] ?></td>
                                                <td><?= $clientes[$i]['endereco_cliente'] ?></td>

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