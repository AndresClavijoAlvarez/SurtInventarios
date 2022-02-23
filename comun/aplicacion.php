<?php
session_start();
//
?>

<!DOCTYPE  html>
<html>
	<head>
	

	<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
		<title>USB</title>
		
<? 

include ('menu_inf.php');


//echo $_SESSION['usuario_id'];
?>
			

			<!-- Slider -->
			<div id="slider-block">
				<div id="slider-holder">
					<div id="slider">
						
						<img src="images/img_slider/fondousbarriba.jpg" title="" alt="" />
						<img src="images/img_slider/_MG_4863_JPG.jpg" title="" alt="" />
						<img src="images/img_slider/_MG_4894_JPG.jpg" title="" alt="" />
						<img src="images/img_slider/_MG_4912_JPG.jpg" title="" alt="" />
						<img src="images/img_slider/_MG_4928_JPG.jpg" title="" alt="" />
						<img src="images/img_slider/_MG_4930_JPG.jpg" title="" alt="" />
						
						<img src="images/img_slider/_MG_4940_JPG.jpg" title="" alt="" />
						<img src="images/img_slider/_MG_4946_JPG.jpg" title="" alt="" />
						<img src="images/img_slider/_MG_7659_JPG.jpg" title="" alt="" />
						<img src="images/img_slider/_MG_7844_JPG.jpg" title="" alt="" />
						
						<img src="images/img_slider/_MG_9777_JPG.jpg" title="" alt="" />
						<img src="images/img_slider/580176_403191429796380_1280411802_n.jpg" title="" alt="" />
						<img src="images/img_slider/fondousbarriba.jpg" title="" alt="" />
						
						
					</div>
				</div>
			</div>
			<!-- ENDS Slider -->
			
			<!-- MAIN -->
			<div id="main">
				<!-- wrapper-main -->
				<div class="wrapper">
					
					<!-- headline -->
					<div class="clear"></div>
					
					<p>&nbsp;</p>
					<p>&nbsp;</p>
					<p><span class="sub"><img src="img/knobs-icons/L_eval.png" alt="f" width="40" height="43"></span></p>
					<div id="headline">
						<span class="main">! Bienvenido &iexcl; </span>
						<span class="sub">Intranet Universidad San Buenaventura, si desea ir a la pagina oficial </span>
					<a href="http://www.usbmed.edu.co/default.aspx" id="link" class="link-button-big"><span>Universidad San Buenaventura</span></a></div>
					<!-- ENDS headline -->
					
					<!-- content -->
					<div id="content">
						
							<!-- TABS -->
							<!-- the tabs -->
							<ul class="tabs">
								<li><a href="#"><span>Como cambiar su clave</span></a></li>
								<li><a href="#"><span>Proximamente</span></a></li>
								<li><a href="#"><span>Informacion General</span></a></li>
							</ul>
							
							<!-- tab "panes" -->
							<div class="panes">
							
								<!-- Posts -->
								<div>
									<div class="plain-text">
										<h6>Peque&ntilde;o tutorial de como cambiar su clave.</h6> 
										<p>Para cambiar su clave solo es necesario dirigirse al menu y dar click en la opcion cambio clave, recuerde que su clave debe ser minimo de 8 digitos. </p>
										<p>Recuerde que es muy importante cambiar su clave periodicamente y no prestar esta para ningun tipo de proceso, si desea cambiar la clave en este momento lo puede hacer desde aca <a href="http://web.usbmed.edu.co/Notas/cambio_clave.php?cod=<? echo $_SESSION['usuario_id'];?>">Cambio Clave</a>.  </p>
										
									</div>
								</div>
								<!-- ENDS posts -->
								
								<!-- Information  -->
								<div>
									<div class="plain-text">
										<h6>Avances, Noticias e informacion importante</h6> 
										<p>proximos desarrollos, mejoras e informacion importante que se considere que el usuario debe conocer. </p>
										<p>Toda la informaicon generada aca podr&aacute; ser vista por las personas que accedan a la intranet. </p>
										
									</div>
								</div>
								<!-- ENDS Information -->

								<!-- Posts -->
								<div>
									<div class="plain-text">
										<h6>Avances, Noticias e informacion importante</h6> 
										<p>proximos desarrollos, mejoras e informacion importante que se considere que el usuario debe conocer. </p>
										<p>Toda la informaicon generada aca podr&aacute; ser vista por las personas que accedan a la intranet. </p>
										</div>
								</div>
								<!-- ENDS posts -->
								
								
							</div>
							<!-- ENDS TABS -->
		
		
		
					</div>
					<!-- ENDS content -->
				</div>
				<!-- ENDS wrapper-main -->
			</div>
			<!-- ENDS MAIN -->	
					
	<?
	include('footer.php');
	//Cerrar_Conexion($link);	
	?>
	</body>
</html>