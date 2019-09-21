<?php include 'conexao.php'?>
<!DOCTYPE html>
<html lang="pt-br">

  <head>
  	<meta charset="utf-8">
  	<meta http-equiv="Content-Type" content="text/html; charset=euc-jp">
    <link rel="icon" type="imagem/png" href="imagens/icone/ic_myp.png" style="width: 100vw; height: 100vh;" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login MyPanel</title>
    <link href="vendor/bootstrap/css/style.css" rel="stylesheet">
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="css/sb-admin.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    
    <script type="text/javascript">
        $(document).ready(function () {
            setInterval(function () {
            $('#erro').fadeOut(2500);
            }, 3000);
        });
        
    </script>
    
    <script>
        $(document).ready(function() {
          $("#showHide").click(function() {
            if ($("#inputPassword").attr("type") == "password") {
              $("#inputPassword").attr("type", "text");
    
            } else {
              $("#inputPassword").attr("type", "password");
            }
          });
        });
    </script>
  
    <style>
        a:link {
        text-decoration: none;
        }
        a:hover {
        color: red;
        background-color: transparent;
        text-decoration: none;
        }
        
        .bx {
          animation: change-background 4s linear infinite alternate;
        }
        
        /* Keyframes */
        @keyframes change-background {
          0% {
            background: #27EDA0;
          }
          50% {
            background: #0CB7E0;
          }
          100% {
            background: #009EFD;
          }
        }
       
    </style>
  </head>

  <body background= "imagens/backgrounds/<?php $n = rand(0, 11); echo $n;?>.jpg";
    style="background-size: cover;">

    <div class="container" style="margin-top: 7%" style="margin-bottom: 30px;">
      <div class="card card-login mx-auto mt-5 ">
        <div class="card-header cormyp" style="font-weight: bold">Entrar</div>
        <div class="card-body">
          <div align="center">
            <img src="imagens/icone/ic_myp.png" title="MyP Logo" alt="MyP" style="width:70px; height: 70px;">
          </div>
          <br><br>
          <form method="POST" action="validacaologin.php" >
            <div class="form-group">
              <div class="form-label-group">
                <input type="email" name="mailUser" id="inputEmail" class="form-control" placeholder="Email address" required="required" autofocus="autofocus">
                <label for="inputEmail">Email</label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <input type="password" name="passUser" id="inputPassword" class="form-control  pass" placeholder="Password" required="required">
                <label for="inputPassword">Senha</label>
                 
              </div>
            </div>
            <input type="checkbox" id="showHide" style="margin-left:10px"/>
            <label for="showHide" id="showHideLabel" style="font-size:15px">Mostrar Senha</label><br><br>
            <input class="btn btn-block bx" type="submit" value="Login" style="margin-bottom:15px;color:white">
            <?php
            	if (isset($_SESSION['erro'])) {
            		if($_SESSION['erro']=='ERRO'){
            ?>
              <br><a href="google.com"><div id="erro" class="alert alert-danger">
                  <i class="fas fa-times"></i>
                                    Esqueceu a senha? Clique aqui.
			    </div></a>
            <?php
            			$_SESSION['erro']='OK';
            		}
            	}
            ?>
            <div align="center">
                <a href="index.html">Retornar para a Home</a>
            </div>
          </form>
        </div>
      </div>
    </div>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  </body>

</html>
