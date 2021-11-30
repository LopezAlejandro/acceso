<?php
include "header.php";
?>

	<div class="ml-5">
		<?php
                echo "<h1>".$columna3['tipo_acceso']."</h1>";
                echo "<h6>".$columna3['ta_leyenda']."</h6>";
      ?> 
	</div>
	<div class="container-fluid">
		
			<div class="row row-cols-1 row-cols-md-3">
				<div class="col-7 ml-4"> 
					<?php 
					        echo "<div class='table-responsive'>"; 
					        echo "<table class='table table-striped table-bordered'>";
					        echo "<thead>";
					        echo "<tr>";
					        echo "<th style='width: 40%' scope='col'>Nombre de la base</th>";
					        echo "<th style='width: 50%' scope='col'>url</th>";
					        echo "</tr>";
					        echo "</thead>";
					        echo "<tbody>";
					    
					         while ($columna = mysqli_fetch_array( $resultado ))
					                    {
					                  echo "<tr>";                
					                    
					                   //   echo "<td><h6><strong>".$columna['titulo']."</strong></h6></td>";
					                   
					                    $consulta2 = "SELECT * FROM urls where base = ".$columna['b_id']." and  activo=1";
					                        $resultado2 = mysqli_query( $conexion, $consulta2 ) or die ( "Algo ha ido mal en la consulta a la base de datos (url)");
					                        $cantidad = mysqli_num_rows($resultado2);                       
					                        echo "<td rowspan = ".$cantidad."><strong>".$columna['b_nombre']."</strong></td>";
					                       // echo "<td rowspan = ".$cantidad."><img class='mycenter' alt='140x140' src='images/".$columna['imagen']."'></td>";
					                        while($columna2 = mysqli_fetch_array( $resultado2 )) 
					                        { 
					                    echo "<td><a target='_blank' rel='noopener noreferrer' href='".$columna2['url']."'>".$columna2['url']."</a></td>";
					                    echo "</tr>";
					                    
					                    }
					                    }
					         echo "</tbody>";
					         echo "</table>";   
					         echo "</div>";     
					         
					         ?>
				</div> 
				<div id="fondo" class="col-4">
				</div>
			</div>
	</div>
	<div class="container-fluid">
		<nav aria-label="Page">
			<ul class="pagination justify-content-center" style="font-size: 0.7em;">
				<li class="page-item">
					<a class="page-link" href="?pageno=1&f=<?php echo $ano; ?>">Primero</a>
				</li><?php if($pageno <= 1){
				                            echo '<li class="page-item disabled" style="border-color: #F39EA3;"><a class="page-link" href="#" tabindex="-1" aria-disabled="true">Anterior</a></li>';
				                                 } else {
				                            echo '<li class="page-item"><a class="page-link" href="?pageno='.($pageno - 1).'&f='.$ano.'">Anterior</a></li>';    
				                                 }
				                    ?><?php if($pageno < $total_pages){
				                            echo '<li class="page-item"><a class="page-link" href="?pageno='.($pageno + 1).'&f='.$ano.'">Siguiente</a></li>';                  
				                    } else {
				                            echo '<li class="page-item disabled" style="border-color: #F39EA3;"><a class="page-link" href="#" tabindex="-1" aria-disabled="true">Siguiente</a></li>';
				                    }
				                    ?>
				<li class="page-item">
				<a class="page-link" href="?pageno=<?php echo $total_pages; ?>&f=<?php echo $ano; ?>">Último</a>
				</li>
			</ul>
		</nav>
	</div>
<?php include "footer.php";	?>
