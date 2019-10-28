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
					<li><a href="<?php echo base_url(); ?>StatController/stat"><i class="fa fa-pie-chart"></i> <span>Mes formulaires (statistiques)</span></a></li>
					<li class="active"><a href="#"><i class="fa fa-laptop"></i> <span>Mon compte</span></a></li>
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
		<div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Photo de profil</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="POST" enctype="multipart/form-data">
              <div class="box-body">

                <div class="form-group">
                  <label>Mettre à jour ma photo</label>
                  <input type="file" name="avatar">

                </div>

              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary" name="avatar">Mettre à jour ma photo</button>
              </div>
            </form>
          </div>		


          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Personnalisation du compte</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="POST">
              <div class="box-body">
                <div class="form-group">
                  <label>Adresse e-mail :</label>
					<input type="text" name="newpseudo" placeholder="Pseudo" class="form-control" value="<?php echo $_SESSION['pseudo']; ?>">
                </div>
                <div class="form-group">
                  <label>Adresse e-mail :</label>
                  <input type="text" name="newmail" placeholder="Mail" class="form-control" value="<?php echo $_SESSION['email']; ?>">
                </div>
                <div class="form-group">
                  <label>Mot de passe :</label>
                  <input type="password" name="newmdp1" class="form-control" placeholder="Mot de passe">
                </div>
                <div class="form-group">
                  <label>Confirmation du mot de passe :</label>
                  <input type="password" name="newmdp2" class="form-control" placeholder="Confirmation du mot de passe">
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary" name="formMaj">Mettre à jour mon profil</button>
              </div>
            </form>
          </div>
						<!-- /.box -->
					</div>
					<!-- /.col -->
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
</body>

</html>
