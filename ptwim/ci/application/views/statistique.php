<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>FORMCOOL | Connexion</title>
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<!-- Bootstrap 3.3.7 -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower/bootstrap/dist/css/bootstrap.min.css">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower/font-awesome/css/font-awesome.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower/Ionicons/css/ionicons.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css">
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
					<li><a href="<?php echo base_url(); ?>UserController/profil"></i><span>Home</span></a></li>
					<li><a href="<?php echo base_url(); ?>FormulaireController/index"><i class="fa fa-files-o"></i> <span>Creer un formulaire</span></a></li>
					<li  class="active"><a href="#"><i class="fa fa-pie-chart"></i> <span>Mes formulaires (statistiques)</span></a></li>
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
											<th>DONNEES / STATISTIQUES</th>
											<th>CLE DU FORMULAIRE</th>
										</tr>
									</thead>
									<tbody>
										<?php
                                		if($fetch_data->num_rows() > 0) {
                                    	foreach ($fetch_data->result() as $row) {
                                    ?>
										<tr>
											<td>
												<b><?php echo $row->titre; ?></b>
											</td>
								
											<?php
                                        		if($row->id == $_SESSION['id']) {
                                        	?>
											<td class="text-center">
												<a href="#" class="enregistrerRep" id="<?php echo $row->cle; ?>">voir stat</a>
											</td>
											<td><?php echo $row->cle; ?></td>
											<?php
                                        		}
                                        	?>
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
											<th>DONNEES / STATISTIQUES</th>
											<th>CLE DU FORMULAIRE</th>
										</tr>
									</tfoot>
								</table>
							</div>
						</div>
					</div>
				</div>
			</section>
		</div>



	</div>
	<!-- ./wrapper -->

</body>
<!-- jQuery 3 -->
<script src="<?php echo base_url(); ?>assets/bower/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url(); ?>assets/bower/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>assets/dist/js/adminlte.min.js"></script>

<script>
			$(document).ready(function () {
				$('.enregistrerRep').click(function () {
					var cle = $(this).attr("id");
					window.location = "<?php echo base_url(); ?>StatController/graphe/" + cle;
				});
			});

</script>
</html>
