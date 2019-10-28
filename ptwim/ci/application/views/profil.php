<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>FORMCOOL | Profil de <?php echo $_SESSION['pseudo']; ?></title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<!-- main -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/main.css">
	<!-- Bootstrap 3.3.7 -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower/bootstrap/dist/css/bootstrap.min.css">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower/font-awesome/css/font-awesome.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css">
	<!-- DataTables -->
	<link rel="stylesheet"
		href="<?php echo base_url(); ?>assets/bower/datatables.net-bs/css/dataTables.bootstrap.min.css">
	<!-- -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/skins/_all-skins.min.css">
	<!-- Google Font -->
	<link rel="stylesheet"
		href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-blue sidebar-mini">
	<div class="wrapper">
		<header class="main-header">
			<div class="logo">
				<span class="logo-mini">C<b>F</b></span>
				<span class="logo-lg">COOL<b>FORM</b></span>
			</div>
			<nav class="navbar navbar-static-top">
				<a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
					<span class="sr-only">Toggle navigation</span>
				</a>
				<div class="navbar-custom-menu">
					<div class="btn">
						<a href="<?php echo base_url(); ?>AuthController/deconnexion"
							class="btn btn-default btn-flat">Déconnexion</a>
					</div>
				</div>
			</nav>
		</header>
		<aside class="main-sidebar">
			<section class="sidebar">
				<ul class="sidebar-menu" data-widget="tree">
					<li class="header">NAVIGATION</li>
					<li class="active"><a href="#"></i><span>Home</span></a></li>
					<li><a href="<?php echo base_url(); ?>FormulaireController/index"><i class="fa fa-files-o"></i> <span>Creer un formulaire</span></a></li>
					<li><a href="<?php echo base_url(); ?>StatController/stat"><i class="fa fa-pie-chart"></i> <span>Mes formulaires (statistiques)</span></a></li>
					<li><a href="<?php echo base_url(); ?>CompteController/compte"><i class="fa fa-laptop"></i> <span>Mon
								compte</span></a></li>
				</ul>
			</section>
		</aside>
		<div class="content-wrapper">
			<section class="content">
				<div class="row">
					<div class="col-xs-12">
						<div class="box box-primary">
							<div class="box-header">
								<h3 class="box-title">Tables des formulaires</h3>
							</div>
							<div class="box-body">
								<table id="example2" class="table table-bordered table-striped">
									<thead>
										<tr>
											<th>TITRE</th>
											<th>STATUT</th>
											<th>CLE DU FORMULAIRE</th>
											<th>ID CRÉATEUR</th>
											<th>OPTIONS</th>
										</tr>
									</thead>
									<tbody>
										<?php
                                		if($fetch_data->num_rows() > 0) {
                                    	foreach ($fetch_data->result() as $row) {
                                    ?>
										<tr>
											<td>
												<?php 
													if($row->statut == 0) {
														echo $row->titre;
													} elseif($row->statut == 1) {
												?>
												<b><a href='#' class="enregistrerRep" id="<?php echo $row->cle; ?>"><?php echo $row->titre; ?></a></b>
												<?php
													}
												?>
											</td>
											<?php 
                                        		if($row->statut == 0) {
                                            ?>
											<td>
												<div class="tm-status-circle cancelled"></div>DESACTIVÉ
											</td>
											<?php
                                        		} elseif($row->statut == 1) {
                                        	?>
											<td>
												<div class="tm-status-circle moving"></div>ACTIF
											</td>
											<?php
                                        		}
                                        	?>
											<td><?php echo $row->cle; ?></td>
											<td>#<?php echo $row->id; ?></td>

											<?php
                                        		if($row->id == $_SESSION['id']) {
                                        	?>
											<td class="text-center">
												<a href="#" class="on_data" id="<?php echo $row->cle; ?>">
													Activer
												</a> |
												<a href="#" class="off_data" id="<?php echo $row->cle; ?>">
													Désactiver
												</a> |
												<a href="#" class="delete_data" id="<?php echo $row->cle; ?>">
													Supprimer
												</a>
											</td>
											<?php
                                        		} else {
                                        	?>
											<td><b>-</b></td>
											<?php } ?>
										</tr>
										<?php
                                    	}
										} else {
										?>
										<tr>
											<td colspan="5">Aucunes données !</td>
										</tr>
										<?php
                                		}
                               			?>
									</tbody>
									<tfoot>
										<tr>
											<th>TITRE</th>
											<th>STATUT</th>
											<th>CLE DU FORMULAIRE</th>
											<th>ID CRÉATEUR</th>
											<th>OPTIONS</th>
										</tr>
									</tfoot>
								</table>
							</div>
						</div>
					</div>
				</div>
			</section>
		</div>

		<!-- jQuery 3 -->
		<script src="<?php echo base_url(); ?>assets/bower/jquery/dist/jquery.min.js"></script>
		<!-- Bootstrap 3.3.7 -->
		<script src="<?php echo base_url(); ?>assets/bower/bootstrap/dist/js/bootstrap.min.js"></script>
		<!-- AdminLTE App -->
		<script src="<?php echo base_url(); ?>assets/dist/js/adminlte.min.js"></script>

		<!-- DataTables -->
		<script src="<?php echo base_url(); ?>assets/bower/datatables.net/js/jquery.dataTables.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/bower/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
		<script>
			$(document).ready(function () {
				$('.delete_data').click(function () {
					var cle = $(this).attr("id");
					if (confirm("Voulez-vous vraiment supprimer ce formulaire ?")) {
						window.location = "<?php echo base_url(); ?>UserController/delete_data/" + cle;
					} else {
						return false;
					}
				});
				$('.off_data').click(function () {
					var cle = $(this).attr("id");
					window.location = "<?php echo base_url(); ?>UserController/off_data/" + cle;
				});
				$('.on_data').click(function () {
					var cle = $(this).attr("id");
					window.location = "<?php echo base_url(); ?>UserController/on_data/" + cle;
				});
				$('.enregistrerRep').click(function () {
					var cle = $(this).attr("id");
					window.location = "<?php echo base_url(); ?>QuestionnaireController/fiche/" + cle;
				});
			});

		</script>
		<script>
			$(function () {
				$('#example2').DataTable({
					'paging': true,
					'lengthChange': true,
					'searching': true,
					'ordering': true,
					'info': true,
					'autoWidth': false
				})
			})

		</script>
</body>

</html>
