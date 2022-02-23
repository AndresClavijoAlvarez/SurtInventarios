<?php
error_reporting( E_ALL );
//ini_set( "display_errors", "1" );
include ('servidor.php');
session_start();
$id=$_SESSION["usuario_id"];

//echo "/".$id;
require("autentificator/aut_verifica.inc.php");
if(empty($_SESSION['usuario_id'])) {
    header("Location: ../../comun/mensajes/error_session.php");
    exit;
}
function Conectarse1()
{
 $db1 = "(DESCRIPTION = (ADDRESS_LIST = (ADDRESS = (PROTOCOL = TCP)
        (HOST = rac-scan.usbmed.edu.co)
        (PORT = 1521))) 
        (CONNECT_DATA = (SERVICE_NAME = SICPRO) ) )";

if (!($link1=Ocilogon("aca00","RPJ5ASICB",$db1)))
   {
      echo "Error conectando a la base de datos.";
      exit();
   }
    return $link1;
}
$link1=Conectarse1(); // variable de conexi?n
$fecha = date("d/m/Y"); 
//10/01/2014 ----- no puedo utilizar el año desde aca porque ese lo traigo de las fechas 
//$ano= date ('Y');


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">
    <head>
	<title>Gestión Desempeño</title>

	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	
		<!-- CSS -->
		<link rel="stylesheet" href="../../comun/css/style.css" type="text/css" media="screen" />
		<link rel="stylesheet" href="../../comun/css/social-icons.css" type="text/css" media="screen" />
		<!--[if IE 8]>
			<link rel="stylesheet" type="text/css" media="screen" href="css/ie8-hacks.css" />
		<![endif]-->
		<!-- ENDS CSS -->			
		<!-- GOOGLE FONTS 
		<link href='http://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css'>-->		
		<!-- JS -->
		
		<script type="text/javascript" src="../../comun/funciones/js/jquery-ui-1.8.13.custom.min.js"></script>
		<script type="text/javascript" src="../../comun/funciones/js/easing.js"></script>
		<script type="text/javascript" src="../../comun/funciones/js/jquery.scrollTo-1.4.2-min.js"></script>
		<script type="text/javascript" src="../../comun/funciones/js/jquery.cycle.all.js"></script>
		<script type="text/javascript" src="../../comun/funciones/js/custom.js"></script>
		
		<!-- Isotope -->
		<script src="../../comun/funciones/js/jquery.isotope.min.js"></script>
		
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
		<link rel="stylesheet" href="../../comun/css/nivo-slider.css" type="text/css" media="screen" />
		<script src="../../comun/funciones/js/nivo-slider/jquery.nivo.slider.js" type="text/javascript"></script>
		<!-- ENDS Nivo slider -->
		
		<!-- tabs -->
		<link rel="stylesheet" href="../../comun/css/tabs.css" type="text/css" media="screen" />
		<script type="text/javascript" src="../../comun/funciones/js/tabs.js"></script>
  		<!-- ENDS tabs -->
  		
  		<!-- prettyPhoto -->
		<script type="text/javascript" src="../../comun/funciones/js/prettyPhoto/js/jquery.prettyPhoto.js"></script>
		<link rel="stylesheet" href="../../comun/funciones/js/prettyPhoto/css/prettyPhoto.css" type="text/css" media="screen" />
		<!-- ENDS prettyPhoto -->
		
		<!-- superfish -->
		<link rel="stylesheet" media="screen" href="../../comun/css/superfish.css" /> 
		<link rel="stylesheet" media="screen" href="../../comun/css/superfish-left.css" /> 
		<script type="text/javascript" src="../../comun/funciones/js/superfish-1.4.8/js/hoverIntent.js"></script>
		<script type="text/javascript" src="../../comun/funciones/js/superfish-1.4.8/js/superfish.js"></script>
		<script type="text/javascript" src="../../comun/funciones/js/superfish-1.4.8/js/supersubs.js"></script>
		<!-- ENDS superfish -->
		
		<!-- poshytip -->
		<link rel="stylesheet" href="../../comun/funciones/js/poshytip-1.0/src/tip-twitter/tip-twitter.css" type="text/css" />
		<link rel="stylesheet" href="../../comun/funciones/js/poshytip-1.0/src/tip-yellowsimple/tip-yellowsimple.css" type="text/css" />
		<script type="text/javascript" src="../../comun/funciones/js/poshytip-1.0/src/jquery.poshytip.min.js"></script>
		<!-- ENDS poshytip -->
		
		<!-- Tweet -->
		<link rel="stylesheet" href="../../comun/css/jquery.tweet.css" media="all"  type="text/css"/> 
		<script src="../../comun/funciones/js/tweet/jquery.tweet.js" type="text/javascript"></script> 
		<!-- ENDS Tweet -->
		
		<!-- Fancybox -->
		<link rel="stylesheet" href="../../comun/funciones/js/jquery.fancybox-1.3.4/fancybox/jquery.fancybox-1.3.4.css" type="text/css" media="screen" />
		<script type="text/javascript" src="../../comun/funciones/js/jquery.fancybox-1.3.4/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
		<!-- ENDS Fancybox -->
		<script>
		//////////////////////////////////////modaly
		</script>
	<script type="text/javascript" language="JavaScript" src="../../comun/funciones/js/jquery.dataTables.js"></script> 
<style type="text/css" title="currentStyle"> 
			@import "../comun/funciones/css/demo_page.css";
			@import "../comun/funciones/css/demo_table.css";
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
					<div align="right"><img src="http://asis.usbmed.edu.co/comun/images/imagesCAZCHF5P1.png" width="164" height="75" />
					  <!-- Navigation -->
			  </div>
	<ul id="nav" class="sf-menu">
			<li class="current-menu-item"><a href="<? echo $servidor."/comun/aplicacion.php"; ?>">Inicio<span class="subheader">Bienvenido</span></a></li>
	  <li><a href="#">Gestión Desempeño<span class="subheader"><? echo utf8_decode('Revise sus Opciones'); ?></span></a>
		<ul>
		<? /////////////////////Menu para la administración///////////////////////////// 
		
		if ($id == '43902843' or $id == '43283945' or $id =='39443236' or $id =='39359461' or $id =='43045318' or $id =='98517866' ){
		
		?>
			<li><a href="#"><? echo ('Administración'); ?></a>
				<ul>					
					<li><a href="<? echo $servidor."/gestion/desempeno/habilitar_evaluacion_docente.php"; ?>"><? echo ('Habilitar evaluación docente'); ?></a></li>	
					<li><a href="<? echo $servidor."/gestion/desempeno/habilitar_evaluacion_administrativa.php"; ?>"><? echo ('Habilitar evaluación administrativa'); ?></a></li>	
					<li><a href="<? echo $servidor."/gestion/desempeno/configurar_evaluadores_docentes.php"; ?>"><? echo ('Configurar Docentes'); ?></a></li>					
<li><a href="<? echo $servidor."/gestion/desempeno/configurar_evaluadores_administrativos.php"; ?>"><? echo ('Configurar Administrativos'); ?></a></li>					

					<!--<li><a href="<? /*echo $servidor."/gestion/desempeno/cargue_evaluaciones.php"; ?>"><? echo ('Cargar Evaluaciones'); */?></a></li>	-->			
				</ul>
			</li>
			
		<? }
		
		/////////////////////Menu para la evaluación///////////////////////////// 
		?>
			<li><a href="#"><? echo ('Evaluar'); ?></a>
				<ul>	
					<li><a href="<? echo $servidor."/gestion/desempeno/administrativos.php"; ?>"><? echo ('Evaluar Administrativos'); ?></a></li>
					<li><a href="<? echo $servidor."/gestion/desempeno/docentes.php"; ?>"><? echo ('Evaluar Docentes'); ?></a></li>
					<li><a href="<? echo $servidor."/gestion/desempeno/docentes_catedra.php"; ?>"><? echo ('Pendientes Plan Mejora'); ?></a></li>
								
				</ul>
			</li>	
			
		<? /////////////////////Menú para las consultas///////////////////////////// 
		
			?> <li><a href="#"> <? echo ('Consultas'); ?></a>
			<ul>
			<? if ($id == '43902843' or $id == '43283945' or $id =='39443236' or $id =='39359461' or $id =='43045318' or $id ='98517866'){ ?>
					
					<!--<li><li><a href="<?/* echo $servidor."/gestion/desempeno/informe_configurados.php"; ?>"><?/* echo ('Consultar Configurados'); */?></a></li>-->
					<li><a href="<? echo $servidor."/gestion/desempeno/informe_evaluados.php"; ?>"><? echo ('Consultar Evaluados'); ?></a></li>					
					<li><a href="<? echo $servidor."/gestion/desempeno/informe_competencias.php"; ?>"><? echo ('Resultados Competencias'); ?></a></li>
					<li><a href="<? echo $servidor."/gestion/desempeno/informe_indicadores.php"; ?>"><? echo ('Resultados Indicadores'); ?></a></li>
					<li><a href="<? echo $servidor."/gestion/desempeno/plan_mejora_docentes_catedra.php"; ?>"><? echo ('Pendientes Plan Mejora'); ?></a></li>
					<li><a href="<? echo $servidor."/gestion/desempeno/informe_plan_mejora_completo.php"; ?>"><? echo ('Resultados Plan de Mejora'); ?></a></li>
					<li><a href="<? echo $servidor."/gestion/desempeno/informe_descripcion_plan_mejora.php"; ?>"><? echo ('Informe descripción plan mejora'); ?></a></li>
					<li><a href="<? echo $servidor."/gestion/desempeno/informes_todas_evaluaciones.php"; ?>"><? echo ('Informes evaluaciones'); ?></a></li>
					<li><a href="<? echo $servidor."/gestion/desempeno/mis_evaluaciones.php"; ?>"><? echo ('Mis Evaluaciones'); ?></a></li>

					
			<? }else{ ?>
				<li><a href="<? echo $servidor."/gestion/desempeno/evaluaciones_anteriores.php"; ?>"><? echo ('Evaluaciones Realizadas'); ?></a></li>
				<li><a href="<? echo $servidor."/gestion/desempeno/mis_evaluaciones.php"; ?>"><? echo ('Mis Evaluaciones'); ?></a></li>
			
			<? } ?>
		
				</ul>
				</li>
				
			</ul>
		</li>
		

	<li class="current-menu-item"><a href="http://asis.usbmed.edu.co/comun/gestion_info/cambio_clave.php?cod=<? echo $_SESSION['usuario_id'];?>">Cambio Clave<span class="subheader"><? echo utf8_decode('Cambie la Clave PeriÃ³dicamente'); ?></span></a></li>	
	
		<li><a href="">Ayuda<span class="subheader">Manual del Sistema</span>
		
	<ul>								
	<li class="current-menu-item"><a href="<? echo $servidor."/gestion/manual/manual.php"; ?>">Ver Ayuda</a></li>	
	</ul>
	</li>	
	<li class="current-menu-item"><a href="<? echo $servidor."/comun/autentificator/aut_logout.php"; 
	
	OCIFreeStatement($con2);
//Cerrar_Conexion($link1);
/* LA CONEXION NO SE PEUDE CERRAR DESDE ACA POR QUE SI ESTA CERRADA EN EL MENU NO VA A MOSTRAR NADA. JHOAN POSADA 18/11/2013*/
	?>">Salir<span class="subheader">Finalizar Session</span></a>	</li>
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