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
  							<li><a href="<?php echo base_url(); ?>UserController/profil"><i
  										class="fa fa-dashboard"></i><span>Home</span></a></li>
  							<li class="active"><a href="#"><i class="fa fa-files-o"></i> <span>Creer un formulaire</span></a>
  							</li>
                <li><a href="<?php echo base_url(); ?>StatController/stat"><i class="fa fa-pie-chart"></i> <span>Mes formulaires (statistiques)</span></a></li>
  							<li><a href="<?php echo base_url(); ?>CompteController/compte"><i class="fa fa-laptop"></i>
  									<span>Mon compte</span></a></li>
  						</ul>
  					</section>
  				</aside>
