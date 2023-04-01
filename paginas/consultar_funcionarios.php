<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<?php
require_once '../DAO/funcionarioDAO.php';
include_once '_head.php';
$obj = new funcionarioDAO();
$funcionarios = $obj->Consultarfuncionarios();
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
                    <?php include_once '_msg.php'?>
                    <div class="col-md-12">
                        <h2>Consultar Funcionários</h2>
                        <h5>Consulte os funcionários aqui.. </h5>

                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />
                <div class="row">
                    <div class="col-md-12">
                        <!-- Advanced Tables -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Funcionários cadastrados
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
                                                <th>Admissão</th>
                                                <th>Demissão</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php for($i = 0; $i<count($funcionarios);$i++){ ?>
                                            <tr class="odd gradeX">
                                                <td>
                                                    <center>
                                                        <a href="alterar_funcionario.php?cod=<?=$funcionarios[$i]['id_funcionario']?>" class="btn btn-info btn-xs " > Editar</a>
                                                    </center>
                                                </td>
                                                <td><?= $funcionarios[$i]['nome_funcionario'] ?></td>
                                                <td><?= $funcionarios[$i]['tel_funcionario'] ?></td>
                                                <td><?= $funcionarios[$i]['endereco_funcionario'] ?></td>
                                                <td><?= $funcionarios[$i]['data_admissao'] ?></td>
                                                <td><?= $funcionarios[$i]['data_demissao'] ?></td>
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