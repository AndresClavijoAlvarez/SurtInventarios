<?php
error_reporting( E_ALL );
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
		(PORT = 1521)) ) 
		(CONNECT_DATA = (SERVICE_NAME = pruebas) ) )";

if (!($link1=Ocilogon("aca00","akad2001",$db1)))
   {
      echo "Error conectando a bd pruebas.";
      exit();
   }
    return $link1;
}
$link1=Conectarse1(); // variable de conexi?n
$fecha = date("d/m/Y"); 
$ano= date ('Y');

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">
    <head>
	<title>Documento Sin t&iacute;tulo</title>

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
	  <li><a href="#">Representante<span class="subheader"><? echo utf8_decode('Revise sus Opciones'); ?></span></a>
				<ul>
				<? 
				$aux='i';
				$aux1='i';
				$ee="SELECT DISTINCT
					to_char(Z.FECHA_INICIAL,'dd/mm/yyyy'),
					to_char(Z.FECHA_FINAL,'dd/mm/yyyy')
					FROM
					ACA00.REP_PROGRAMACION Z
					WHERE 
					Z.TIPO_PROGRAMACION	= 2	
				";
				$con_estY=OCIParse($link1,$ee);
				OCIExecute($con_estY);
				while(OCIFetch($con_estY)) {	
				$FECHA_INICIAL = OCIResult($con_estY,1);
				$FECHA_FINAL = OCIResult($con_estY,2);
				}
					$ee2="SELECT
							A.ID_RESULTADO
							FROM
							ACA00.REM_RESULTADOS A
							WHERE
							A.IDENT_VOTANTE = $id
							and to_char(A.FECHA_VOTACION,'yyyy') = $ano
				";
				$con_estY2=OCIParse($link1,$ee2);
				OCIExecute($con_estY2);
				while(OCIFetch($con_estY2)) {	
				$F_AUX = OCIResult($con_estY2,1);				
				}
				$ee5="SELECT
							A.ID_PLANCHA,
							A.IDENT_TITULAR,
							A.IDENT_SUPLENTE,
							A.CODIGO_FACULTAD,
							A.ESTAMENTO,
							A.ESTADO,
							A.OBSERVACIONES,
							A.PROPUESTA
							FROM
							ACA00.REP_PLANCHA A
							WHERE
							A.ESTADO = 'A'
							AND (A.IDENT_SUPLENTE = '$id' OR A.IDENT_TITULAR = '$id')
				";
				$con_estY5=OCIParse($link1,$ee5);
				OCIExecute($con_estY5);
				while(OCIFetch($con_estY5)) {	
				$F_AUX2 = OCIResult($con_estY5,1);				
				}
				$ee="SELECT DISTINCT
					to_char(Z.FECHA_INICIAL,'dd/mm/yyyy'),
					to_char(Z.FECHA_FINAL,'dd/mm/yyyy')
					FROM
					ACA00.REP_PROGRAMACION Z
					WHERE 
					Z.TIPO_PROGRAMACION	= 1	
				";
				$con_estY=OCIParse($link1,$ee);
				OCIExecute($con_estY);
				while(OCIFetch($con_estY)) {	
				$FECHA_INICIAL1 = OCIResult($con_estY,1);
				$FECHA_FINAL1 = OCIResult($con_estY,2);
				}
		//////////////////////////////////////////////////////////
			function compara_fechas($fecha1,$fecha2)
          {
			if (preg_match("/[0-9]{1,2}\/[0-9]{1,2}\/([0-9][0-9]){1,2}/",$fecha1))
			list($dia1,$mes1,$año1)=split("/",$fecha1);
			if (preg_match("/[0-9]{1,2}-[0-9]{1,2}-([0-9][0-9]){1,2}/",$fecha1))
			list($dia1,$mes1,$año1)=split("-",$fecha1);
			if (preg_match("/[0-9]{1,2}\/[0-9]{1,2}\/([0-9][0-9]){1,2}/",$fecha2))
			list($dia2,$mes2,$año2)=split("/",$fecha2);
			if (preg_match("/[0-9]{1,2}-[0-9]{1,2}-([0-9][0-9]){1,2}/",$fecha2))
			list($dia2,$mes2,$año2)=split("-",$fecha2);
			$dif = mktime(0,0,0,$mes1,$dia1,$año1) - mktime(0,0,0,$mes2,$dia2,$año2);
			return ($dif);                                
			}
         
$f2=$FECHA_INICIAL;

if (compara_fechas($fecha,$f2) >0) 
	{
	//echo "OOOOOOOOOOOOOOOOOOOOOOF1MAYORF2"."<br>";
	$f2=$FECHA_FINAL;
	if (compara_fechas($fecha,$f2) <0) 
		{			
		//echo "IIIIIIIIIIIIIIIIIIIIIIIIF1MenorF2";
		$aux='s';
		}
	}
	
$f2=$FECHA_INICIAL1;
if (compara_fechas($fecha,$f2) >0) 
	{
	//echo "OOOOOOOOOOOOOOOOOOOOOOF1MAYORF2"."<br>";
	$f2=$FECHA_FINAL1;
	if (compara_fechas($fecha,$f2) <0) 
		{			
		//echo "IIIIIIIIIIIIIIIIIIIIIIIIF1MenorF2";
		$aux1='s';
		}
	}
								
							
				?>
				<? if ($aux == 's') {	
				if (empty($F_AUX2)) 
						{						
						?>
				<li><a href="<? echo $servidor."/representante_estudiantil/registro/registro_candidato.php"; ?>"><? echo ('Registro de Candidatos'); ?></a>
				<? } 
				
				}?>
				<? if ($aux1 == 's') 
					{	
					if (empty($F_AUX)) 
						{			
						?>
				<li><a href="<? echo $servidor."/representante_estudiantil/registro/votaciones.php"; ?>"><? echo ('Votación'); ?></a>
				<? } } ?>				
			<? 
				if ($id == 39443236 or $id == 8128888 or $id == 43500003 or $id == 70162958) {				
				?>
				</li>
				<li><a href="#"><? echo ('Administración'); ?></a>
				<ul>	
						<li><a href="<? echo $servidor."/representante_estudiantil/admon/admon_fechas_registro.php"; ?>"><? echo ('Administración Fechas Inscripciones'); ?></a></li>						
						<? if ($aux != 'S') {				
						?>
						<li><a href="<? echo $servidor."/representante_estudiantil/admon/admon_fechas_votaciones.php"; ?>"><? echo ('Administración Fechas Votaciones'); ?></a></li>
						<? } ?>
						<li><a href="<? echo $servidor."/representante_estudiantil/admon/listado.php"; ?>"><? echo ('Consultas por Planchas Habilitadas'); ?></a></li>
						<li><a href="<? echo $servidor."/representante_estudiantil/admon/datos.php"; ?>"><? echo ('Informe Detallado Planchas Habilitadas'); ?></a></li>
						<li><a href="<? echo $servidor."/representante_estudiantil/admon/listado_in.php"; ?>"><? echo ('Consulta Inhabilitados'); ?></a></li>
						<li><a href="<? echo $servidor."/representante_estudiantil/admon/listado_incompletas.php"; ?>"><? echo ('Consulta Planchas Incompletas'); ?></a></li>			
						<li><a href="<? echo $servidor."/representante_estudiantil/admon/listado_general.php"; ?>"><? echo ('Listado General Planchas Habilitadas'); ?></a></li>			
						<li><a href="<? echo $servidor."/representante_estudiantil/admon/listado_resultados_finales.php"; ?>"><? echo ('Resultado Votaciones'); ?></a></li>			
								</ul>
				</li>
								<?
								}							
				/*
				
				<li><a href="http://web.usbmed.edu.co/colillas/iniciarcol.php"><? echo utf8_decode('Consulta Retenciones'); ?></a></li>
				*/?>
				</ul>
				</li>

	<li class="current-menu-item"><a href="http://asis.usbmed.edu.co/comun/gestion_info/cambio_clave.php?cod=<? echo $_SESSION['usuario_id'];?>">Cambio Clave<span class="subheader"><? echo utf8_decode('Cambie la Clave PeriÃ³dicamente'); ?></span></a></li>	
	
		<li><a href="<? echo $servidor."/representante_estudiantil/datos_ayuda.php"; ?>">Ayuda<span class="subheader">Manual del Sistema</span></a>
		
	<ul>								
	<li class="current-menu-item"><a href="<? echo $servidor."/representante_estudiantil/registro/datos_ayuda.php"; ?>">Ver Ayuda</a></li>	
	</ul>
	</li>	
	<li class="current-menu-item"><a href="<? echo $servidor."/comun/autentificator/aut_logout.php"; ?>">Salir<span class="subheader">Finalizar Session</span></a>	</li>
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

OCIFreeStatement($con_estY);
OCIFreeStatement($con_estY2);
OCIFreeStatement($con_estY5);
//Cerrar_Conexion($link1);
?>