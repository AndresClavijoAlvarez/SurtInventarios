<?php
//error_reporting( E_ALL );
//ini_set( "display_errors", "1" );
include ('servidor.php');
session_start();
$id=$_SESSION["usuario_id"];

require("autentificator/aut_verifica.inc.php");
if(empty($_SESSION['usuario_id'])) {
    header("Location: ../../comun/mensajes/error_session.php");
    exit;
}
function Conectarse1()
{
 $db1 = "(DESCRIPTION = (ADDRESS_LIST = (ADDRESS = (PROTOCOL = TCP)
        (HOST = 172.16.1.15)
        (PORT = 1521))) 
        (CONNECT_DATA = (SERVICE_NAME = PRUEBAS) ) )";

if (!($link1=Ocilogon("aca00","akad2001",$db1)))
   {
      echo "Error conectando a la base de datos pruebas.";
      exit();
   }
    return $link1;
}
$link1=Conectarse1(); // variable de conexi?n
$fecha = date("d/m/Y"); 
//$ano= date ('Y');


?>
<!DOCTYPE html>
<html lang="es">
    <head>

	<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
	
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
		<script type="text/javascript" src="../../comun/funciones/js/jquery-1.5.1.min.js"></script>
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
					<div align="right"><img src="http://asis.usbmed.edu.co/comun/images/imagesCAZCHF5P1.png" width="164" height="75" />
					  <!-- Navigation -->
			  </div>
	<ul id="nav" class="sf-menu">
			<li class="current-menu-item"><a href="<? echo $servidor."/comun/aplicacion.php"; ?>">Inicio<span class="subheader">Bienvenido</span></a></li>
	  <li><a href="#">Centro de Idiomas<span class="subheader"><? echo utf8_decode('Revise sus Opciones'); ?></span></a>
<ul>
<? if ($_SESSION['usuario'] =='ADMINISTRADOR'){?>	
<li><a href="#"> <? echo ('Administración'); ?></a>

<? /////////////////////// Abre menu de notas////////////////?>    
<ul>
<li><a href="#"> <? echo ('Cursos'); ?></a>
 <ul>
        <li><a href="<? echo $servidor."/idiomas/main/programacion.php"; ?>"><? echo ('Programación'); ?></a></li>
        <li><a href="<? echo $servidor."/idiomas/main/ingreso_notas_administrador.php";?>"><? echo('Corrección Notas');?></a></li></a>
	</li>
</ul>
</li>
<? /////////////////////// Cierra menu de notas////////////////?>
                    
<li><a href="#"> <? echo ('Pruebas'); ?></a>
<ul>
    <li><a href="<? echo $servidor."/idiomas/main/programacion_pruebas.php"; ?>"><? echo ('Programación'); ?></a></li>
    <li><a href="<? echo $servidor."/idiomas/main/ingreso_resultados.php"; ?>"><? echo ('Ingreso Resultados'); ?></a></li>
    <li><a href="<? echo $servidor."/idiomas/main/correccion_resultados.php"; ?>"><? echo ('Corrección Resultados'); ?></a></li>
    
    </a></li>
</ul>
</li>

<? /////////////////////// Cierra menu de pruebas////////////////?>               
                 	
<li><a href="#"> <? echo ('Pruebas Internacionales'); ?></a>
    <ul>
    <li><a href="<? echo $servidor."/idiomas/main/pruebas_internacionales.php"; ?>"><? echo ('Configurar'); ?></a></li>	
    <li><a href="<? echo $servidor."/idiomas/main/resultados_pruebas_internacionales.php"; ?>"><? echo ('Ingresar Resultados'); ?></a></li>
    
    </ul>
</li>

<? /////////////////////// Cierra menu de pruebas internacionalesa////////////////?>               
                 	
<li><a href="#"> <? echo ('Configurar'); ?></a>
    <ul>
    <li><a href="<? echo $servidor."/idiomas/main/formas_evaluar.php"; ?>"><? echo ('Formas de Evaluar'); ?></a></li>	
    <li><a href="<? echo $servidor."/idiomas/main/configuracion_certificado.php"; ?>"><? echo ('Certificados'); ?></a></li>
    <li><a href="<? echo $servidor."/idiomas/main/configuracion_constancias.php"; ?>"><? echo ('Constancias'); ?></a></li>        
    </ul>
</li>

                     <? ////////////////consultas///////////////// ?>
           </ul>
			</li>
            <? } ?>
            <? if ($_SESSION['usuario'] =='ADMINISTRADOR' OR $_SESSION['usuario'] =='DOCENTE'){?>	
            <li><a href="#"> <? echo ('Docente'); ?></a>
			<ul>
               <li><a href="<? echo $servidor."/idiomas/main/ingreso_notas.php"; ?>"><? echo ('Ingreso de Notas'); ?></a></li>	
               <li><a href="<? echo $servidor."/idiomas/main/cursos_dictados.php"; ?>"><? echo ('Notas Cursos Dictados'); ?></a></li>	
                 
			</ul>
			</li>
            <? } ?>
            <li><a href="#"> <? echo ('Estudiante'); ?></a>
			<ul>
                 <li><a href="<? echo $servidor."/idiomas/main/consultar_notas.php"; ?>"><? echo ('Consultar Notas'); ?></a></li>	
			</ul>
			</li>
            <? if ($_SESSION['usuario'] =='ADMINISTRADOR' OR $_SESSION['usuario'] =='CONSULTA'){?>	
             <li><a href="#"> <? echo ('Consultas'); ?></a>
			<ul>
                 <? if ($_SESSION['usuario'] =='CONSULTA'){?>
                 <li><a href="<? echo $servidor."/idiomas/main/certificados.php"; ?>"><? echo ('Certificados'); ?></a></li>	
                  <? } ?>
                  <? if ($_SESSION['usuario'] =='ADMINISTRADOR'){?>
                  
 <? /////////////////////// Abre menu de consulta certificados////////////////?>    

<li><a href="#"> <? echo ('Certificados'); ?></a>
 <ul>
        <li><a href="<? echo $servidor."/idiomas/main/certificados.php"; ?>"><? echo ('Niveles y Competencias'); ?></a></li>
        <li><a href="<? echo $servidor."/idiomas/main/certificados_comprension_lectora.php"; ?>"><? echo ('Comprension Lectora'); ?></a></li>	
	</li>
</ul>
</li>
<? /////////////////////// Cierra de consulta certificados////////////////?>                 
 <? /////////////////////// Abre menu de consulta constancias////////////////?>    

<li><a href="#"> <? echo ('Constancias'); ?></a>
 <ul>
        <li><a href="<? echo $servidor."/idiomas/main/constancias_matricula.php"; ?>"><? echo ('Matriculas'); ?></a></li> 
        <li><a href="<? echo $servidor."/idiomas/main/niveles_aprobados.php"; ?>"><? echo ('Niveles Aprobados'); ?></a></li>	
	</li>
</ul>
</li>
<? /////////////////////// Cierra de consulta constancias////////////////?>                     
 <? /////////////////////// Abre menu de consulta listados////////////////?>    

<li><a href="#"> <? echo ('Listados'); ?></a>
 <ul>
        <li><a href="<? echo $servidor."/idiomas/main/consulta_notas_administrador.php"; ?>"><? echo ('Notas'); ?></a></li>	
        <li><a href="<? echo $servidor."/idiomas/main/consultar_listado_estudiantes.php"; ?>"><? echo ('Estudiantes por Consecutivo'); ?></a></li>
	</li>
    <? if($id==43902843) {?>
        
        <li><a href="<? echo $servidor."/idiomas/main/historico.php"; ?>"><? echo ('Hsitorico'); ?></a></li>
        <? } ?>
</ul>
</li>
<? /////////////////////// Cierra de consulta listados////////////////?>                  
<? } ?>
</ul>
</li>
<? }?>	
</ul>
</li>
        
        
		

	<li class="current-menu-item"><a href="http://web.usbmed.edu.co/Notas/cambio_clave.php?cod=<? echo $_SESSION['usuario_id'];?>">Cambio Clave<span class="subheader"><? echo utf8_decode('Cambie la Clave PeriÃ³dicamente'); ?></span></a></li>	
	
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