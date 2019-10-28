<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>FORMCOOL | Connexion</title>
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<!-- main -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/main.css">
	<!-- Bootstrap 3.3.7 -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower/bootstrap/dist/css/bootstrap.min.css">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower/font-awesome/css/font-awesome.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css">
	<!-- Google Font -->
	<link rel="stylesheet"
		href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition login-page unik">
	<div class="login-box">
		<div class="login-logo">
			COOL<b>FORM</b> <small class="sm1">by N<small class="sm2">&</small>A</small>
		</div>
		<div class="login-box-body">
			<?php if(isset($_SESSION['error']))  { ?>
			<div class="alert alert-danger alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<?php echo $_SESSION['error']; ?>
			</div>
			<?php 
           		} ?>
			<p class="login-box-msg">CONNEXION</p>
			<!-- <form> -->
			<form action="" method="POST">
				<div class="form-group has-feedback">
					<input type="text" class="form-control" placeholder="Pseudo" name="pseudo">
					<span class="glyphicon glyphicon-user form-control-feedback"></span>
				</div>
				<div class="form-group has-feedback">
					<input type="password" class="form-control" placeholder="Mot de passe" name="password">
					<span class="glyphicon glyphicon-lock form-control-feedback"></span>
				</div>
				<button type="submit" class="btn btn-primary btn-block btn-flat" name="formConnexion">Se
					connecter</button>
			</form>
			<br>
			<p class="login-box-msg">Vous n'avez pas encore de compte ? <a href="inscription">Cliquez ici</a> !</p>
			<p class="login-box-msg">Revenir à la page d'accueil <a href="home">ICI</a></p>
		</div>
	</div>

</body>
<!-- jQuery 3 -->
<script src="<?php echo base_url(); ?>assets/bower/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url(); ?>assets/bower/bootstrap/dist/js/bootstrap.min.js"></script>

</html>
