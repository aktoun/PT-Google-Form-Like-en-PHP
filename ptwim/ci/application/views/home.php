<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>COOLFORM | Accueil</title>
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
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

<body class="hold-transition layout-top-nav">
	<div class="wrapper">


		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">

			<!-- Main content -->
			<section class="content">

				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<!-- The time line -->
						<ul class="timeline">
							<!-- timeline time label -->
							<li class="time-label">
								<span class="bg-red">
									COOLFORM est développement ...
								</span>
							</li>
							<!-- /.timeline-label -->
							<!-- timeline item -->
							<li>
								<i class="fa fa-info bg-blue"></i>

								<div class="timeline-item">


									<h3 class="timeline-header"><b>Info!</b></h3>

									<div class="timeline-body">
										Vous n'êtes pas connecté ! Vous pouvez seulement répondre aux questionnaires
										ci-dessous.<br>Pour répondre à un formulaire, vérifiez qu'il est bien
										<b>actif</b> et non désactivé puis cliquez sur son titre.<br>Pour créer un
										formulaire, veuillez vous <a
											href="<?php echo base_url(); ?>AuthController/connexion"><b>connecter</b></a>
										et si vous n'avez pas de compte, veuillez vous <a
											href="<?php echo base_url(); ?>AuthController/inscription"><b>inscrire</b></a>
										!
									</div>

								</div>
							</li>
							<!-- END timeline item -->

							<li>
								<i class="fa fa-clock-o bg-gray"></i>
							</li>
						</ul>
					</div>
					<!-- /.col -->
				</div>
				<!-- /.row -->
			</section>
			<section class="content">
				<div class="row">
					<div class="col-xs-12">
						<div class="box">
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
												<b><a href='#' class="enregistrerRep"
														id="<?php echo $row->cle; ?>"><?php echo $row->titre; ?></a></b>
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
<!-- DataTables -->
<script src="<?php echo base_url(); ?>assets/bower/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/bower/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script>
	$(document).ready(function () {
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

</html>
