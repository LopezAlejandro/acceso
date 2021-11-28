<!doctype html>
<html lang="es">
<head> 

<?php
	if (isset($_GET['f'])) {
            $ano = $_GET['f'];
        } else {
            $ano = 1;
        }
   if ($ano > 4 or $ano < 1){
   			$ano = 1;
   	}     

	if (isset($_GET['pageno'])) {
            $pageno = $_GET['pageno'];
        } else {
            $pageno = 1;
        }
   $no_of_records_per_page = 6;
   $offset = ($pageno-1) * $no_of_records_per_page;
   
   include "db.php";

   $total_pages_sql = "SELECT COUNT(*) FROM bases where activo=1 and t_ac=$ano";
   $result = mysqli_query($conexion,$total_pages_sql) or die ( "Algo ha ido mal en la consulta a la base de datos (count)");
   $total_rows = mysqli_fetch_array($result);
   $total_pages = ceil($total_rows[0] / $no_of_records_per_page);
  
   $consulta = "SELECT * FROM bases where activo=1 and t_ac=$ano LIMIT $offset , $no_of_records_per_page";
	$resultado = mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos (select)");
	
	$consulta3 = "SELECT * FROM tipo_acceso where ta_id=$ano and activo=1 LIMIT 1";
	$resultado3 = mysqli_query( $conexion, $consulta3 ) or die ( "Algo ha ido mal en la consulta a la base de datos"); 
	$columna3 = mysqli_fetch_array($resultado3);
/*	
	$consulta2 = "SELECT * FROM urls where base=$bid and  activo=1";
	$resultado2 = mysqli_query( $conexion, $consulta2 ) or die ( "Algo ha ido mal en la consulta a la base de datos (url)"); 
	
	$consulta3 = "SELECT * FROM noches where ano=$ano and activo=1 LIMIT 1";
	$resultado3 = mysqli_query( $conexion, $consulta3 ) or die ( "Algo ha ido mal en la consulta a la base de datos");
	*/
?>
    <!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css'>
<link rel="stylesheet" href="css/lightbox.css" />
<link rel="stylesheet" href="css/biblio_style.css">

<title>Recursos de Acceso Remoto</title>
</head>
<body>
    <div class="container-fluid">
        <div class="row align-items-start text-white bg-dark" style="height: 150px;">
            <div class="col my-auto encabezado">
                <h3><strong>Recursos de Acceso Remoto</strong></h3>
            </div>    
        </div>
    </div>    

    <div class="container-fluid" style="background-color:#E4DABF; height: 30px;">
        <nav class="navbar navbar-expand-lg navbar-light" style="background-color:#E4DABF; height: 30px;" >
            <a class="navbar-brand" href="https://biblioteca.fadu.uba.ar">Inicio</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                		<!--<a class="nav-item nav-link" href="introduccion.php">Introducci&oacute;n</a>-->
                  	<!--<a class="nav-item nav-link" href="inicio.php?pageno=1">Indice General</a>-->
                    
                </div>
            </div>
        </nav>
	 </div> 
     
	<div class="spacer"></div> 
	