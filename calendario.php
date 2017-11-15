<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>calendario</title>
<style type="text/css">
<!--
body {
	background-image: url(LightMossMarble2.BMP);
}
-->
</style>
<script>
function volver(){
	frm_calenda.submit();
}
</script>
</head>

<body>
<?php

$fecha = $_POST['txt_fecha'];
$cantd = $_POST['txt_dias'];
$fechats = strtotime($fecha);
function devuelve_dia($fec){
		switch (date('w', $fec)){ 
			case 0: $dia = "Domingo"; return $dia; 
			case 1: $dia = "Lunes"; return $dia; 
			case 2: $dia = "Martes"; return $dia; 
			case 3: $dia = "Miercoles"; return $dia; 
			case 4: $dia = "Jueves"; return $dia; 
			case 5: $dia = "Viernes"; return $dia; 
			case 6: $dia = "Sabado"; return $dia; 
		}  
}

if(devuelve_dia($fechats)=="Domingo" || devuelve_dia($fechats)=="Sabado" || $fecha == '06-01-2011'){
	?><p align="center"><h1><blockquote style="color:#FF3333" >Verifique el inicio, puesto que cae en sábado, domingo o feriado</blockquote></h1>
	<?php
}

	?><h1><h1><p align="center">Inicio : <?php echo $fecha ." ". devuelve_dia($fechats) ?></h1></h1>
	<?php
	echo "<br>";
	
	function sumaDia($fec,$dia)
	{list($day,$mon,$year) = explode('-',$fec);
	return date('d-m-Y',mktime(0,0,0,$mon,$day+$dia,$year));} 
	
	$fecha1 = $fecha;
	$i=1;
	
	for($i=1;$i<=$cantd;$i++){
		$fecha1 = sumaDia($fecha1, 1);
		$fechats = strtotime($fecha1);
		if(devuelve_dia($fechats)=="Domingo" || devuelve_dia($fechats)=="Sabado"){
			$cantd++;
		}elseif($fecha1 == '06-01-2011'){
			$cantd++;
		}
	}
	?>
	<h1><h1><p align="center">Finalización : <?php echo sumaDia($fecha,$cantd) . " ". devuelve_dia(strtotime(sumaDia($fecha, $cantd)))
	
	?></h1></h1>
<form name="frm_calenda" action="formulario.html">
<input type="button" value="volver" onclick="volver();" />
</form>
</body>
</html>
