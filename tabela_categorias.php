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
		<title>Categorias</title>

		<!-- Núcleo Bootstrap CSS-->
		<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
			<link href="vendor/bootstrap/css/style.css" rel="stylesheet">

		<!-- Customização de fontes-->
		<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

		<!-- Page level plugin CSS-->
		<link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

		<!-- Estilo de customização do template-->
		<link href="css/sb-admin.css" rel="stylesheet">

		<script src="vendor/jquery/jquery.min.js"></script>
		<script type="text/javascript">
			$(document).ready(function() {
				$('#dataTable').dataTable( {
					"language": {
						"url": "traducoes/traducao_table.txt"
					}
				} );
			} );
		</script>
		<script type="text/javascript">
           $(document).ready(function () {
               setInterval(function () {
               $('#suc_cadascat').fadeOut(1500);
               }, 2000);
           });
        </script>
        <script type="text/javascript">
             $(document).ready(function () {
                 setInterval(function () {
                 $('#erro_cadascat').fadeOut(1500);
                 }, 2000);
             });
         </script>
         <script type="text/javascript">
             $(document).ready(function () {
                 setInterval(function () {
                 $('#erro_del_cat').fadeOut(1500);
                 }, 2000);
             });
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
    	            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modalEmail">Enviar E-mail</a>
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
							<a class="dropdown-item" href="novoadm.php">Perguntas</a>
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
							<li class="breadcrumb-item active">Tabela de Categorias</li>
						</ol>
						
						<?php
						if (isset($_SESSION['cadas_cat'])) {
							if($_SESSION['cadas_cat']=='OK'){
							    $_SESSION['cadas_cat']='NEUTRO';
								?>
								<br><div id="suc_cadascat" class="alert alert-success">
									<i class="fas fa-check"></i>
									Cadastro feito com sucesso!
								</div>
						<?php
						        
							}else if($_SESSION['cadas_cat']=='ERRO'){
							    $_SESSION['cadas_cat']='NEUTRO';
								?>
								<br><div id="erro_cadascat" class="alert alert-danger">
									<i class="fas fa-exclamation-triangle"></i>
									Erro!
								</div>
						<?php
						        
							}
						}
						?>
						
						<?php
						if (isset($_SESSION['erro_delete_cat'])) {
							if($_SESSION['erro_delete_cat']=='ERRO'){
							    $_SESSION['erro_delete_cat']='NEUTRO';
								?>
								<br><div id="erro_del_cat" class="alert alert-danger">
									<i class="fas fa-check"></i>
									Houve um erro ao tentar deletar a categoria!
								</div>
						<?php
						        
							}
						}
						?>
						<div class="card mb-3">
							<div class="card-header">
								<i class="fas fa-table"></i>
								<?php 
								    $sql="SELECT COUNT(id) as c_id FROM tb_categoria";
								    $row = $con->query($sql)->fetch_assoc();
								    echo $row['c_id'];
								?>
							Categorias</div>
							<div class="card-body">
								<div class="table-responsive">
									<?php
									$res = $con->query("SELECT * FROM tb_categoria");
								
									if($res->num_rows>0){
										?>
										<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
											<thead>
												<tr>
													<th align="center">ID</th>
													<th align="center">Categoria</th>
													<th align="center">Categoria Pai</th>
													<th></th>
													<th></th>
												</tr>
											</thead>
											<tfoot>
												<tr>
													<th align="center">ID</th>
													<th align="center">Categoria</th>
													<th align="center">Categoria Pai</th>
													<th></th>
													<th></th>
												</tr>
											</tfoot>
											<tbody>
												<?php
												while($row = $res->fetch_assoc()){
													?>
													<tr>
														<td align="center"><?php echo $row['id']?></td>
														<td align="center"><?php echo $row['categoria']?></td>
														<td align="center"><?php
														if($row['id_cat_pai']!=null){
														    $id_pai = $row['id_cat_pai'];
														    $sql ="SELECT categoria as ct FROM tb_categoria WHERE id = '$id_pai'" ;
														    $r = $con->query($sql)->fetch_assoc();
															echo $r['ct'];
														}else{
															echo "<b>Raiz</b>";
														}
														?></td>
														<td><button type="button" class="btn btn-success" style="width:100%; height:100%" data-toggle="modal" data-target="#modalinse" 
															data-whateverid="<?php echo $row['id']?>" data-whatevercat="<?php echo $row['categoria']?>">
															<i class="fas fa-plus"></i>
														    </button>
													    </td>
													    <td>
													        <?php
													            $id = $row['id'];
													            $sql="SELECT id FROM tb_categoria WHERE id_cat_pai = '$id'";
													            if($con->query($sql)->num_rows==0){
													                $sql="SELECT id FROM tb_servico WHERE categoria = '$id'";
													                if($con->query($sql)->num_rows==0){
													           ?>
													                   <button type="button" class="btn btn-danger" style="width:100%; height:100%" data-toggle="modal" data-target="#modalDel" 
                														    data-whateverid="<?php echo $id?>" 
                														    data-whatevercat="<?php echo $row['categoria']?>">
                														<i class="fas fa-trash-alt"></i>
                													    </button>
                											<?php
													                }else{
													                    echo "";
													    
													                }
													                echo "";
													            }
													            
													        ?>
													    </td>
												</tr>
												<?php
											}
											?>
										</tbody>
									</table>
									<?php
								}else{
									?>
									<p align="center">Os dados não puderam ser carregados</p>
									<?php
								}
								?>
							</div>
						</div>
						<div class="card-footer small text-muted">Atualizado em tempo real</div>
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
						<a class="btn btn-danger" href="logout.php">Sair</a>
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
        					<button class="btn btn-outline-success" onClick="enviaDados()">Enviar</button>
        				</div>
    			    </div>    
    		    </div>    
    	    </div>    
        </div>
        <!-- Modal Email-->
		<div class="modal fade" id="modalEmail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title"><i class="fas fa-envelope"></i> Enviar email</h5>
						<button class="close" type="button" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">×</span>
						</button>
					</div>
					<form method="POST" action="enviarEmail.php">
					    <div class="modal-body">
					        <div class="form-group">
        						<div class="form-label-group">
        							<input type="text"  id="nome_email" name="nome_email" class="form-control" placeholder="Nome">
        							<label for="nome_email">Usuário</label>
        						</div>
    					    </div>
    					    <div class="form-group">
        						<div class="form-label-group">
        							<input type="text"  id="email_user" name="email_user" class="form-control" placeholder="Email">
        							<label for="email_user">Email</label>
        						</div>
    					    </div>
			                <div class="form-group">
        						<div class="form-label-group">
        							<input type="text"  id="assnt" name="assnt" class="form-control" placeholder="Assunto" required="required" autofocus="autofocus">
        							<label for="assnt">Assunto</label>
        						</div>
    					    </div>
    					    <div class="form-group">
        						<div class="form-label-group">
        							<input type="textarea"  id="msn" name="msn" class="form-control"  placeholder="Mensagem" required="required" autofocus="autofocus">
        							<label for="msn">Mensagem</label>
        						</div>
    					    </div>
                            <div class="form-group">
                                 <label for="fupload" class="control-label label-bordered">Clique aqui para escolher um arquivo</label>
                                 <div class="nomeArquivo"></div>
                                 <input type="file" id="fupload" name="fupload" class="fupload form-control" />
                             </div>
                             <input type="hidden"  id="pg" name="pg" required="required" value=<?php echo basename($_SERVER['PHP_SELF'],'.php').'.php'; ?>
    					</div>
    					<div class="modal-footer">
    					   <button class="btn btn-outline-success" type="submit">Enviar</button>
    					</div>
					</form>
				</div>
			</div>
		</div>
		
		<!--Modal Insere-->
		<div class="modal fade" id="modalinse" tabindex="-1" role="dialog" aria-hidden="true" aria-labelledby="exampleModalLabel">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title"></h5>
						<button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
					</div>
					<form method="POST" action="cadascat.php">
						<div class="modal-body">
							<div class="form-group" style="padding-top:20px; padding-bottom:20px;">
								<div class="form-label-group">
									<input type="text" name="inputCat" id="inputNomeCat" class="form-control" placeholder="Nome da Categoria" required="required" autofocus="autofocus">
									<label for="inputNomeCat">Nome da categoria</label>
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<input type="hidden" id="idcatpai" name="idcatpai">
							<button type="submit" class="btn btn-outline-primary">Cadastrar</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		
    	<!--Modal Deleta-->
    	<div class="modal fade" id="modalDel" tabindex="-1" role="dialog" aria-hidden="true" aria-labelledby="exampleModalLabel">
    		<div class="modal-dialog" role="document">
    			<div class="modal-content">
    				<div class="modal-header">
    					<h5 class="modal-title"></h5>
    					<button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
    				</div>
    				<div class="modal-body">
    					<form  method="POST" action="deletacat.php">
    						<p>Deseja continuar?</p>
    						<div>
    							<div class="modal-footer">
    								<input type="hidden" id="idcat" name="idcat_del">
    								<button type="submit" class="btn btn-outline-danger">Deletar</button>
    							</div>
    						</div>
    					</form>
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

		<!-- Demo scripts for this page-->
		<script src="js/demo/datatables-demo.js"></script>
		<script src="js/demo/chart-area-demo.js"></script>
		
		<script type="text/javascript">
			$('#modalinse').on('show.bs.modal', function (event) {
				var button = $(event.relatedTarget) 
				var recipientid = button.data('whateverid')
				var recipientcat = button.data('whatevercat')
              // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
              // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
              var modal = $(this)
              modal.find('.modal-title').text('Subcategoria de '+ recipientcat+'.')
              modal.find('#idcatpai').val(recipientid)
          })
      </script>
      
      <script type="text/javascript">
			$('#modalDel').on('show.bs.modal', function (event) {
				var button = $(event.relatedTarget) 
				var recipientid = button.data('whateverid')
				var recipientcat = button.data('whatevercat')
              // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
              // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
              var modal = $(this)
              modal.find('.modal-title').text('Você está prestes a deletar '+ recipientcat+'.')
              modal.find('#idcat').val(recipientid)
          })
      </script>

  </body>

  </html>
  <?php
  $con->close();
}else{
	header("location: login.php");
}
?>


