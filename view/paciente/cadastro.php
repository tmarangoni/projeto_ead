<?php
session_start();
session_destroy();
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Mais Saúde - Login</title>

  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  

  <!-- Custom styles for this template-->
  <link href="../../css/sb-admin-2.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-6" style="margin: auto;">
                   <a href="../../index"><img src="../../img/Logo_mais_saude.PNG" style="margin: auto;" width="500" height="200"></a>
                </div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Criar uma Conta</h1>
                  </div>

                    <form id="form_cadastro_paciente" class="" action="" method="POST">
                        <input type="text" required name="email" class="form-control form-control-user" placeholder="Email"/>
                        <br/>
                        <input type="text" required name="nome" class="form-control form-control-user" placeholder="Nome Completo"/>
                        <br/>
                        <input type="password" required name="senha" class="form-control form-control-user" placeholder="Senha"/>
                        <br/>
                        <input type="password" required name="senhaRepetida" class="form-control form-control-user" placeholder="Confirmação de Senha"/>
                        <br/>
                        <input type="text" required name="cpf" class="form-control form-control-user" placeholder="CPF"/>
                        <br/>

                        <div id="resposta_cadastro"></div>

                        <br/>
                        <button type="submit" class="btn_login btn btn-primary btn-user btn-block">Registrar</button>
                    </form>

                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="../../vendor/jquery/jquery.min.js"></script>
  <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../../vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../../js/sb-admin-2.min.js"></script>



  <!-- Script para enviar dados de cadastro -->
  <script type="text/javascript">

      jQuery(document).ready(function(){
          jQuery('#form_cadastro_paciente').submit(function(){
              var dados = jQuery( this ).serialize();

              jQuery.ajax({
                  type: "POST",
                  url: "../../controller/paciente/cadastro",
                  data: dados,
                  success: function(data)
                  {
                      $('#resposta_cadastro').html(data);
                  }
              });

              return false;
          });
      });
  </script>
  

</body>

</html>
