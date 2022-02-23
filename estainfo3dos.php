<?php  
error_reporting( E_ALL );
ini_set( "display_errors", "1" );
require ("aut_verifica.inc.php"); 
$nombre=$_SESSION['nombre_pv'];
$usuario_nivel=$_SESSION['usuario_nivel'];
$num_tienda=$_SESSION['num_tienda'];
 $connect = mysqli_connect("localhost", "root", "", "inv");  
 
$servidor='http://surtitodo.com.co:8081/surtinet_v2/';
 $aux_id_get1="x3245*ad98/725.840216";
$pifi= $_POST["pifi"];
$zonas= $_POST["zonas"];


$query ="SELECT
fi_conteos.Planilla,
fi_conteos.Barra,
fi_conteos.Fecha,
fi_conteos.Estado,
fi_conteos.Conteo,
zonas.zona,
cat_productos.descripcion
FROM
fi_conteos ,
zonas ,
cat_productos
WHERE
zonas.id_zona = fi_conteos.Zona AND
fi_conteos.Barra = cat_productos.barras and
fi_conteos.Planilla = $pifi and 
fi_conteos.Conteo = 3 and 
zonas.zona = $zonas and Bodega = $num_tienda
order by 1";  
 $result = mysqli_query($connect, $query);  

$mysqli = new mysqli('localhost', 'root', '', 'inv');
$mysqli->set_charset("utf8");
$connect = mysqli_connect("localhost", "root", "", "inv");  
$sw_error=0;


?> 
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>SISUR Zonas</title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
         <script src="js/jquery.dataTables.js"></script>  
           <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>            
           <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
		 
		  <script>
	function alerta(){
		

    var opcion = confirm("La zona solo se podrá borrar cuando las planillas contenidas no tengan ninguna lectura, debe tener la clave de borrado para realizar la operación.... ¿Desea Continuar?");
    if (opcion == true) {
  var formulario = document.getElementById("cierre");
		formulario.submit();
		return true;
	} else {
return false;
	}
		
	}
		
	</script>
		  
		  <script>
		function val_jp( formulario )
{
	
		if (document.ingreso.tipo_doc.selectedIndex == "4"){
			
			document.ingreso.numerofac.value = 1;		
	}else 
		document.ingreso.numerofac.value = '';		
}
	function validaFecha( formulario )
{
if(ingreso.fecha.value == '')
	{
	alert('Debe Seleccionar una fecha')
	ingreso.fecha.focus()
	return false
	}
	if (document.ingreso.tipo_doc.selectedIndex == "0"){alert('Debe Seleccionar el tipo de Documento');return(false)}
	if (document.ingreso.tiendas.selectedIndex == "0"){alert('Debe Seleccionar la Tienda');return(false)}
	if (document.ingreso.proveedor.selectedIndex == "0"){alert('Debe Seleccionar Proveedor');return(false)}
	ingreso.submit()
}

</script>
<style>
	.refresh-box{
	color: #4F8A10;
	background-color: #DFF2BF;
	background-image: url('../img/knobs-icons/Knob Refresh.png');
}
.warning-box2{
	color:#000000;
	background-color:#FFDCB9;
	background-image: url(../img/knobs-icons/L_eval.png);
	font-weight: bold;
}
.error-box2
{
	border: 1px solid;
	margin: 5px 0px;
	padding:8px 5px 8px 20px;
	background-repeat: no-repeat;
	background-position: 2px center;
	border-radius: 3px;
	-moz-border-radius: 3px;
	-webkit-border-radius: 3px;
}
.warning-box{
	color: #9F6000;
	background-color: #FEEFB3;
	color: #D8000C;
	background-color: #FFBABA;
}
.warning-box2{
	color: #000000;
	background-color: #CCCCCC;
	color: #D8000C;
	background-color: #FFBABA;

}


.navbar {
	font-family: 'Dosis', sans-serif;
	position:relative;
	display:table;
	float:none;
	list-style-type:none;
	padding:0;
	margin:20px auto 30px auto;
}
.navbar:before {
	position:absolute;
	display:block;
	content: "";
	z-index:-1;
	width:100%;
	height:18px;
	bottom:-9px;
	left:2px;
	background: -moz-radial-gradient(center, ellipse cover,  rgba(0,0,0,0.7) 0%, rgba(0,0,0,0) 75%);
	background: -webkit-gradient(radial, center center, 0px, center center, 100%, color-stop(0%,rgba(0,0,0,0.7)), color-stop(75%,rgba(0,0,0,0)));
	background: -webkit-radial-gradient(center, ellipse cover,  rgba(0,0,0,0.7) 0%,rgba(0,0,0,0) 75%); 
	background: -o-radial-gradient(center, ellipse cover,  rgba(0,0,0,0.7) 0%,rgba(0,0,0,0) 75%);
	background: -ms-radial-gradient(center, ellipse cover,  rgba(0,0,0,0.7) 0%,rgba(0,0,0,0) 75%);
	background: radial-gradient(center, ellipse cover,  rgba(0,0,0,0.7) 0%,rgba(0,0,0,0) 75%);
	filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#b3000000', endColorstr='#00000000',GradientType=1 );
	opacity:.4;
}
.navbar:after {
	position:absolute;
	display:block;
	content: "";
	z-index:-1;
	width:100%;
	height:100%;
	top:0;
	left:0;
	-webkit-box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.25);
	box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.25);
}
.navbar > li {
	position:relative;
	float:left;
	display:inline-block;
	list-style-type:none;
	text-align:center;
	margin:0;
	border-left:0;
	border:1px solid rgba(0,0,0,0.5);
	line-height:35px;
	-webkit-box-shadow: inset 1px 1px 0px 0px rgba(255, 255, 255, 0.25);
    box-shadow: inset 1px 1px 0px 0px rgba(255, 255, 255, 0.25);
	-webkit-transition: all 300ms ease-in-out;
	-moz-transition: all 300ms ease-in-out;
	-ms-transition: all 300ms ease-in-out;
	-o-transition: all 300ms ease-in-out;
	transition: all 300ms ease-in-out;
}
.navbar.color1 > li {
	background:#F40105;
}
.navbar.color2 > li {
	background:#F40105;
}
.navbar.color3 > li {
	background:#F40105;
}
.navbar.color4 > li {
	background:#F40105;
}
.navbar.color5 > li {
	background:#F40105;
}
.navbar > li:before {
	position:absolute;
	display:block;
	content: "";
	z-index:1;
	width:100%;
	height:100%;
	left:0;
	top:0;
	background: -moz-linear-gradient(top,  rgba(255,255,255,0.15) 0%, rgba(0,0,0,0.16) 100%);
	background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(255,255,255,0.15)), color-stop(100%,rgba(0,0,0,0.16)));
	background: -webkit-linear-gradient(top,  rgba(255,255,255,0.15) 0%,rgba(0,0,0,0.16) 100%);
	background: -o-linear-gradient(top,  rgba(255,255,255,0.15) 0%,rgba(0,0,0,0.16) 100%);
	background: -ms-linear-gradient(top,  rgba(255,255,255,0.15) 0%,rgba(0,0,0,0.16) 100%);
	background: linear-gradient(top,  rgba(255,255,255,0.15) 0%,rgba(0,0,0,0.16) 100%);
	filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#26ffffff', endColorstr='#29000000',GradientType=0 );
}
.navbar > li:after {
	position:absolute;
	display:block;
	content:"";
	width:100%;
	height:100%;
	top:0;
	left:0;
	background: url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAUAAAAFCAYAAACNbyblAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyJpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuMC1jMDYxIDY0LjE0MDk0OSwgMjAxMC8xMi8wNy0xMDo1NzowMSAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENTNS4xIFdpbmRvd3MiIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6OERFQkEzRUJDNUM5MTFFMUE3NzBCMTZBMEExNEQ5NUQiIHhtcE1NOkRvY3VtZW50SUQ9InhtcC5kaWQ6OERFQkEzRUNDNUM5MTFFMUE3NzBCMTZBMEExNEQ5NUQiPiA8eG1wTU06RGVyaXZlZEZyb20gc3RSZWY6aW5zdGFuY2VJRD0ieG1wLmlpZDo4REVCQTNFOUM1QzkxMUUxQTc3MEIxNkEwQTE0RDk1RCIgc3RSZWY6ZG9jdW1lbnRJRD0ieG1wLmRpZDo4REVCQTNFQUM1QzkxMUUxQTc3MEIxNkEwQTE0RDk1RCIvPiA8L3JkZjpEZXNjcmlwdGlvbj4gPC9yZGY6UkRGPiA8L3g6eG1wbWV0YT4gPD94cGFja2V0IGVuZD0iciI/PiSp0pIAAAAySURBVHjaYmBgYOAHYmYGCADR/CDiDxDzQAW5gPgLlM3ACsQKUBqhBYjZkY3CMBMgwACvHQKnyUp+6gAAAABJRU5ErkJggg==");
}
.navbar > li.drpdown a > span{
	margin-right:30px;
}
.navbar > li.drpdown > a:after {
	position:absolute;
	content: "\0025bc";
	z-index:1;
	font-size:8px;
	top:0;
	right:10px;
	color:#fff;
	text-shadow: 0px -1px 0px rgba(0, 0, 0, 0.8);
    filter: dropshadow(color=#000, offx=0, offy=-1);
	-webkit-transition: all 300ms ease-in-out;
	-moz-transition: all 300ms ease-in-out;
	-ms-transition: all 300ms ease-in-out;
	-o-transition: all 300ms ease-in-out;
	transition: all 300ms ease-in-out;
}
.navbar > li.drpdown a:hover:after,.navbar > li a:hover {
	color:#ccc;
}
.navbar > li.drpdown:hover .drpcontent {
	display:block;
}
.navbar > li:first-child {
	border-left:1px solid #1a1a1a;
}
.navbar > li:last-child {
	-webkit-box-shadow: inset 1px 1px 0px 0px rgba(255, 255, 255, 0.25),inset -1px 0px 0px 0px rgba(255, 255, 255, 0.25);
    box-shadow: inset 1px 1px 0px 0px rgba(255, 255, 255, 0.25), inset -1px 0px 0px 0px rgba(255, 255, 255, 0.25); 
}
.navbar > li > a {
	position:relative;
	display:block;
	width:100%;
	text-decoration:none;
	font-size:12px;
	color:#fff;
	text-shadow: 0px -1px 0px rgba(0, 0, 0, 0.4);
    filter: dropshadow(color=#000, offx=0, offy=-1);
	z-index:4;
	-webkit-transition: all 300ms ease-in-out;
	-moz-transition: all 300ms ease-in-out;
	-ms-transition: all 300ms ease-in-out;
	-o-transition: all 300ms ease-in-out;
	transition: all 300ms ease-in-out;
}
.navbar > li:hover {
	-webkit-box-shadow: inset 0px -2px 8px 0px rgba(0, 0, 0, 0.35);
	box-shadow: inset 0px -2px 8px 0px rgba(0, 0, 0, 0.35); 
}
.navbar > li > a > span {
	position:relative;
	font-weight:bold;
	margin:0 15px 0 0;
}
.navbar > li  .drpcontent {
	position:absolute;
	display:none;
	margin:0;
	padding:20px 0 0 0;
	z-index:5;
	top:36px;
	min-width:200%;
	float:none;
	list-style-type:none;
	border:1px solid #737373;
	border-top:0;
	-webkit-box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.25),inset 0px 6px 4px -4px rgba(0, 0, 0, 0.5);
	box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.25),inset 0px 6px 4px -4px rgba(0, 0, 0, 0.5);
	-webkit-border-radius: 0px 0px 4px 4px;
	border-radius: 0px 0px 4px 4px;
	background: rgb(249,249,249);
	background: -moz-linear-gradient(-45deg,  rgba(249,249,249,1) 0%, rgba(229,229,229,1) 100%);
	background: -webkit-gradient(linear, left top, right bottom, color-stop(0%,rgba(249,249,249,1)), color-stop(100%,rgba(229,229,229,1)));
	background: -webkit-linear-gradient(-45deg,  rgba(249,249,249,1) 0%,rgba(229,229,229,1) 100%);
	background: -o-linear-gradient(-45deg,  rgba(249,249,249,1) 0%,rgba(229,229,229,1) 100%);
	background: -ms-linear-gradient(-45deg,  rgba(249,249,249,1) 0%,rgba(229,229,229,1) 100%);
	background: linear-gradient(135deg,  rgba(249,249,249,1) 0%,rgba(229,229,229,1) 100%);
	filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#f9f9f9', endColorstr='#e5e5e5',GradientType=1 );
	-webkit-transition: opacity 300ms ease-in-out;
	-moz-transition: opacity 300ms ease-in-out;
	-ms-transition: opacity 300ms ease-in-out;
	-o-transition: opacity 300ms ease-in-out;
	transition: opacity 300ms ease-in-out;
}
.navbar > li:not(:last-of-type) .drpcontent {
	left:-1px;
}
.navbar > li:last-child .drpcontent {
	right: -1px;
}
.drpcontent li {
	position:relative;
	text-align:left;
	border-bottom:1px solid rgba(0, 0, 0, 0.2);
	font-size:12px;
	line-height:35px;
	height:35px;
	font-weight:bold;
	-webkit-box-shadow: inset 0px -1px 0px 0px rgba(255, 255, 255, 0.2);
	box-shadow: inset 0px -1px 0px 0px rgba(255, 255, 255, 0.2);
	overflow:hidden;
}
.drpcontent li:before {
	position:absolute;
	display:block;
	content: "";
	width:100%;
	height:100%;
	top:-100%;
	left:0;
	background: #cecece;
	-webkit-transition: all 500ms ease-in-out;
	-moz-transition: all 500ms ease-in-out;
	-ms-transition: all 500ms ease-in-out;
	-o-transition: all 500ms ease-in-out;
	transition: all 500ms ease-in-out;
	opacity:0;
}
.drpcontent li:after {
	position:absolute;
	display:block;
	content: "\0025b6";
	height:20px;
	width:20px;
	top:0;
	left:6px;
	font-size:8px;
	-webkit-transition: all 500ms ease-in-out;
	-moz-transition: all 500ms ease-in-out;
	-ms-transition: all 500ms ease-in-out;
	-o-transition: all 500ms ease-in-out;
	transition: all 500ms ease-in-out;
}
.drpcontent li:hover:before {
	top:0;
	opacity:0.8;
}
.drpcontent li:hover:after {
	color:#fff;
	left:12px;
}
.drpcontent li:last-child:hover:before {
	-webkit-border-radius: 0px 0px 4px 4px;
	border-radius: 0px 0px 4px 4px;
}
.drpcontent li a {
	display:block;
	height:100%;
	width:100%;
	position:relative;
	color:#000;
	text-decoration:none;
	width:100%;
	padding-left:20px;
	-webkit-transition: all 500ms ease-in-out;
	-moz-transition: all 500ms ease-in-out;
	-ms-transition: all 500ms ease-in-out;
	-o-transition: all 500ms ease-in-out;
	transition: all 500ms ease-in-out;
}
.drpcontent li:hover a{
	color:#fff;
	padding-left:26px;
}
.drpcontent li:first-child {
	border-top:1px solid #a6a6a6;
}
.drpcontent li:last-child {
	border:0;
	-webkit-box-shadow:none;
	box-shadow:none; 
	-webkit-border-radius: 0px 0px 4px 4px;
	border-radius: 0px 0px 4px 4px;
}
.icon20{
	position:relative;
	float:left;
	display:block;
	width:20px;
	height:20px;
	margin:6px 8px 0 8px;
	background: url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAHgAAAAoCAYAAAA16j4lAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyJpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuMC1jMDYxIDY0LjE0MDk0OSwgMjAxMC8xMi8wNy0xMDo1NzowMSAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENTNS4xIFdpbmRvd3MiIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6NjJERkRDNTBDNUQ0MTFFMUI3QjJDOTZFNDMzQ0IwMjciIHhtcE1NOkRvY3VtZW50SUQ9InhtcC5kaWQ6NjJERkRDNTFDNUQ0MTFFMUI3QjJDOTZFNDMzQ0IwMjciPiA8eG1wTU06RGVyaXZlZEZyb20gc3RSZWY6aW5zdGFuY2VJRD0ieG1wLmlpZDo2MkRGREM0RUM1RDQxMUUxQjdCMkM5NkU0MzNDQjAyNyIgc3RSZWY6ZG9jdW1lbnRJRD0ieG1wLmRpZDo2MkRGREM0RkM1RDQxMUUxQjdCMkM5NkU0MzNDQjAyNyIvPiA8L3JkZjpEZXNjcmlwdGlvbj4gPC9yZGY6UkRGPiA8L3g6eG1wbWV0YT4gPD94cGFja2V0IGVuZD0iciI/Psj8MzMAAA91SURBVHja7FxbbBTV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") no-repeat;
	-webkit-transition: all 300ms ease-in-out;
	-moz-transition: all 300ms ease-in-out;
	-ms-transition: all 300ms ease-in-out;
	-o-transition: all 300ms ease-in-out;
	transition: all 300ms ease-in-out;
}
.icon20.home {background-position:0 0;}
.icon20.upload {background-position:-20px 0;}
.icon20.download {background-position:-40px 0;}
.icon20.comments {background-position:-60px 0;}
.icon20.theme {background-position:-80px 0;}
.icon20.login {background-position:-100px 0;}
.navbar > li:hover .icon20.home {background-position:0 -20px;}
.navbar > li:hover .icon20.upload {background-position:-20px -20px;}
.navbar > li:hover .icon20.download {background-position:-40px -20px;}
.navbar > li:hover .icon20.comments {background-position:-60px -20px;}
.navbar > li:hover .icon20.theme {background-position:-80px -20px;}
.navbar > li:hover .icon20.login {background-position:-100px -20px;}
</style>
           <style type="text/css">
           .icon20 {	position:relative;
	float:left;
	display:block;
	width:20px;
	height:20px;
	margin:6px 8px 0 8px;
	background: url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAHgAAAAoCAYAAAA16j4lAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyJpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuMC1jMDYxIDY0LjE0MDk0OSwgMjAxMC8xMi8wNy0xMDo1NzowMSAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENTNS4xIFdpbmRvd3MiIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6NjJERkRDNTBDNUQ0MTFFMUI3QjJDOTZFNDMzQ0IwMjciIHhtcE1NOkRvY3VtZW50SUQ9InhtcC5kaWQ6NjJERkRDNTFDNUQ0MTFFMUI3QjJDOTZFNDMzQ0IwMjciPiA8eG1wTU06RGVyaXZlZEZyb20gc3RSZWY6aW5zdGFuY2VJRD0ieG1wLmlpZDo2MkRGREM0RUM1RDQxMUUxQjdCMkM5NkU0MzNDQjAyNyIgc3RSZWY6ZG9jdW1lbnRJRD0ieG1wLmRpZDo2MkRGREM0RkM1RDQxMUUxQjdCMkM5NkU0MzNDQjAyNyIvPiA8L3JkZjpEZXNjcmlwdGlvbj4gPC9yZGY6UkRGPiA8L3g6eG1wbWV0YT4gPD94cGFja2V0IGVuZD0iciI/Psj8MzMAAA91SURBVHja7FxbbBTV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") no-repeat;
	-webkit-transition: all 300ms ease-in-out;
	-moz-transition: all 300ms ease-in-out;
	-ms-transition: all 300ms ease-in-out;
	-o-transition: all 300ms ease-in-out;
	transition: all 300ms ease-in-out;
}
.icon20 {background-position:0 0;}
.icon20 {background-position:-20px 0;}
.icon20 {background-position:-40px 0;}
.icon20 {background-position:-60px 0;}
.icon20 {background-position:-80px 0;}
.icon20 {background-position:-100px 0;}
.navbar1 {	font-family: 'Dosis', sans-serif;
	position:relative;
	display:table;
	float:none;
	list-style-type:none;
	padding:0;
	margin:20px auto 30px auto;
}
           </style>
           <style>



.navbar {
	font-family: 'Dosis', sans-serif;
	position:relative;
	display:table;
	float:none;
	list-style-type:none;
	padding:0;
	margin:20px auto 30px auto;
}
.navbar:before {
	position:absolute;
	display:block;
	content: "";
	z-index:-1;
	width:100%;
	height:18px;
	bottom:-9px;
	left:2px;
	background: -moz-radial-gradient(center, ellipse cover,  rgba(0,0,0,0.7) 0%, rgba(0,0,0,0) 75%);
	background: -webkit-gradient(radial, center center, 0px, center center, 100%, color-stop(0%,rgba(0,0,0,0.7)), color-stop(75%,rgba(0,0,0,0)));
	background: -webkit-radial-gradient(center, ellipse cover,  rgba(0,0,0,0.7) 0%,rgba(0,0,0,0) 75%); 
	background: -o-radial-gradient(center, ellipse cover,  rgba(0,0,0,0.7) 0%,rgba(0,0,0,0) 75%);
	background: -ms-radial-gradient(center, ellipse cover,  rgba(0,0,0,0.7) 0%,rgba(0,0,0,0) 75%);
	background: radial-gradient(center, ellipse cover,  rgba(0,0,0,0.7) 0%,rgba(0,0,0,0) 75%);
	filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#b3000000', endColorstr='#00000000',GradientType=1 );
	opacity:.4;
}
.navbar:after {
	position:absolute;
	display:block;
	content: "";
	z-index:-1;
	width:100%;
	height:100%;
	top:0;
	left:0;
	-webkit-box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.25);
	box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.25);
}
.navbar > li {
	position:relative;
	float:left;
	display:inline-block;
	list-style-type:none;
	text-align:center;
	margin:0;
	border-left:0;
	border:1px solid rgba(0,0,0,0.5);
	line-height:35px;
	-webkit-box-shadow: inset 1px 1px 0px 0px rgba(255, 255, 255, 0.25);
    box-shadow: inset 1px 1px 0px 0px rgba(255, 255, 255, 0.25);
	-webkit-transition: all 300ms ease-in-out;
	-moz-transition: all 300ms ease-in-out;
	-ms-transition: all 300ms ease-in-out;
	-o-transition: all 300ms ease-in-out;
	transition: all 300ms ease-in-out;
}
.navbar.color1 > li {
	background:#F40105;
}
.navbar.color2 > li {
	background:#F40105;
}
.navbar.color3 > li {
	background:#F40105;
}
.navbar.color4 > li {
	background:#F40105;
}
.navbar.color5 > li {
	background:#F40105;
}
.navbar > li:before {
	position:absolute;
	display:block;
	content: "";
	z-index:1;
	width:100%;
	height:100%;
	left:0;
	top:0;
	background: -moz-linear-gradient(top,  rgba(255,255,255,0.15) 0%, rgba(0,0,0,0.16) 100%);
	background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(255,255,255,0.15)), color-stop(100%,rgba(0,0,0,0.16)));
	background: -webkit-linear-gradient(top,  rgba(255,255,255,0.15) 0%,rgba(0,0,0,0.16) 100%);
	background: -o-linear-gradient(top,  rgba(255,255,255,0.15) 0%,rgba(0,0,0,0.16) 100%);
	background: -ms-linear-gradient(top,  rgba(255,255,255,0.15) 0%,rgba(0,0,0,0.16) 100%);
	background: linear-gradient(top,  rgba(255,255,255,0.15) 0%,rgba(0,0,0,0.16) 100%);
	filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#26ffffff', endColorstr='#29000000',GradientType=0 );
}
.navbar > li:after {
	position:absolute;
	display:block;
	content:"";
	width:100%;
	height:100%;
	top:0;
	left:0;
	background: url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAUAAAAFCAYAAACNbyblAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyJpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuMC1jMDYxIDY0LjE0MDk0OSwgMjAxMC8xMi8wNy0xMDo1NzowMSAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENTNS4xIFdpbmRvd3MiIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6OERFQkEzRUJDNUM5MTFFMUE3NzBCMTZBMEExNEQ5NUQiIHhtcE1NOkRvY3VtZW50SUQ9InhtcC5kaWQ6OERFQkEzRUNDNUM5MTFFMUE3NzBCMTZBMEExNEQ5NUQiPiA8eG1wTU06RGVyaXZlZEZyb20gc3RSZWY6aW5zdGFuY2VJRD0ieG1wLmlpZDo4REVCQTNFOUM1QzkxMUUxQTc3MEIxNkEwQTE0RDk1RCIgc3RSZWY6ZG9jdW1lbnRJRD0ieG1wLmRpZDo4REVCQTNFQUM1QzkxMUUxQTc3MEIxNkEwQTE0RDk1RCIvPiA8L3JkZjpEZXNjcmlwdGlvbj4gPC9yZGY6UkRGPiA8L3g6eG1wbWV0YT4gPD94cGFja2V0IGVuZD0iciI/PiSp0pIAAAAySURBVHjaYmBgYOAHYmYGCADR/CDiDxDzQAW5gPgLlM3ACsQKUBqhBYjZkY3CMBMgwACvHQKnyUp+6gAAAABJRU5ErkJggg==");
}
.navbar > li.drpdown a > span{
	margin-right:30px;
}
.navbar > li.drpdown > a:after {
	position:absolute;
	content: "\0025bc";
	z-index:1;
	font-size:8px;
	top:0;
	right:10px;
	color:#fff;
	text-shadow: 0px -1px 0px rgba(0, 0, 0, 0.8);
    filter: dropshadow(color=#000, offx=0, offy=-1);
	-webkit-transition: all 300ms ease-in-out;
	-moz-transition: all 300ms ease-in-out;
	-ms-transition: all 300ms ease-in-out;
	-o-transition: all 300ms ease-in-out;
	transition: all 300ms ease-in-out;
}
.navbar > li.drpdown a:hover:after,.navbar > li a:hover {
	color:#ccc;
}
.navbar > li.drpdown:hover .drpcontent {
	display:block;
}
.navbar > li:first-child {
	border-left:1px solid #1a1a1a;
}
.navbar > li:last-child {
	-webkit-box-shadow: inset 1px 1px 0px 0px rgba(255, 255, 255, 0.25),inset -1px 0px 0px 0px rgba(255, 255, 255, 0.25);
    box-shadow: inset 1px 1px 0px 0px rgba(255, 255, 255, 0.25), inset -1px 0px 0px 0px rgba(255, 255, 255, 0.25); 
}
.navbar > li > a {
	position:relative;
	display:block;
	width:100%;
	text-decoration:none;
	font-size:12px;
	color:#fff;
	text-shadow: 0px -1px 0px rgba(0, 0, 0, 0.4);
    filter: dropshadow(color=#000, offx=0, offy=-1);
	z-index:4;
	-webkit-transition: all 300ms ease-in-out;
	-moz-transition: all 300ms ease-in-out;
	-ms-transition: all 300ms ease-in-out;
	-o-transition: all 300ms ease-in-out;
	transition: all 300ms ease-in-out;
}
.navbar > li:hover {
	-webkit-box-shadow: inset 0px -2px 8px 0px rgba(0, 0, 0, 0.35);
	box-shadow: inset 0px -2px 8px 0px rgba(0, 0, 0, 0.35); 
}
.navbar > li > a > span {
	position:relative;
	font-weight:bold;
	margin:0 15px 0 0;
}
.navbar > li  .drpcontent {
	position:absolute;
	display:none;
	margin:0;
	padding:20px 0 0 0;
	z-index:5;
	top:36px;
	min-width:200%;
	float:none;
	list-style-type:none;
	border:1px solid #737373;
	border-top:0;
	-webkit-box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.25),inset 0px 6px 4px -4px rgba(0, 0, 0, 0.5);
	box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.25),inset 0px 6px 4px -4px rgba(0, 0, 0, 0.5);
	-webkit-border-radius: 0px 0px 4px 4px;
	border-radius: 0px 0px 4px 4px;
	background: rgb(249,249,249);
	background: -moz-linear-gradient(-45deg,  rgba(249,249,249,1) 0%, rgba(229,229,229,1) 100%);
	background: -webkit-gradient(linear, left top, right bottom, color-stop(0%,rgba(249,249,249,1)), color-stop(100%,rgba(229,229,229,1)));
	background: -webkit-linear-gradient(-45deg,  rgba(249,249,249,1) 0%,rgba(229,229,229,1) 100%);
	background: -o-linear-gradient(-45deg,  rgba(249,249,249,1) 0%,rgba(229,229,229,1) 100%);
	background: -ms-linear-gradient(-45deg,  rgba(249,249,249,1) 0%,rgba(229,229,229,1) 100%);
	background: linear-gradient(135deg,  rgba(249,249,249,1) 0%,rgba(229,229,229,1) 100%);
	filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#f9f9f9', endColorstr='#e5e5e5',GradientType=1 );
	-webkit-transition: opacity 300ms ease-in-out;
	-moz-transition: opacity 300ms ease-in-out;
	-ms-transition: opacity 300ms ease-in-out;
	-o-transition: opacity 300ms ease-in-out;
	transition: opacity 300ms ease-in-out;
}
.navbar > li:not(:last-of-type) .drpcontent {
	left:-1px;
}
.navbar > li:last-child .drpcontent {
	right: -1px;
}
.drpcontent li {
	position:relative;
	text-align:left;
	border-bottom:1px solid rgba(0, 0, 0, 0.2);
	font-size:12px;
	line-height:35px;
	height:35px;
	font-weight:bold;
	-webkit-box-shadow: inset 0px -1px 0px 0px rgba(255, 255, 255, 0.2);
	box-shadow: inset 0px -1px 0px 0px rgba(255, 255, 255, 0.2);
	overflow:hidden;
}
.drpcontent li:before {
	position:absolute;
	display:block;
	content: "";
	width:100%;
	height:100%;
	top:-100%;
	left:0;
	background: #cecece;
	-webkit-transition: all 500ms ease-in-out;
	-moz-transition: all 500ms ease-in-out;
	-ms-transition: all 500ms ease-in-out;
	-o-transition: all 500ms ease-in-out;
	transition: all 500ms ease-in-out;
	opacity:0;
}
.drpcontent li:after {
	position:absolute;
	display:block;
	content: "\0025b6";
	height:20px;
	width:20px;
	top:0;
	left:6px;
	font-size:8px;
	-webkit-transition: all 500ms ease-in-out;
	-moz-transition: all 500ms ease-in-out;
	-ms-transition: all 500ms ease-in-out;
	-o-transition: all 500ms ease-in-out;
	transition: all 500ms ease-in-out;
}
.drpcontent li:hover:before {
	top:0;
	opacity:0.8;
}
.drpcontent li:hover:after {
	color:#fff;
	left:12px;
}
.drpcontent li:last-child:hover:before {
	-webkit-border-radius: 0px 0px 4px 4px;
	border-radius: 0px 0px 4px 4px;
}
.drpcontent li a {
	display:block;
	height:100%;
	width:100%;
	position:relative;
	color:#000;
	text-decoration:none;
	width:100%;
	padding-left:20px;
	-webkit-transition: all 500ms ease-in-out;
	-moz-transition: all 500ms ease-in-out;
	-ms-transition: all 500ms ease-in-out;
	-o-transition: all 500ms ease-in-out;
	transition: all 500ms ease-in-out;
}
.drpcontent li:hover a{
	color:#fff;
	padding-left:26px;
}
.drpcontent li:first-child {
	border-top:1px solid #a6a6a6;
}
.drpcontent li:last-child {
	border:0;
	-webkit-box-shadow:none;
	box-shadow:none; 
	-webkit-border-radius: 0px 0px 4px 4px;
	border-radius: 0px 0px 4px 4px;
}
.icon20{
	position:relative;
	float:left;
	display:block;
	width:20px;
	height:20px;
	margin:6px 8px 0 8px;
	background: url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAHgAAAAoCAYAAAA16j4lAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyJpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuMC1jMDYxIDY0LjE0MDk0OSwgMjAxMC8xMi8wNy0xMDo1NzowMSAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENTNS4xIFdpbmRvd3MiIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6NjJERkRDNTBDNUQ0MTFFMUI3QjJDOTZFNDMzQ0IwMjciIHhtcE1NOkRvY3VtZW50SUQ9InhtcC5kaWQ6NjJERkRDNTFDNUQ0MTFFMUI3QjJDOTZFNDMzQ0IwMjciPiA8eG1wTU06RGVyaXZlZEZyb20gc3RSZWY6aW5zdGFuY2VJRD0ieG1wLmlpZDo2MkRGREM0RUM1RDQxMUUxQjdCMkM5NkU0MzNDQjAyNyIgc3RSZWY6ZG9jdW1lbnRJRD0ieG1wLmRpZDo2MkRGREM0RkM1RDQxMUUxQjdCMkM5NkU0MzNDQjAyNyIvPiA8L3JkZjpEZXNjcmlwdGlvbj4gPC9yZGY6UkRGPiA8L3g6eG1wbWV0YT4gPD94cGFja2V0IGVuZD0iciI/Psj8MzMAAA91SURBVHja7FxbbBTV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") no-repeat;
	-webkit-transition: all 300ms ease-in-out;
	-moz-transition: all 300ms ease-in-out;
	-ms-transition: all 300ms ease-in-out;
	-o-transition: all 300ms ease-in-out;
	transition: all 300ms ease-in-out;
}
.icon20.home {background-position:0 0;}
.icon20.upload {background-position:-20px 0;}
.icon20.download {background-position:-40px 0;}
.icon20.comments {background-position:-60px 0;}
.icon20.theme {background-position:-80px 0;}
.icon20.login {background-position:-100px 0;}
.navbar > li:hover .icon20.home {background-position:0 -20px;}
.navbar > li:hover .icon20.upload {background-position:-20px -20px;}
.navbar > li:hover .icon20.download {background-position:-40px -20px;}
.navbar > li:hover .icon20.comments {background-position:-60px -20px;}
.navbar > li:hover .icon20.theme {background-position:-80px -20px;}
.navbar > li:hover .icon20.login {background-position:-100px -20px;}
.icon201 {	position:relative;
	float:left;
	display:block;
	width:20px;
	height:20px;
	margin:6px 8px 0 8px;
	background: url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAHgAAAAoCAYAAAA16j4lAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyJpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuMC1jMDYxIDY0LjE0MDk0OSwgMjAxMC8xMi8wNy0xMDo1NzowMSAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENTNS4xIFdpbmRvd3MiIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6NjJERkRDNTBDNUQ0MTFFMUI3QjJDOTZFNDMzQ0IwMjciIHhtcE1NOkRvY3VtZW50SUQ9InhtcC5kaWQ6NjJERkRDNTFDNUQ0MTFFMUI3QjJDOTZFNDMzQ0IwMjciPiA8eG1wTU06RGVyaXZlZEZyb20gc3RSZWY6aW5zdGFuY2VJRD0ieG1wLmlpZDo2MkRGREM0RUM1RDQxMUUxQjdCMkM5NkU0MzNDQjAyNyIgc3RSZWY6ZG9jdW1lbnRJRD0ieG1wLmRpZDo2MkRGREM0RkM1RDQxMUUxQjdCMkM5NkU0MzNDQjAyNyIvPiA8L3JkZjpEZXNjcmlwdGlvbj4gPC9yZGY6UkRGPiA8L3g6eG1wbWV0YT4gPD94cGFja2V0IGVuZD0iciI/Psj8MzMAAA91SURBVHja7FxbbBTV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") no-repeat;
	-webkit-transition: all 300ms ease-in-out;
	-moz-transition: all 300ms ease-in-out;
	-ms-transition: all 300ms ease-in-out;
	-o-transition: all 300ms ease-in-out;
	transition: all 300ms ease-in-out;
}
.icon201 {background-position:0 0;}
.icon201 {background-position:-20px 0;}
.icon201 {background-position:-40px 0;}
.icon201 {background-position:-60px 0;}
.icon201 {background-position:-80px 0;}
.icon201 {background-position:-100px 0;}
.icon201 {position:relative;
	float:left;
	display:block;
	width:20px;
	height:20px;
	margin:6px 8px 0 8px;
	background: url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAHgAAAAoCAYAAAA16j4lAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyJpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuMC1jMDYxIDY0LjE0MDk0OSwgMjAxMC8xMi8wNy0xMDo1NzowMSAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENTNS4xIFdpbmRvd3MiIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6NjJERkRDNTBDNUQ0MTFFMUI3QjJDOTZFNDMzQ0IwMjciIHhtcE1NOkRvY3VtZW50SUQ9InhtcC5kaWQ6NjJERkRDNTFDNUQ0MTFFMUI3QjJDOTZFNDMzQ0IwMjciPiA8eG1wTU06RGVyaXZlZEZyb20gc3RSZWY6aW5zdGFuY2VJRD0ieG1wLmlpZDo2MkRGREM0RUM1RDQxMUUxQjdCMkM5NkU0MzNDQjAyNyIgc3RSZWY6ZG9jdW1lbnRJRD0ieG1wLmRpZDo2MkRGREM0RkM1RDQxMUUxQjdCMkM5NkU0MzNDQjAyNyIvPiA8L3JkZjpEZXNjcmlwdGlvbj4gPC9yZGY6UkRGPiA8L3g6eG1wbWV0YT4gPD94cGFja2V0IGVuZD0iciI/Psj8MzMAAA91SURBVHja7FxbbBTV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") no-repeat;
	-webkit-transition: all 300ms ease-in-out;
	-moz-transition: all 300ms ease-in-out;
	-ms-transition: all 300ms ease-in-out;
	-o-transition: all 300ms ease-in-out;
	transition: all 300ms ease-in-out;
}
.icon201 {background-position:0 0;}
.icon201 {background-position:-20px 0;}
.icon201 {background-position:-40px 0;}
.icon201 {background-position:-60px 0;}
.icon201 {background-position:-80px 0;}
.icon201 {background-position:-100px 0;}
.icon201 {	position:relative;
	float:left;
	display:block;
	width:20px;
	height:20px;
	margin:6px 8px 0 8px;
	background: url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAHgAAAAoCAYAAAA16j4lAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyJpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuMC1jMDYxIDY0LjE0MDk0OSwgMjAxMC8xMi8wNy0xMDo1NzowMSAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENTNS4xIFdpbmRvd3MiIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6NjJERkRDNTBDNUQ0MTFFMUI3QjJDOTZFNDMzQ0IwMjciIHhtcE1NOkRvY3VtZW50SUQ9InhtcC5kaWQ6NjJERkRDNTFDNUQ0MTFFMUI3QjJDOTZFNDMzQ0IwMjciPiA8eG1wTU06RGVyaXZlZEZyb20gc3RSZWY6aW5zdGFuY2VJRD0ieG1wLmlpZDo2MkRGREM0RUM1RDQxMUUxQjdCMkM5NkU0MzNDQjAyNyIgc3RSZWY6ZG9jdW1lbnRJRD0ieG1wLmRpZDo2MkRGREM0RkM1RDQxMUUxQjdCMkM5NkU0MzNDQjAyNyIvPiA8L3JkZjpEZXNjcmlwdGlvbj4gPC9yZGY6UkRGPiA8L3g6eG1wbWV0YT4gPD94cGFja2V0IGVuZD0iciI/Psj8MzMAAA91SURBVHja7FxbbBTV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") no-repeat;
	-webkit-transition: all 300ms ease-in-out;
	-moz-transition: all 300ms ease-in-out;
	-ms-transition: all 300ms ease-in-out;
	-o-transition: all 300ms ease-in-out;
	transition: all 300ms ease-in-out;
}
.icon201 {background-position:0 0;}
.icon201 {background-position:-20px 0;}
.icon201 {background-position:-40px 0;}
.icon201 {background-position:-60px 0;}
.icon201 {background-position:-80px 0;}
.icon201 {background-position:-100px 0;}
.navbar2 {	font-family: 'Dosis', sans-serif;
	position:relative;
	display:table;
	float:none;
	list-style-type:none;
	padding:0;
	margin:20px auto 30px auto;
}
.navbar2 {	font-family: 'Dosis', sans-serif;
	position:relative;
	display:table;
	float:none;
	list-style-type:none;
	padding:0;
	margin:20px auto 30px auto;
}
           </style>
      </head>  
      <body>  
   
		        
           <p>
             <input name="conteo" type="hidden" id="conteo" value="<?=$conteo ?>">
           </p>
           <p>&nbsp;</p>
		  <form action="#" method="post">
           <table width="44%" border="2" align="center" cellpadding="{scmCellpadding}" cellspacing="0" id="sites-chrome-main">
             <tbody>
               <tr>
                 <td id="sites-canvas-wrapper" style="text-align: justify"><div align="center"><strong><font color="ED0404">Planilla Conteo 3</strong></div></td>
               </tr>
               <tr>
                 <td id="sites-canvas-wrapper5" style="text-align: left"><div>
                   <div align="center">
                     <input name="zonas" type="number" id="zonas" placeholder="Numero Zona"  size="10" required="required" />
                   </div>
                 </div>
                   <div></div>
                   <div></div></td>
               </tr>
               <tr>
                 <td id="sites-canvas-wrapper5" style="text-align: left"><div>
                   <div align="center">
                     <input name="pifi" type="number" id="pifi" placeholder="Planilla Conteo3"  size="5" required="required" />
                   </div>
                 </div>
                   <div></div>
                   <div></div></td>
               </tr>
               <tr>
                 <td id="sites-canvas-wrapper11"><div style="text-align: center">
                   <input name="image" type="image" onclick="return validaFecha( this.form );" src="images/btn_ver.png" />
                 </div></td>
               </tr>
             </tbody>
           </table>
			  </form>
           <p>&nbsp;</p>
           <div class="container">
             <p></p><p></p>
			   <div align="center">
			   <a href="detalle_planilla_excel.php?id_planilla=<?echo $planilla.$aux_id_get1.$conteo_de_zona.$aux_id_get1.$la_de_conteo?>"><img src="images/icono_excel.jpg" width="57" height="57" alt=""/></a></div>
<div class="table-responsive">  
       <table id="employee_data" class="table table-striped table-bordered">  
                          <thead>  
                               <tr> 
							   
                                    <th>Zona
                                    <th>Planilla
                                    <th>
				 Codigo. Barras
                                      </td>
							  <th>
				 Descripcion
                                      </td>
					  <th>
				 Fecha
                                      </td>
				 <th>
				 Conteo
                                      </td>
			   <th>
				 Estado
                                      </td>
					 
                                 
                            </tr>  
                          </thead> 

                          <?php  
                          while($row = mysqli_fetch_array($result))  
                          {  
							?>
<tr>
<td><? echo $row["zona"];?></td>	
<td><? echo $row["Planilla"];?></td>
<td><? echo $row["Barra"];?></td>
<td><? echo $row["descripcion"];?></td>	
<td><? echo $row["Fecha"];?></td>	
<td><? echo $row["Conteo"];?></td>
<td><? 
if ($row["Estado"]== 1)echo "Abierto";	
if ($row["Estado"]== 2)echo "Cerrado";								  
							  ?></td>

                     <?
                    }  
                          ?> 
	</tr>
    </table>
                  
             </div>  
      </div>  
          
          
    <script src="public/js/bootstrap.min.js"></script>
    <script src="public/js/funciones.js"></script>
      </body>  
 </html>  
 <script>  
 $(document).ready(function(){  
      $('#employee_data').DataTable();  
 });  
 </script>  