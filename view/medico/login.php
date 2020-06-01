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

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
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
                <img src="../../img/Logo_mais_saude.PNG" style="margin: auto;" width="500" height="200">
              </div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Bem Vindo!</h1>
                  </div>

                    <form class="user" id="form_login_medico" action="" method="post">
                        <div class="form-group">
                        <input type="crm" required name="crm" class="form-control form-control-user" placeholder="Informe o CRM"/></label>
                        </div>
                        <div class="form-group">
                        <input type="password" required name="senha" class="form-control form-control-user" placeholder="Informe a Senha"/></label>
                        </div>

                        <div id="resposta_login"></div>


                    <div class="form-group">
                      <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="customCheck">
                        <label class="custom-control-label" for="customCheck">Lembrar-me</label>
                      </div>
                    </div>
                    <button class="btn_login btn btn-primary btn-user btn-block" id="btnLogin">
                      Login
                    </button>
                    <hr>
                  <div class="text-center">
                    <a class="small" href="forgot-password.html">Esqueceu a Senha?</a>
                  </div>
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


  <!-- Script para enviar dados de login -->
  <script type="text/javascript">

      jQuery(document).ready(function(){
          jQuery('#form_login_medico').submit(function(){
              var dados = jQuery( this ).serialize();

              jQuery.ajax({
                  type: "POST",
                  url: "../../controller/medico/login.php",
                  data: dados,
                  success: function( data)
                  {

                      $('#resposta_login').html(data);
                  }
              });

              return false;
          });
      });
  </script>

  <!-- Script para gerar campo de cadastro ouuu campo de login -->

  <script>
    $('.form').find('input, textarea').on('keyup blur focus', function (e) {

      var $this = $(this),
              label = $this.prev('label');

      if (e.type === 'keyup') {
        if ($this.val() === '') {
          label.removeClass('active highlight');
        } else {
          label.addClass('active highlight');
        }
      } else if (e.type === 'blur') {
        if( $this.val() === '' ) {
          label.removeClass('active highlight');
        } else {
          label.removeClass('highlight');
        }
      } else if (e.type === 'focus') {

        if( $this.val() === '' ) {
          label.removeClass('highlight');
        }
        else if( $this.val() !== '' ) {
          label.addClass('highlight');
        }
      }

    });

    $('.tab a').on('click', function (e) {

      e.preventDefault();

      $(this).parent().addClass('active');
      $(this).parent().siblings().removeClass('active');

      target = $(this).attr('href');

      $('.tab-content > div').not(target).hide();

      $(target).fadeIn(600);

    });
  </script>
  

</body>

</html>
