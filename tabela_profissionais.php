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
		<title>Profissionais</title>

		<!-- Núcleo Bootstrap CSS-->
		<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
		
		<link href="vendor/bootstrap/css/style.css" rel="stylesheet">

		<!-- Customização de fontes-->
		<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

		<!-- Page level plugin CSS-->
		<link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

		<!-- Estilo de customização do template-->
		<link href="css/sb-admin.css" rel="stylesheet">
		
		<style type="text/css">
        a.dcontexto {
        	position: relative;
        	font: 12px arial, verdana, helvetica, sans-serif;
        	padding: 0;
        	color: white;
        	text-decoration: none;
        	z-index: 24;
        }
        a.dcontexto:hover {
        	background: transparent;
        	z-index: 25;
        }
        a.dcontexto span {
        	display: none;
        }
        a.dcontexto:hover span {
        	display: block;
        	position: absolute;
        	top: 0em;
        	text-align: justify;
        	left: 6em;
        	font: 12px Verdana, arial, helvetica, sans-serif;
        	padding: 5px 10px;
        	background: #dc3545;
        	color: #ffffff;
        	border-radius: 5px;
        }
        input[type="file"] { 
           display: none; 
        }
        
        .label-bordered {
           border: 1px solid #cecece;
           padding: 10px;
           border-radius: 5px;
        }

        </style>

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
         <script>
		    function enviaDados(){
                var ttl = document.getElementById("tituloNotificacao").value;
                var mens = document.getElementById("textNotificacao").value;
                document.getElementById("tituloNotificacao").value = '';
                document.getElementById("textNotificacao").value = '';
                window.location.href = "preNotifiApp.php?ttl="+ttl+"&mens="+mens;
		    }
		 </script>
		 <script type="text/javascript">
             $(document).ready(function () {
                 setInterval(function () {
                 $('#erro_zera_conta').fadeOut(1500);
                 }, 2000);
             });
         </script>
         <script type="text/javascript">
             $(document).ready(function () {
                 setInterval(function () {
                 $('#erro_email').fadeOut(1500);
                 }, 2000);
             });
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
							<li class="breadcrumb-item active">Tabela de Profissionais</li>
						</ol>
						  <?php
                             	if (isset($_SESSION['erro_zera_conta'])) {
                             		if($_SESSION['erro_zera_conta'] =='ERRO'){
                            ?>
                               <br><div id="erro_zera_conta" class="alert alert-warning>
                                   <i class="fas fa-exclamation-triangle">
                                       Erro ao zerar a conta do usuário, guarde o extrato e contate o técnico!
                			    </div>
                            <?php
                             			$_SESSION['erro_zera_conta']='OK';
                             		}
                             	}
                            ?>
                             <?php
                             	if (isset($_SESSION['email'])) {
                             		if($_SESSION['email'] =='ERRO'){
                            ?>
                               <br><div id="erro_email" class="alert alert-warning>
                                   <i class="fas fa-exclamation-triangle">
                                       Erro ao enviar o email ao usuário, guarde o comprovante e acione o técnico!
                			    </div>
                            <?php
                             			$_SESSION['email']='OK';
                             		}
                             	}
                            ?>
						<div class="card mb-3">
							<div class="card-header">
								<i class="fas fa-table"></i>
							Categorias</div>
							<div class="card-body">
								<div class="table-responsive">
									<?php
									$res = $con->query("SELECT * FROM tb_usuario JOIN tb_profissional ON tb_usuario.id = tb_profissional.id_usuario");
									if($res->num_rows>0){
										?>
										<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
											<thead>
												<tr>
													<th align="center">ID</th>
													<th align="center">Nome</th>
													<th align="center">CPF</th>
													<th align="center">Email</th>
													<th align="center">Saldo</th>
													<th></th>
												</tr>
											</thead>
											<tfoot>
												<tr>
													<th align="center">ID</th>
													<th align="center">Nome</th>
													<th align="center">CPF</th>
													<th align="center">E mail</th>
													<th align="center">Saldo</th>
													<th></th>
												</tr>
											</tfoot>
											<tbody>
												<?php
												while($row = $res->fetch_assoc()){
													?>
													<tr>
														<td align="center"><?php echo $row['id']?></td>
														<td align="center"><?php echo $row['primeiroNome'].' '. $row['sobrenome']?></td>
														<td align="center"><?php echo $row['cpf']?></td>
														 <?php
														        if($row['solicitou_retirada']){
														 ?>
														    <td align="center"><button type="button" class="btn btn-outline-success" style="width:100%; height:100%" data-toggle="modal" data-target="#modalEmailP" data-whateveremail="<?php echo $row['email']?>" data-whatevernome="<?php echo $row['primeiroNome'].' '. $row['sobrenome']?>"><?php echo $row['email']?></button><span style="display: none;">transferência</span></td>
														 <?php
														        }else{
														 ?>
														    <td align="center"><button type="button" class="btn btn-outline-dark" style="width:100%; height:100%" data-toggle="modal" data-target="#modalEmailP" data-whateveremail="<?php echo $row['email']?>" data-whatevernome="<?php echo $row['primeiroNome'].' '. $row['sobrenome']?>"><?php echo $row['email']?></button></td>
														 <?php
														        }
														 ?>
														<td>
														    <?php
														        if($row['solicitou_retirada']){
														    ?>
														        <a href="#" class="dcontexto"><button type="button" class="btn btn-success" style="width:100%; height:100%" data-toggle="modal" data-target="#modalDadosDeposito" 
														        data-whateverid="<?php echo $row ['id_usuario']?>" 
														        data-whatevercodbanc="<?php echo $row ['cod_banco']?>" 
														        data-whateverconta="<?php echo $row['conta']?>"
														        data-whatevernometit="<?php echo $row['nome_titular']?>"
														        data-whateveroperacao="<?php echo $row['operacao']?>"
														        data-whateveragencia="<?php echo $row['agencia']?>"
														        data-whatevernome="<?php echo $row['primeiroNome'].' '. $row['sobrenome']?>"
														        <i class="fas fa-lock-open"></i>
														        <?php echo '  R$'.$row['saldo'] ?></button><span>Você já enviou o email ao usuário?</span></a>
														    <?php        
														        }else{
														    ?>
														        <button type="button" class="btn btn-dark" style="width:100%; height:100%"><i class="fas fa-lock"></i><?php echo '  R$'.$row['saldo'] ?></button>
														    <?php      
														        }
														    ?>
													    </td>
													    <td>
													        <?php 
													            if($row['bloqueado']){
													       ?>
													       <button type="button" class="btn btn-success" style="width:100%; height:100%" data-toggle="modal" data-target="#modalBloqueio" 
															data-whateverid="<?php echo $row['id']?>" data-whateverbloq="<?php echo $row['bloqueado']?>" data-whateveruser="<?php echo $row['primeiroNome'].' '. $row['sobrenome']?>"><i class="fas fa-user"></i>  Desbloquear</button>
													        <?php       
													            }else{
													        ?>
													        <button type="button" class="btn btn-danger" style="width:100%; height:100%" data-toggle="modal" data-target="#modalBloqueio" 
															data-whateverid="<?php echo $row['id']?>" data-whateverbloq="<?php echo $row['bloqueado']?>" data-whateveruser="<?php echo $row['primeiroNome'].' '. $row['sobrenome']?>"><i class="fas fa-user-slash"></i> Bloquear</button>
															<?php
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
    							<input type="text" name="tituloNotifi" id="tituloNotificacao" class="form-control" placeholder="Título">
    							<label for="tituloNotificacao">Título da Notificação</label>
    						</div>
    					</div>
    					<div class="form-group">
    						<div class="form-label-group">
    							<input type="text" name="cntdNotifi" id="textNotificacao" class="form-control" placeholder="Conteúdo">
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
        
        <!-- Modal bloqueio-->
		<div class="modal fade" id="modalBloqueio" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title"></h5>
						<button class="close" type="button" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">×</span>
						</button>
					</div>
					<div class="modal-body">Deseja continuar?</div>
					<div class="modal-footer">
					    <form method="POST" action="bloq_or_unbloq.php">
					        <input type="hidden" id="iduserbloq" name="iduser">
					        
					        <button class="btn btn-outline-primary" type="submit">Continuar</button>
					    </form>
					</div>
				</div>
			</div>
		</div>
		
		 <!-- Modal Email Profissional-->
		<div class="modal fade" id="modalEmailP" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
        							<input type="text"  id="nome_email" name="nome_email" class="form-control" Readonly placeholder="Nome">
        							<label for="nome_email">Usuário</label>
        						</div>
    					    </div>
    					    <div class="form-group">
        						<div class="form-label-group">
        							<input type="text"  id="email_user" name="email_user" class="form-control" Readonly placeholder="Email">
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
    					</div>
    					<div class="modal-footer">
    					   <button class="btn btn-outline-success" type="submit">Enviar</button>
    					</div>
					</form>
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
		
		<!-- Modal dados de depósito-->
		<div class="modal fade" id="modalDadosDeposito" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title"></h5>
						<button class="close" type="button" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">×</span>
						</button>
					</div>
					<form method="POST" action="zera_conta.php">
    					<div class="modal-body">
    					    <div class="form-group">
        						<div class="form-label-group">
        							<input type="text"  id="nometit" name="nome_titular" class="form-control" disabled="disabled" placeholder="Nome Titular">
        							<label for="nometit">Titular da Conta</label>
        						</div>
    					    </div>
    					    <div class="form-group">
        						<div class="form-label-group">
        							<input type="text" id="codbanc" name="cod_banco"  class="form-control" disabled="disabled" placeholder="Banco">
        							<label for="codbanc">Banco</label>
        						</div>
    					    </div>
    					    <div class="form-group">
        						<div class="form-label-group">
        							<input type="text"  id="conta" name="conta" class="form-control" disabled="disabled" placeholder="Conta">
        							<label for="conta">Conta</label>
        						</div>
    					    </div>
    					     <div class="form-group">
        						<div class="form-label-group">
        							<input type="text" id="op" name="operacao" class="form-control" disabled="disabled" placeholder="Conta">
        							<label for="op">Operação</label>
        						</div>
    					    </div>
    					    <div class="form-group">
        						<div class="form-label-group">
        							<input type="text" id="agen" name="agencia" class="form-control" disabled="disabled" placeholder="Conta">
        							<label for="agen">Agência</label>
        						</div>
    					    </div>
    					    <p Style="color:#dc3545" align="center">Notifique somente após o envio do email e da transferência do dinheiro!</p>
    					</div>
    					<div class="modal-footer">
					        <input type="hidden" id="iduser" name="id">
					        <input type="hidden" id="nome" name="nome">
					        
					        <button class="btn btn-outline-success" type="submit">Notificar usuário</button>
					    </div>
			         </form>
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
			$('#modalBloqueio').on('show.bs.modal', function (event) {
				var button = $(event.relatedTarget) 
				var recipientid = button.data('whateverid')
				var recipientbloq = button.data('whateverbloq')
				var recipientuser = button.data('whateveruser')
              // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
              // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
              var modal = $(this)
                modal.find('.modal-title').text('Você está prestes a alterar a situação de '+ recipientuser+'.')

                modal.find('#iduserbloq').val(recipientid)
          })
      </script>
      <script type="text/javascript">
			$('#modalEmailP').on('show.bs.modal', function (event) {
				var button = $(event.relatedTarget) 
				var recipientnome = button.data('whatevernome')
				var recipientemail = button.data('whateveremail')
              // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
              // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
              var modal = $(this)
                modal.find('#nome_email').val(recipientnome)
                modal.find('#email_user').val(recipientemail)
          })
      </script>
      <script type="text/javascript">
			$('#modalDadosDeposito').on('show.bs.modal', function (event) {
				var button = $(event.relatedTarget) 
				var recipientid = button.data('whateverid') 
				var recipientcodbanc = button.data('whatevercodbanc') 
				var recipientconta = button.data('whateverconta') 
				var recipientnometit = button.data('whatevernometit') 
				var recipientop = button.data('whateveroperacao') 
				var recipientagencia = button.data('whateveragencia') 
				var recipientnome = button.data('whatevernome') 
              // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
              // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
              var modal = $(this)
                modal.find('.modal-title').text('Você está visualizando os dados '+ recipientnome+'.')
                modal.find('#nometit').val(recipientnometit)
                modal.find('#codbanc').val(recipientcodbanc)
                modal.find('#conta').val(recipientconta)
                modal.find('#op').val(recipientop)
                modal.find('#agen').val(recipientagencia)
                modal.find('#iduser').val(recipientid)
                modal.find('#nome').val(recipientnome)
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


