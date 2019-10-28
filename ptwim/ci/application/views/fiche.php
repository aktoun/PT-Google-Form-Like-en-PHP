<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>AdminLTE 2 | General Form Elements</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<!-- Bootstrap 3.3.7 -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower/bootstrap/dist/css/bootstrap.min.css">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower/font-awesome/css/font-awesome.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css">
	<!-- -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/skins/_all-skins.min.css">
	<!-- Google Font -->
	<link rel="stylesheet"
		href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
	<!-- Ionicons -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower/Ionicons/css/ionicons.min.css">
</head>

<body class="hold-transition skin-blue sidebar-mini">
	<?php
		$cle = $this->uri->segment(3);
	?>
	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">


		<!-- Main content -->
		<section class="content">
			<div class="row">
			<?php 

				if(isset($_SESSION['error']))  { 
			?>
					<div class="alert alert-danger alert-dismissible">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<?php echo $_SESSION['error']; ?>
					</div>
			<?php 
           		} elseif(isset($_SESSION['success'])) {
           	?>
					<div class="alert alert-success alert-dismissible">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<?php echo $_SESSION['success']; ?>
					</div>
			<?php 
            	} 
            ?>
				<!-- general form elements -->
				<div class="box box-default">
					<div class="box-header with-border">
						<h3 class="box-title">Répondre au formulaire</h3>
					</div>
					<!-- /.box-header -->
					<!-- form start -->
					<form action="<?php echo base_url(); ?>QuestionnaireController/enregistrerRep/<?php echo $cle ?>" method="POST">
						<div class="box-body">
		<?php
							$flaglistederoulante=TRUE;
							if($recup_question->num_rows() > 0) {
								foreach ($recup_question->result() as $question) {
		?>
									<h5 class="alert-box"><span class="_c-base-primary"><?php echo $question->label; ?> ?</span>
		<?php
									if($question->aide == NULL) {
										$aide = "Aucune aide pour cette question !";
									} else {
										$aide = $question->aide;
									}
		?>							<br>--<br>Aide : <?php echo $aide; ?></h5>
		<?php
									if($recup_reponse->num_rows() > 0) {
										foreach ($recup_reponse->result() as $reponse) { 
											if ($question->numquestion==$reponse->numquestion){
												if($question->type==1){
		?>
													<div class="box-body">
														<div class="form-group">
															<input class="form-control" name="reponse[]" type="text" placeholder="Réponse">
														</div>
													</div>
		<?php 					
												}elseif ($question->type==2) {
		?>
													<div class="box-body">
														<div class="form-group">
															<textarea cols="50" rows="2" name="reponse[]"></textarea><br>
														</div>
													</div>
		<?php 
												}elseif ($question->type==3) {
													if($flaglistederoulante){
														$flaglistederoulante=FALSE;
														echo "<SELECT name=\"reponse[]\">";
													}
		?>
													<OPTION><?php echo $reponse->labelreponse; ?></OPTION>
		<?php
												}elseif ($question->type==4) {
		?>
													<div class="box-body">
														<div class="form-group">
															<input name="reponse[]" type="checkbox" value="<?php echo $reponse->labelreponse; ?>"><?php echo $reponse->labelreponse; ?>
														</div>
													</div>
		<?php
												}elseif ($question->type==5) {
		?>
													<div class="box-body">
														<div class="form-group">
															<input name="reponse[]" id="Réponse" type="radio" value="<?php echo $reponse->labelreponse; ?>"><?php echo $reponse->labelreponse; ?>
														</div>
													</div>
													<?php
												}elseif ($question->type==6) {
		?>
													<label>
														<input type="date" name="reponse[]">
													</label>
		<?php
												}
											}
										}

										if($flaglistederoulante==FALSE){
											$flaglistederoulante=TRUE;
											echo "</SELECT>";
										}
									}
		?>

		<?php
								}
							}
		?>
							<div class="control-group text-center"><br>
								<button class="btn btn-success" type="submit" name="envoie">Submit</button>
								<a class="btn" href="/ci/UserController/profil.php">Quitter</button>
							</div>
						</div>
					</form>
				</div>
			</div>
			<!-- /.row -->
		</section>
		<!-- /.content -->
	</div>
	<!-- ./wrapper -->

	<!-- jQuery 3 -->
	<script src="<?php echo base_url(); ?>assets/bower/jquery/dist/jquery.min.js"></script>
	<!-- Bootstrap 3.3.7 -->
	<script src="<?php echo base_url(); ?>assets/bower/bootstrap/dist/js/bootstrap.min.js"></script>
	<!-- AdminLTE App -->
	<script src="<?php echo base_url(); ?>assets/dist/js/adminlte.min.js"></script>

</body>

</html>
