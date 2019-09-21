<?php  include 'conexao.php';
	if ((isset ($_SESSION['user'])) && (isset ($_SESSION['pass']))){
?>
	<!DOCTYPE html>
	<html lang="pt-br">

	  <head>

	    <meta charset="UTF-8">
	    <link rel="icon" type="imagem/png" href="imagens/icone/ic_myp.png" style="width: 100vw; height: 100vh;"/>
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	    <title>MyPanel</title>

	    <!-- Núcleo Bootstrap CSS-->
	    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

	    <!-- Customização de fontes-->
	    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

	    <!-- Page level plugin CSS-->
	    <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

	    <!-- Estilo de customização do template-->
	    <link href="css/sb-admin.css" rel="stylesheet">

	    <script src="vendor/jquery/jquery.min.js"></script>
		<script type="text/javascript">
			setInterval("numeroUsuarios();",3000);
			setInterval("numeroNegociacoes();",3000);  
			function numeroUsuarios(){
				$('#divnumUser').load(location.href +' #numUser');
			}
			function numeroNegociacoes(){
				$('#divnumNeg').load(location.href +' #numNeg');
			}
		</script>
		<script>
		    function enviaDados(){
                var ttl = document.getElementById("tituloNotificacao").value;
                var mens = document.getElementById("textNotificacao").value;
                document.getElementById("tituloNotificacao").value = '';
                document.getElementById("textNotificacao").value = '';
                window.location.href = "preNotifiApp.php?ttl="+ttl+"&mens="+mens;
		    }
		</script>
	  </head>

	  <body id="page-top">

	    <nav class="navbar navbar-expand navbar-dark bg-dark static-top shadow p-3">

	      <a class="navbar-brand cortextmyp mr-1" href="painel.php" style="font-weight: bold;"><?php echo $_SESSION['user']?></a>

	      <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
	        <i class="fas fa-bars"></i>
	      </button>

	      <!-- Navbar -->
	      <ul class="navbar-nav ml-auto lg-lg-5 ">
	        <li class="nav-item dropdown no-arrow mx-1">
	          <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	            <i class="fas fa-bell fa-fw"></i>
	            <span class="badge badge-danger">9+</span>
	          </a>
	          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown">
	            <a class="dropdown-item" href="#">Action</a>
	            <a class="dropdown-item" href="#">Another action</a>
	            <div class="dropdown-divider"></div>
	            <a class="dropdown-item" href="#">Something else here</a>
	          </div>
	        </li>
	        <li class="nav-item dropdown no-arrow mx-1">
	          <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	            <i class="fas fa-envelope fa-fw"></i>
	            <span class="badge badge-danger">0</span>
	          </a>
	          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="messagesDropdown">
	            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modalNotificacaoApp">Notificar Usuários</a>
	            <div class="dropdown-divider"></div>
	            <a class="dropdown-item" href="#">Something else here</a>
	          </div>
	        </li>
	        <li class="nav-item dropdown no-arrow">
	          <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	            <i class="fas fa-user-circle fa-fw"></i>
	          </a>
	          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
	            <a class="dropdown-item" href="#">Settings</a>
	            <a class="dropdown-item" href="#">Activity Log</a>
	            <div class="dropdown-divider"></div>
	            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Sair</a>
	          </div>
	        </li>
	      </ul>
	    </nav>

	    <div id="wrapper">
	      <!-- Sidebar -->
	      <ul class="sidebar navbar-nav">
	        <li class="nav-item active">
	          <a class="nav-link" href="painel.php">
	            <i class="fas fa-fw fa-tachometer-alt"></i>
	            <span>Panel de controle</span>
	          </a>
	        </li>
	        <?php
	           if($_SESSION['tipo']){
	        ?>
    	        <li class="nav-item dropdown">
    	          <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    	           <i class="far fa-id-card"></i>
    	            <span>Master</span>
    	          </a>
    	          <div class="dropdown-menu" aria-labelledby="pagesDropdown">
    	            <h6 class="dropdown-header">Sistema:</h6>
    	            <div class="dropdown-divider"></div>
    	            <a class="dropdown-item" href="novoadm.php">Novo ADM</a>
    	            <a class="dropdown-item" href="tabela_adms.php">Lista de ADM's</a>
    	             <a class="dropdown-item" href="novacatraiz.php">Nova Categoria Raiz</a>
    	          </div>
    	        </li>
	        <?php
	            }
	        ?>
	        <li class="nav-item">
	          <a class="nav-link" href="charts.html">
	            <i class="fas fa-fw fa-chart-area"></i>
	            <span>Gráficos</span></a>
	        </li>
	        <li class="nav-item dropdown">
	          <a class="nav-link dropdown-toggle" href="#" id="tablesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	           <i class="fas fa-table"></i>
	            <span>Tabelas</span>
	            </a>
	            <div class="dropdown-menu" aria-labelledby="tablesDropdown">
	            <h6 class="dropdown-header">Repartições:</h6>
	            <div class="dropdown-divider"></div>
	            <a class="dropdown-item" href="tabela_categorias.php">Categorias</a>
                <a class="dropdown-item" href="tabela_profissionais.php">Perguntas</a>
                <a class="dropdown-item" href="tabela_profissionais.php">Profissionais</a>
                <a class="dropdown-item" href="forgot-password.html">Reclamações</a>
	          </div>
	        </li>
	      </ul>

	      <div id="content-wrapper">

	        <div class="container-fluid">

	          <!-- Breadcrumbs-->
	          <ol class="breadcrumb">
	            <li class="breadcrumb-item">
	              <a href="painel.php">Painel de Controle</a>
	            </li>
	            <li class="breadcrumb-item active">Estatísticas</li>
	          </ol>
              <div class="row">
                <div class="col-lg-8">
                  <div class="card mb-3">
                    <div class="card-header">
                      <i class="fas fa-chart-bar"></i>
                      Bar Chart Example</div>
                    <div class="card-body">
                      <canvas id="myBarChart" width="100%" height="50"></canvas>
                    </div>
                    <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="card mb-3">
                    <div class="card-header">
                      <i class="fas fa-chart-pie"></i>
                      Gráfico de setores - Tipos de Usuário</div>
                    <div class="card-body">
                      <canvas id="myChartPie" width="100%" height="100"></canvas>
                    </div>
                    <div class="card-footer small text-muted"></div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-8">
                  <div class="card mb-3">
                    <div class="card-header">
                      <i class="fas fa-chart-bar"></i>
                      Bar Chart Example</div>
                    <div class="card-body">
                      <canvas id="myBarChart" width="100%" height="50"></canvas>
                    </div>
                    <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="card mb-3">
                    <div class="card-header">
                      <i class="fas fa-chart-pie"></i>
                      Gráfico de radar - Categorias predominantes</div>
                    <div class="card-body">
                      <canvas id="myChartRadar" width="100%" height="100"></canvas>
                    </div>
                    <div class="card-footer small text-muted"></div>
                  </div>
                </div>
              </div>
              

	        <!-- /.container-fluid -->

	        <!-- Sticky Footer -->
	        <footer class="sticky-footer">
	          <div class="container my-auto">
	            <div class="copyright text-center my-auto">
	              <span>Copyright © MyP 2018</span>
	            </div>
	          </div>
	        </footer>

	      </div>
	      <!-- /.content-wrapper -->

	    </div>
	    <!-- /#wrapper -->

	    <!-- Scroll to Top Button-->
	    <a class="scroll-to-top rounded" href="#page-top">
	      <i class="fas fa-angle-up"></i>
	    </a>

	    <!-- Logout Modal-->
	    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	      <div class="modal-dialog" role="document">
	        <div class="modal-content">
	          <div class="modal-header">
	            <h5 class="modal-title" id="exampleModalLabel">Está pronto para ir?</h5>
	            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
	              <span aria-hidden="true">×</span>
	            </button>
	          </div>
	          <div class="modal-body">Selecione o botão "Sair" abaixo, se você deseja finalizar a sessão.</div>
	          <div class="modal-footer">
	            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
	            <a class="btn btn-outline-danger" href="logout.php">Sair</a>
	          </div>
	        </div>
	      </div>
	    </div>
	    
        <!-- Notificação App-->
    	<div class="modal fade" id="modalNotificacaoApp" tabindex="-1" role="dialog" aria-hidden="true" aria-labelledby="exampleModalLabel">
    		<div class="modal-dialog " role="document">
    			<div class="modal-content">
    				<div class="modal-header">
    					<h5 class="modal-title"><i class="fas fa-paper-plane"></i> Enviar notificação a todos os usuários</h5>
    					<button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
    				</div>
    				<div class="modal-body">
    					<div class="form-group">
    						<div class="form-label-group">
    							<input type="text" name="tituloNotifi" id="tituloNotificacao" class="form-control" placeholder="Título" required="required" autofocus="autofocus">
    							<label for="tituloNotificacao">Título da Notificação</label>
    						</div>
    					</div>
    					<div class="form-group">
    						<div class="form-label-group">
    							<input type="textarea" name="cntdNotifi" id="textNotificacao" class="form-control" placeholder="Conteúdo">
    							<label for="textNotificacao">Conteúdo da Mensagem</label>
    						</div>
    					</div>
        			    <div class="modal-footer">
        					<button class="btn btn-success" onClick="enviaDados()">Enviar</button>
        				</div>
    			    </div>    
    		    </div>    
    	    </div>    
        </div>    
        

	    <!-- Bootstrap core JavaScript-->
	    <script src="vendor/jquery/jquery.min.js"></script>
	    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

	    <!-- Core plugin JavaScript-->
	    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

	    <!-- Page level plugin JavaScript-->
	    <script src="vendor/chart.js/Chart.min.js"></script>
	    <script src="vendor/datatables/jquery.dataTables.js"></script>
	    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

	    <!-- Custom scripts for all pages-->
	    <script src="js/sb-admin.min.js"></script>
        <script>
            // Set new default font family and font color to mimic Bootstrap's default styling
            Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
            Chart.defaults.global.defaultFontColor = '#292b2c';
            // Gráfico de setor
            var ctx = document.getElementById("myChartPie");
            var myPieChart = new Chart(ctx, {
              type: 'radar',
              data: {
                labels: ["Profissionais", "Clientes","Administradores"],
                datasets: [{
                  data: [
                      <?php 
                        $sql = "SELECT COUNT(id_usuario) as idp FROM tb_profissional";
                        $row = $con->query($sql)->fetch_assoc();
                        $numP = $row['idp'];
                        echo $numP;
                      
                      ?>,
                      <?php 
                        $sql = "SELECT COUNT(id) as idu FROM tb_usuario";
                        $row = $con->query($sql)->fetch_assoc();
                        $numU = $row['idu'];
                        echo $numU - $numP;
              
                      ?>,
                      <?php 
                        $sql = "SELECT COUNT(id) as idadm FROM tb_adm";
                        $row = $con->query($sql)->fetch_assoc();
                        echo $row['idadm'];
  
                        ?>
                      ],
                  backgroundColor: ['#007bff', '#dc3545','#6413E8'],
                }],
              },
            });
        </script>
        <script>
            // Set new default font family and font color to mimic Bootstrap's default styling
            Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
            Chart.defaults.global.defaultFontColor = '#292b2c';
            // Gráfico de setor
            var ctx = document.getElementById("myChartRadar");
            var myPieChart = new Chart(ctx, {
              type: 'radar',
              data: {
                labels: [<?php ?>],
                datasets: [{
                  data: [
                      <?php 
                        $sql = "SELECT COUNT(id_usuario) as idp FROM tb_profissional";
                        $row = $con->query($sql)->fetch_assoc();
                        $numP = $row['idp'];
                        echo $numP;
                      
                      ?>,
                      <?php 
                        $sql = "SELECT COUNT(id) as idu FROM tb_usuario";
                        $row = $con->query($sql)->fetch_assoc();
                        $numU = $row['idu'];
                        echo $numU - $numP;
              
                      ?>,
                      <?php 
                        $sql = "SELECT COUNT(id) as idadm FROM tb_adm";
                        $row = $con->query($sql)->fetch_assoc();
                        echo $row['idadm'];
  
                        ?>
                      ],
                  backgroundColor: ['#007bff', '#dc3545','#6413E8'],
                }],
              },
            });
        </script>
	  </body>
	</html>
<?php
        $con->close();
	}else{
	    header("location: login.php");
	}
?>

