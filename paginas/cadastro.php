<?php
require_once '../DAO/usuarioDAO.php';

if(isset($_POST['btnCadastrar']))
{
    $nome = $_POST['nome'];
    $salao = $_POST['salao'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $rsenha = $_POST['rsenha'];
    $endereco = $_POST['endereco'];

    $obj = new UsuarioDAO();
    $ret = $obj->CadastrarUsuario($nome,$salao,$telefone,$email,$senha,$rsenha,$endereco);


}
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<?php
include_once '_head.php'
?>
<body>
    <div class="container">
        <div class="row text-center  ">
            <div class="col-md-12">
                <br /><br />
              <?php  include_once '_msg.php' ?>
                <h2> Cadastre-se</h2>
               
                <h5>( Faça seu cadastro para acesso )</h5>
                 <br />
            </div>
        </div>
         <div class="row">
               
                <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                        <strong>  Preencha todos os campos </strong>  
                            </div>
                            <div class="panel-body">
                                <form action="cadastro.php" method="post">
<br/>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-user"  ></i></span>
                                            <input type="text" class="form-control" placeholder="Seu nome" name="nome"/>
                                        </div>
                                     <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-tag"  ></i></span>
                                            <input type="text" class="form-control" placeholder="Nome da empresa" name="salao"/>
                                        </div>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-phone"  ></i></span>
                                            <input type="text" class="form-control" placeholder="Telefone da empresa" name="telefone"/>
                                        </div>
                                         <div class="form-group input-group">
                                            <span class="input-group-addon">@</span>
                                            <input type="text" class="form-control" placeholder="Seu e-mail" name="email"/>
                                        </div>
                                      <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
                                            <input type="password" class="form-control" placeholder="Sua senha (minimo 6 caracteres)" name="senha"/>
                                        </div>
                                     <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
                                            <input type="password" class="form-control" placeholder="Repita sua senha" name="rsenha"/>
                                        </div>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                            <input type="text" class="form-control" placeholder="Endereço" name="endereco" />
                                        </div>
                                        
                                     
                                     <button  class="btn btn-success " name="btnCadastrar">Finalizar cadastro </button>
                                    <hr />
                                    Já tem cadastro ?  <a href="login.php" >CLIQUE AQUI</a>
                                    </form>
                            </div>
                           
                        </div>
                    </div>
                
                
        </div>
    </div>


     
   
</body>
</html>
