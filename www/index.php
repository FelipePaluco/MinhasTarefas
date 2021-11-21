<?php
session_start();
if(isset($_SESSION['logado']) && $_SESSION['logado'] == true) {
  Header("Location: http://localhost/app_tarefa/www/dashboard.php");
}

?>
<!doctype html>
<html lang="pt-br">
  <head>
    <title>MinhasTarefas - Login</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap 4 -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

  </head>
  <body class="bg-light">
  <div class="container">
    <div class="card w-50 d-flex mx-auto" style="margin-top: 120px;">
      <div class="card-body shadow">
          
          <h3 class="text-center text-dark">Bem-vindo!</h3>
            <div class="mx-auto">
              <form action="../scripts/login_controller.php" method="post" class="">

                  <div class="input-group mt-3 mb-3">
                      <div class="input-group-prepend">
                          <span class="input-group-text" id="icon-login"><i class="fas fa-envelope"></i></span>
                      </div>
                      <input class="form-control form-control-lg" type="email" name="userLogin" placeholder="Seu e-mail.." aria-describedby="icon-login" required>
                  </div>

                  <div class="input-group ">
                      <div class="input-group-prepend">
                          <span class="input-group-text" id="icon-login"><i class="fas fa-key"></i></span>
                      </div>
                      <input class="form-control form-control-lg" type="password" name="userPassword" placeholder="Sua senha.." aria-describedby="icon-password">
                  </div>

               <button type="submit" class="btn btn-success btn-block shadow btn-lg w-50 mt-3 mx-auto">Entrar</button>
              </form>
          </div>
      
      </div>
    </div>
  </div>    
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
  </body>
</html>
