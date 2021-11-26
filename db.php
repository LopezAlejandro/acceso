<?php
    
    if(basename(__FILE__) == basename($_SERVER['PHP_SELF'])) send_404();
    
    // Datos de la base de datos
	$usuario = "recursos";
	$password = "n4v1d4d";
	$servidor = "localhost";
	$basededatos ="acceso";
	
	// creación de la conexión a la base de datos con mysql_connect()
	$conexion = mysqli_connect( $servidor, $usuario, $password ) or die ("No se ha podido conectar al servidor de Base de datos");
	
	// Selección del a base de datos a utilizar
	$db = mysqli_select_db( $conexion, $basededatos ) or die ( "Upps! Pues va a ser que no se ha podido conectar a la base de datos revistas");

    # This function will send an imitation 404 page if the user
    # types in this files filename into the address bar.
    # only files connecting with in the same directory as this
    # file will be able to use it as well.
    function send_404()
    {
        header('HTTP/1.x 404 Not Found');
        print '<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML 2.0//EN">'."\n".
        '<html><head>'."\n".
        '<title>404 Not Found</title>'."\n".
        '</head><body>'."\n".
        '<h1>Not Found</h1>'."\n".
        '<p>The requested URL '.
        str_replace(strstr($_SERVER['REQUEST_URI'], '?'), '', $_SERVER['REQUEST_URI']).
        ' was not found on this server.</p>'."\n".
        '</body></html>'."\n";
        exit;
    }

?>











