
<?
//  Autentificator
//  Gestión de Usuarios PHP+Mysql+sesiones
//  by Pedro Noves V. (Cluster)
//  clus@hotpop.com
// ------------------------------------------
require("aut_verifica.inc.php");
$nivel_acceso=1; // Nivel de acceso para esta página.
// se chequea si el usuario tiene un nivel inferior
// al del nivel de acceso definido para esta página.
// Si no es correcto, se mada a la página que lo llamo con
// la variable de $error_login definida con el nº de error segun el array de
// aut_mensaje_error.inc.php
if ($nivel_acceso > $_SESSION['usuario_nivel']){
header ("Location: error_de_ingreso.php");
exit;
}
?>
<!DOCTYPE html>
<html lang="es">
    <head>

	<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
	
		<!-- CSS -->
		<link rel="stylesheet" href="../c_comp/css/style.css" type="text/css" media="screen" />
		<link rel="stylesheet" href="../tempo/css/styled-elements.css" type="text/css" media="screen" />
		
		
		<!--[if IE 8]>
			<link rel="stylesheet" type="text/css" media="screen" href="css/ie8-hacks.css" />
		<![endif]-->
		<!-- ENDS CSS -->			
		<!-- GOOGLE FONTS 
		<link href='http://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css'>-->		
		<!-- JS -->
		<script type="text/javascript" src="../tempo/funciones/js/jquery-1.5.1.min.js"></script>
		<script type="text/javascript" src="../tempo/funciones/js/jquery-ui-1.8.13.custom.min.js"></script>
		<script type="text/javascript" src="../tempo/funciones/js/easing.js"></script>
		<script type="text/javascript" src="../tempo/funciones/js/jquery.scrollTo-1.4.2-min.js"></script>
		<script type="text/javascript" src="../tempo/funciones/js/jquery.cycle.all.js"></script>
		<script type="text/javascript" src="../tempo/funciones/js/custom.js"></script>
		
		<!-- Isotope -->
		<script src="../tempo/funciones/js/jquery.isotope.min.js"></script>
		
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
		<link rel="stylesheet" href="../tempo/css/nivo-slider.css" type="text/css" media="screen" />
		<script src="../tempo/funciones/js/nivo-slider/jquery.nivo.slider.js" type="text/javascript"></script>
		<!-- ENDS Nivo slider -->
		
		<!-- tabs -->
		<link rel="stylesheet" href="../tempo/css/tabs.css" type="text/css" media="screen" />
		<script type="text/javascript" src="../tempo/funciones/js/tabs.js"></script>
  		<!-- ENDS tabs -->
  		
  		<!-- prettyPhoto -->
		<script type="text/javascript" src="../tempo/funciones/js/prettyPhoto/js/jquery.prettyPhoto.js"></script>
		<link rel="stylesheet" href="../tempo/funciones/js/prettyPhoto/css/prettyPhoto.css" type="text/css" media="screen" />
		<!-- ENDS prettyPhoto -->
		
		<!-- superfish -->
		<link rel="stylesheet" media="screen" href="../tempo/css/superfish.css" /> 
		<link rel="stylesheet" media="screen" href="../tempo/css/superfish-left.css" /> 
		<script type="text/javascript" src="../tempo/funciones/js/superfish-1.4.8/js/hoverIntent.js"></script>
		<script type="text/javascript" src="../tempo/funciones/js/superfish-1.4.8/js/superfish.js"></script>
		<script type="text/javascript" src="../tempo/funciones/js/superfish-1.4.8/js/supersubs.js"></script>
		<!-- ENDS superfish -->
		
		<!-- poshytip -->
		<link rel="stylesheet" href="../tempo/funciones/js/poshytip-1.0/src/tip-twitter/tip-twitter.css" type="text/css" />
		<link rel="stylesheet" href="../tempo/funciones/js/poshytip-1.0/src/tip-yellowsimple/tip-yellowsimple.css" type="text/css" />
		<script type="text/javascript" src="../tempo/funciones/js/poshytip-1.0/src/jquery.poshytip.min.js"></script>
		<!-- ENDS poshytip -->
		
		<!-- Tweet -->
		<link rel="stylesheet" href="../tempo/css/jquery.tweet.css" media="all"  type="text/css"/> 
		<script src="../tempo/funciones/js/tweet/jquery.tweet.js" type="text/javascript"></script> 
		<!-- ENDS Tweet -->
		
		<!-- Fancybox -->
		<link rel="stylesheet" href="../tempo/funciones/js/jquery.fancybox-1.3.4/fancybox/jquery.fancybox-1.3.4.css" type="text/css" media="screen" />
		<script type="text/javascript" src="../tempo/funciones/js/jquery.fancybox-1.3.4/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
		<!-- ENDS Fancybox -->
		<script>
		//////////////////////////////////////modal
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
					<div align="right"><img src="../tempo/images/udea_logo_w.png" alt="" width="80" height="80"	/>
			  </div>
	<ul id="nav" class="sf-menu">
			<li class="current-menu-item"><a href="http://www.udea.edu.co/wps/portal/udea/web/inicio">UDEA<span class="subheader">Bienvenido</span></a></li>
	  <li><a href="#">Aplicaciones Web<span class="subheader"><? echo utf8_decode('Mis Aplicaciones'); ?></span></a>
				<ul>
			<li><a href="http://udearrobasuena.udea.edu.co/"><? echo utf8_decode('Ude@Suena'); ?></a>
			<li><a href="http://www2.udearroba.co/"><? echo utf8_decode('Ude@'); ?></a>
			<ul>
	
				</ul>
				</li>									
				</ul>
	  </li>

	<li class="current-menu-item"><a href="#">Cambio Clave<span class="subheader"><? echo utf8_decode('Cambie la Clave PeriÃ³dicamente'); ?></span></a></li>	
	
	<ul>								
	<li class="current-menu-item"><a href="#">Ver Ayuda</a></li>	
	
	</ul>
	</li>	
	<li class="current-menu-item"><a href="aut_logout.php">Salir<span class="subheader">Finalizar Session</span></a>
	
	</li>
							
</ul>
						<!-- Navigation -->
	  </div>
					<!-- wrapper-menu -->
				</div>
				<!-- ENDS menu-holder -->
	</div>
			<!-- ENDS Menu -->
			
							
			<!-- MAIN -->
			<div id="main">
				<!-- wrapper-main -->
				<div class="wrapper">
					
					<!-- headline -->
					<div class="clear"></div>
					
					<!-- ENDS headline -->
					
					<!-- content -->
									
								
								
							</div>
							<!-- ENDS TABS -->
		
		
		
					</div>
					<!-- ENDS content -->
				</div>
				<!-- ENDS wrapper-main -->
			</div>
			<!-- ENDS MAIN -->	
					
		</body>
</html>

<? 
//Cerrar_Conexion($link1);	
?>