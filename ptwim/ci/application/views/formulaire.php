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
					<li class="active"><a href="#"><i class="fa fa-files-o"></i> <span>Creer un formulaire</span></a></li>
					<li><a href="<?php echo base_url(); ?>StatController/stat"><i class="fa fa-pie-chart"></i> <span>Mes formulaires (statistiques)</span></a></li>
					<li><a href="<?php echo base_url(); ?>CompteController/compte"><i class="fa fa-laptop"></i> <span>Mon
								compte</span></a></li>
				</ul>
			</section>
		</aside>

		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">


			<!-- Main content -->
			<section class="content">
				<div class="row">
					<div class="col-xs-12">
					<?php if(isset($_SESSION['error']))  { ?>
					<div class="alert alert-danger alert-dismissible">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<?php echo $_SESSION['error']; ?>
					</div>
					<?php 
           		} elseif(isset($_SESSION['success']))  {?>
					<div class="alert alert-success alert-dismissible">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<?php echo $_SESSION['success']; ?>
					</div>
					<?php 
            	} ?>
						<div class="alert alert-danger alert-dismissible">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							Pour les questions 'zones de texte', 'champs de texte' et 'date', merci de ne pas inscrire de réponses possibles.
						</div>
					<!-- general form elements -->
					<div class="box box-primary">
						<div class="box-header with-border">
							<h3 class="box-title">Création d'un nouveau formulaire</h3>
						</div>
						<!-- /.box-header -->
						<!-- form start -->
						<form role="form" action="create" method="POST">
							<div class="box-body">
								<div class="form-group">
									<label for="titre">Titre :</label>
									<input class="form-control" name="titre" id="titre" type="text" placeholder="Titre"><br>
								</div>
								<div class="form-group">
									<label for="email">Description :</label>
									<textarea class="form-control" id="description" name="description" rows="5" cols="35"
										maxlength="1000"></textarea><br>
								</div>
								<div class="form-group">
									<label for name="title_type">Type de question</label>
									<br>
									<SELECT name="type" size="1">
										<optgroup label="Choississez un type de question">
											<OPTION value=1>Champs de texte</OPTION>
											<OPTION value=2>Zone de texte</OPTION>
											<OPTION value=3>Liste déroulante</OPTION>
											<OPTION value=4>Cases à cocher</OPTION>
											<OPTION value=5>Bouton radio</OPTION>
											<OPTION value=6>Date</OPTION>
										</optgroup>
									</SELECT>
									<br><br>
								</div>
								<div class="form-group">
									<label for="person_1" class="clonable-increment-for">Question : </label>
									<input class="form-control" name="question" id="question" type="text"><br>
								</div>
								<div class="form-group">
									<label for="person_1" class="clonable-increment-for">Aide : (facultatif)</label>
									<input class="form-control" name="aide" id="aide" type="text"><br>
								</div>
								<div class="form-group">
									<label>Réponse(s)</label>
								</div>
								<div class="input-group control-group after-add-more">
									<input type="text" name="addmore[]" class="form-control" placeholder="Réponse">
									<div class="input-group-btn">
										<button class="btn btn-success add-more" type="button"><i class="glyphicon glyphicon-plus"></i>
											Nouvelle réponse</button>
									</div>
								</div>
								<div class="control-group text-center"><br>
									<button class="btn btn-success" type="submit" name="ok">Création du formulaire et/ou Nouvelle question</button>
									<button class="btn btn-warning" type="submit" name="quitter">Abandonner la création de ce formulaire</button>
								</div>
							</div>

						</form>
						<!-- Copy Fields -->
						<div class="copy hide">
							<div class="control-group input-group" style="margin-top:10px">
								<input type="text" name="addmore[]" class="form-control" placeholder="Réponse">
								<div class="input-group-btn">
									<button class="btn btn-danger remove" type="button"><i class="glyphicon glyphicon-remove"></i>
										Supprimer cette réponse</button>
								</div>
							</div>
						</div>
					</div>
				</div>
				</div>
				<!-- /.row -->
			</section>
			<!-- /.content -->
		</div>

	</div>
	<!-- ./wrapper -->

	<!-- jQuery 3 -->
	<script src="<?php echo base_url(); ?>assets/bower/jquery/dist/jquery.min.js"></script>
	<!-- Bootstrap 3.3.7 -->
	<script src="<?php echo base_url(); ?>assets/bower/bootstrap/dist/js/bootstrap.min.js"></script>
	<!-- AdminLTE App -->
	<script src="<?php echo base_url(); ?>assets/dist/js/adminlte.min.js"></script>

	<!--  -->
	<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js"
		integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous">
	</script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"
		integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous">
	</script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"
		integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous">
	</script>
	<!--  -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<!--  -->
	<script src="https://code.jquery.com/jquery-3.4.0.slim.min.js"
		integrity="sha384-7WBfQYubrFpye+dGHEeA3fHaTy/wpTFhxdjxqvK04e4orV3z+X4XC4qOX3qnkVC6" crossorigin="anonymous">
	</script>
	<script src="https://netdna.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/jquery.cloner.min.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
	<script type="text/javascript">
		$(document).ready(function () {
			$(".add-more").click(function () {
				var html = $(".copy").html();
				$(".after-add-more").after(html);
			});
			$("body").on("click", ".remove", function () {
				$(this).parents(".control-group").remove();

			});
		});

	</script>

</body>

</html>
