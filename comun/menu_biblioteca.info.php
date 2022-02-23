<?php
session_start();
$id=$_SESSION["usuario_id"];
require("autentificator/aut_verifica.inc.php");
if(empty($_SESSION['usuario_id'])) {
    header("Location: ../../comun/mensajes/error_session.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
    <head>

	<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
	
		<!-- CSS -->
		<link rel="stylesheet" href="../comun/css/style.css" type="text/css" media="screen" />
		<link rel="stylesheet" href="../comun/css/social-icons.css" type="text/css" media="screen" />
		<!--[if IE 8]>
			<link rel="stylesheet" type="text/css" media="screen" href="css/ie8-hacks.css" />
		<![endif]-->
		<!-- ENDS CSS -->			
		<!-- GOOGLE FONTS 
		<link href='http://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css'>-->		
		<!-- JS -->
		<script type="text/javascript" src="../comun/funciones/js/jquery-1.5.1.min.js"></script>
		<script type="text/javascript" src="../comun/funciones/js/jquery-ui-1.8.13.custom.min.js"></script>
		<script type="text/javascript" src="../comun/funciones/js/easing.js"></script>
		<script type="text/javascript" src="../comun/funciones/js/jquery.scrollTo-1.4.2-min.js"></script>
		<script type="text/javascript" src="../comun/funciones/js/jquery.cycle.all.js"></script>
		<script type="text/javascript" src="../comun/funciones/js/custom.js"></script>
		
		<!-- Isotope -->
		<script src="../comun/funciones/js/jquery.isotope.min.js"></script>
		
		<!--[if IE]>
			<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		
		<!--[if IE 6]>
			<script type="text/javascript" src="js/DD_belatedPNG.js"></script>
			<script>
	      		/* EXAMPLE */
	      		//DD_belatedPNG.fix('*');
	    	</script>
		<![endif]-->
		<!-- ENDS JS -->
		
		
		<!-- Nivo slider -->
		<link rel="stylesheet" href="../comun/css/nivo-slider.css" type="text/css" media="screen" />
		<script src="../comun/funciones/js/nivo-slider/jquery.nivo.slider.js" type="text/javascript"></script>
		<!-- ENDS Nivo slider -->
		
		<!-- tabs -->
		<link rel="stylesheet" href="../comun/css/tabs.css" type="text/css" media="screen" />
		<script type="text/javascript" src="../comun/funciones/js/tabs.js"></script>
  		<!-- ENDS tabs -->
  		
  		<!-- prettyPhoto -->
		<script type="text/javascript" src="../comun/funciones/js/prettyPhoto/js/jquery.prettyPhoto.js"></script>
		<link rel="stylesheet" href="../comun/funciones/js/prettyPhoto/css/prettyPhoto.css" type="text/css" media="screen" />
		<!-- ENDS prettyPhoto -->
		
		<!-- superfish -->
		<link rel="stylesheet" media="screen" href="../comun/css/superfish.css" /> 
		<link rel="stylesheet" media="screen" href="../comun/css/superfish-left.css" /> 
		<script type="text/javascript" src="../comun/funciones/js/superfish-1.4.8/js/hoverIntent.js"></script>
		<script type="text/javascript" src="../comun/funciones/js/superfish-1.4.8/js/superfish.js"></script>
		<script type="text/javascript" src="../comun/funciones/js/superfish-1.4.8/js/supersubs.js"></script>
		<!-- ENDS superfish -->
		
		<!-- poshytip -->
		<link rel="stylesheet" href="../comun/funciones/js/poshytip-1.0/src/tip-twitter/tip-twitter.css" type="text/css" />
		<link rel="stylesheet" href="../comun/funciones/js/poshytip-1.0/src/tip-yellowsimple/tip-yellowsimple.css" type="text/css" />
		<script type="text/javascript" src="../comun/funciones/js/poshytip-1.0/src/jquery.poshytip.min.js"></script>
		<!-- ENDS poshytip -->
		
		<!-- Tweet -->
		<link rel="stylesheet" href="../comun/css/jquery.tweet.css" media="all"  type="text/css"/> 
		<script src="../comun/funciones/js/tweet/jquery.tweet.js" type="text/javascript"></script> 
		<!-- ENDS Tweet -->
		
		<!-- Fancybox -->
		<link rel="stylesheet" href="../comun/funciones/js/jquery.fancybox-1.3.4/fancybox/jquery.fancybox-1.3.4.css" type="text/css" media="screen" />
		<script type="text/javascript" src="../comun/funciones/js/jquery.fancybox-1.3.4/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
		<!-- ENDS Fancybox -->
		<script>
		//////////////////////////////////////modal
		</script>
	<script type="text/javascript" language="javascript" src="../comun/funciones/js/jquery.dataTables.js"></script> 
<style type="text/css" title="currentStyle"> 
			@import "../../comun/funciones/css/demo_page.css";
			@import "../../comun/funciones/css/demo_table.css";
		</style> 		
<script type="text/javascript" charset="utf-8"> 
			$(document).ready(function() {
				$('#example').dataTable();
			} );
</script> 
	</head>
	
	<body class="home">

			<!-- HEADER -->
			<!-- ENDS HEADER -->
            <!-- Menu -->
<div id="menu">
			
			
			
				 <!-- ENDS menu-holder -->
  </div>
	<div id="menu-holder">
			
					<!-- wrapper-menu -->
                    
			<div class="wrapper">
					<div align="right"><!-- Navigation -->
			  </div>
	<ul id="nav" class="sf-menu">
			<li class="current-menu-item"><a href="<? echo $servidor."/biblioteca.info/index.php"; ?>">Inicio<span class="subheader">Bienvenido</span></a></li>
	  <li><a href="#">Sedes Biblioteca<span class="subheader"><? echo utf8_decode('Mi Sede'); ?></span></a>
      	<ul>
         <li><a href="#"><span class="subheader"><? echo utf8_decode('Medellin'); ?></span></a>
         	<ul>
        		<li><a href="#"><span class="subheader"><? echo utf8_decode('Datos para Elogim'); ?></span></a>      
                    <ul>
                    <li><a href="<? echo $servidor."/biblioteca.info/empleados.php"; ?>"><? echo utf8_decode('Usuarios Biblioteca'); ?></a></li>                  
                    </ul>
	  			</li>     		
        		<li><a href="#"><span class="subheader"><? echo utf8_decode('Datos para EZProxy'); ?></span></a>      
                    <ul>
                   <li><a href="<? echo $servidor."/biblioteca.info/estudiantes_pre.php"; ?>"><? echo utf8_decode('Estudiantes Pregrado'); ?></a></li>
                    <li><a href="<? echo $servidor."/biblioteca.info/estudiantes_pos.php"; ?>"><? echo ('Estudiantes Posgrado'); ?></a></li>
                     <li><a href="<? echo $servidor."/biblioteca.info/empleados_ez.php"; ?>"><? echo ('Empleados'); ?></a></li>
                      <li><a href="<? echo $servidor."/biblioteca.info/docentes.php"; ?>"><? echo ('Docentes'); ?></a></li>           
                  </ul>
	  			</li>
     		</ul>				
	  	</li>
        <li><a href="#"><span class="subheader"><? echo utf8_decode('Cali'); ?></span></a></li>
                <li><a href="#"><span class="subheader"><? echo utf8_decode('Bogota'); ?></span></a></li>
                        <li><a href="#"><span class="subheader"><? echo utf8_decode('Cartagena'); ?></span></a></li>
     	 </ul>
      </li>

	<li class="current-menu-item"></li>	
	<li><a href="#">Ayuda<span class="subheader">Manual del Sistema</span></a>
	<ul>								
	<li class="current-menu-item"><a href="#">Ver Ayuda</a></li>	
	<li><!-- ENDS MAIN -->	  </li>
	</ul>
	</li>
	</ul>
	  </div>
	</div>
	</body>
</html>