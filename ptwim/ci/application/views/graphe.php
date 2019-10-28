<?php
  if(isset($_POST['data'])) {
    $tabreponsetype3a5=$_POST['data']->result_array();
  }
  if(isset($_POST['data5'])) {
    $tabres=$_POST['data5'];
  }
  if(isset($_POST['data3'])) {
    $tabnbrquestiontype3a5=$_POST['data3']->result_array();
  }
  if(isset($_POST['data4'])) {
    $tabnbrreponsetype3a5=$_POST['data4']->result_array();
  }
  if(isset($_POST['data2'])) {
    $tabquestiontype3a5=$_POST['data2']->result_array();
  }

  if(isset($_POST['data6'])) {
    $tabreponseautretype=$_POST['data6']->result_array();
  }
  if(isset($_POST['data7'])) {
    $tabquestionautretype=$_POST['data7']->result_array();
  }
  if(isset($_POST['data8'])) {
    $tabnbrquestionautretype=$_POST['data8']->result_array();
  }
  if(isset($_POST['data9'])) {
    $tabnbrreponseautretype=$_POST['data9']->result_array();
  }
?>

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

  <script src="https://www.amcharts.com/lib/4/core.js"></script>
  <script src="https://www.amcharts.com/lib/4/charts.js"></script>
  <script src="https://www.amcharts.com/lib/4/themes/animated.js"></script>

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
          <li><a href="<?php echo base_url(); ?>FormulaireController/index"><i class="fa fa-files-o"></i> <span>Creer un
                formulaire</span></a></li>
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
            <div class="box box-primary">
              <div class="box-header with-border">
                <i class="fa fa-bar-chart-o"></i>
                  <h3 class="box-title">Réponse au formulaire</h3>
                    <div class="box-tools pull-right">
                      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                      </button>
                      <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                  </div>
                  <div class="box-body">
        <?php
                    for ($i=0; $i < $tabnbrquestionautretype[0]['COUNT(*)']; $i++) { 
        ?>
                      <h3 class="box-title"><?php echo $tabquestionautretype[$i]['label']; ?>?</h3>
        <?php
                      for ($j=0; $j < $tabnbrreponseautretype[0]['COUNT(*)']; $j++) { 
                        if(($tabquestionautretype[$i]['numquestion'])===($tabreponseautretype[$j]['numquestion']) AND $tabreponseautretype[$j]['labelreponse']!=NULL){
                          echo "<p>";
                          echo $tabreponseautretype[$j]['labelreponse'];
                          echo "</p>";
                        }
                      }
                      echo "<br>";
                    }
        ?>

        <?php
                    for ($i=0; $i < $tabnbrquestiontype3a5[0]['COUNT(*)']; $i++) { 
        ?>
                      <h3 class="box-title"><?php echo $tabquestiontype3a5[$i]['label']; ?>?</h3>
                      <div id="<?php echo $i ?>" style="width: 100%; height: 500px;"></div>

        <?php
                    }
        ?>
                  </div>
                </div>
              </div>
            </div>
      </section>
    </div>
  </div>
  


<?php
  for ($i=0; $i < $tabnbrquestiontype3a5[0]['COUNT(*)']; $i++) { 
?>
    <script>
    am4core.ready(function() {
    am4core.useTheme(am4themes_animated);
    var chart = am4core.create("<?php echo $i ?>", am4charts.PieChart);

<?php

    echo "chart.data = [ ";
    for ($j=0; $j < $tabnbrreponsetype3a5[0]['COUNT(*)']; $j++) { 
      if(($tabquestiontype3a5[$i]['numquestion'])===($tabreponsetype3a5[$j]['numquestion']) AND $tabres[$j]['COUNT(*)']!=0){
        echo "{ \"country\": \"".$tabreponsetype3a5[$j]['labelreponse']."\",
      \"litres\":".$tabres[$j]['COUNT(*)']."},";
      }
    }
    echo "];";

?>

    chart.innerRadius = am4core.percent(50);

    var pieSeries = chart.series.push(new am4charts.PieSeries());
    pieSeries.dataFields.value = "litres";
    pieSeries.dataFields.category = "country";
    pieSeries.slices.template.stroke = am4core.color("#fff");
    pieSeries.slices.template.strokeWidth = 2;
    pieSeries.slices.template.strokeOpacity = 1;

    pieSeries.hiddenState.properties.opacity = 1;
    pieSeries.hiddenState.properties.endAngle = -90;
    pieSeries.hiddenState.properties.startAngle = -90;

    });
    </script>

<?php
  }
?>

</body>
</html>




