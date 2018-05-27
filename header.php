<?php
  session_start();
  $host  = $_SERVER['HTTP_HOST'];
  $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
  session_start();
  if(!isset($_SESSION['id'])){
    header("Location: http://$host$uri/index.php");
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>INSTRUMENTI</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="images/icons/favicon.ico">
    <link rel="apple-touch-icon" href="images/icons/favicon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="images/icons/favicon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="images/icons/favicon-114x114.png">
    <!--Loading bootstrap css-->
    <link type="text/css" rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,400,300,700">
    <link type="text/css" rel="stylesheet" href="http://fonts.googleapis.com/css?family=Oswald:400,700,300">
    <link type="text/css" rel="stylesheet" href="styles/jquery-ui-1.10.4.custom.min.css">
    <link type="text/css" rel="stylesheet" href="styles/font-awesome.min.css">
    <link type="text/css" rel="stylesheet" href="styles/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="styles/animate.css">
    <link type="text/css" rel="stylesheet" href="styles/all.css">
    <link type="text/css" rel="stylesheet" href="styles/main.css">
    <link type="text/css" rel="stylesheet" href="styles/style-responsive.css">
    <link type="text/css" rel="stylesheet" href="styles/zabuto_calendar.min.css">
    <link type="text/css" rel="stylesheet" href="styles/pace.css">
    <link type="text/css" rel="stylesheet" href="styles/jquery.news-ticker.css">
</head>
<body>
    <div>
        <!--BEGIN BACK TO TOP-->
        <a id="totop" href="#"><i class="fa fa-angle-up"></i></a>
        <!--END BACK TO TOP-->
        <!--BEGIN TOPBAR-->
        <div id="header-topbar-option-demo" class="page-header-topbar">
            <nav id="topbar" role="navigation" style="margin-bottom: 0;" data-step="3" class="navbar navbar-default navbar-static-top">
            <div class="navbar-header">
                <button type="button" data-toggle="collapse" data-target=".sidebar-collapse" class="navbar-toggle"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
                <a id="logo" href="pocetna.php" class="navbar-brand"><span class="fa fa-rocket"></span><span class="logo-text">INSTRUMENTI</span><span style="display: none" class="logo-text-icon">µ</span></a></div>
                <div class="topbar-main"><a id="menu-toggle" href="#" class="hidden-xs"><i class="fa fa-bars"></i></a>
                
                <div class="news-update-box hidden-xs"><span class="text-uppercase mrm pull-left text-white">Novosti:</span>
                    <ul id="news-update" class="ticker list-unstyled">
                        <li></li>
                    </ul>
                </div>
                <ul class="nav navbar navbar-top-links navbar-right mbn">
                    <li class="dropdown topbar-user"><a data-hover="dropdown" href="#" class="dropdown-toggle"><img src="images/avatar/48.jpg" alt="" class="img-responsive img-circle"/>&nbsp;<span class="hidden-xs"><?php echo ucfirst($_SESSION['korisnik']); ?></span>&nbsp;<span class="caret"></span></a>
                        <ul class="dropdown-menu dropdown-user pull-right">
                            <li><a href="odjava.php"><i class="fa fa-key"></i>Odjava</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
        </div>

        <!--END TOPBAR-->
        <div id="wrapper">


            <!--BEGIN SIDEBAR MENU-->
            <nav id="sidebar" role="navigation" data-step="2" data-intro="Template has &lt;b&gt;many navigation styles&lt;/b&gt;"
                data-position="right" class="navbar-default navbar-static-side">
                <div class="sidebar-collapse menu-scroll">
                    <ul id="side-menu" class="nav">
                        <div class="clearfix"></div>
                       
                        <?php if($_SESSION['admin'] == 1) { ?>

			<li <?php if($_SERVER["PHP_SELF"] == "$uri/lista.php") echo 'class="active"'; ?> >
                            <a href="lista.php">
                               <span class="menu-title">Artikli</span>
                            </a>
                        </li>

			<li <?php if($_SERVER["PHP_SELF"] == "$uri/lista_n.php") echo 'class="active"'; ?> >
                            <a href="lista_n.php">
                               <span class="menu-title">Narudžbe</span>
                            </a>
                        </li>

                        <li <?php if($_SERVER["PHP_SELF"] == "$uri/proizvodjaci.php") echo 'class="active"'; ?> >
                            <a href="proizvodjaci.php">
                               <span class="menu-title">Dodajte proizvođača</span>
                            </a>
                        </li>

                        <li <?php if($_SERVER["PHP_SELF"] == "$uri/instrumenti.php") echo 'class="active"'; ?> >
                            <a href="instrumenti.php">
                            <span class="menu-title">Dodajte instrument</span>
                            </a>
                        </li>

                        <?php } 

			
				else { ?>

					<li <?php if($_SERVER["PHP_SELF"] == "$uri/lista.php") echo 'class="active"'; ?> >
                            <a href="lista.php">
                               <span class="menu-title">Artikli</span>
                            </a>

                        </li>
					
					<li <?php if($_SERVER["PHP_SELF"] == "$uri/narudzba.php") echo 'class="active"'; ?> >
                            <a href="narudzba.php">
                               <span class="menu-title">Narudžba</span>
                            </a>

                        </li>


			
<?php	}
			?>


                   </ul>
                </div>
            </nav>
            <!--END SIDEBAR MENU-->
            <!--BEGIN PAGE WRAPPER-->
            <div id="page-wrapper">