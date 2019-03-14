<div class="col-md-9">
	<section class="seccion">
		<h1 class="titulo">Galerías</h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo $ruta; ?>">Panel de administración</a></li>
			<li class="active">Galerías</li>
		</ol>
	</section>

	<section class="seccion">
		Para agregar o quitar una foto a un album ya existente, haga click en el álbum. Si desea crear un nuevo álbum pinche en el botón azul.
		<br><br>
		<?php
		$sql = mysql_query("SELECT * FROM Seccion inner join Album on Seccion.idSeccion = Album.idSeccion GROUP BY Seccion.idSeccion");
		while($col = mysql_fetch_array($sql))
		{
			?>
			<div class="seccionAlbum">
				<h2><?php echo $col['Identificador']; ?></h2>
				<div class="seccionAlbum_interior">
					<?php
					$sql2 = mysql_query("SELECT * FROM Album WHERE idSeccion = '".$col['idSeccion']."'");
					while($col2 = mysql_fetch_array($sql2))
					{
						echo '<div class="categoria"><a href="editar/?idAlbum='.$col2['idAlbum'].'" class="nohref"><img src="'.$ruta.'img/flecha.png" style="position:relative; top:-2px;" alt="" /> '.$col2['Nombre'].'</a></div>';
					}
					?>
					<a href="agregar/?idSeccion=<?php echo $col['idSeccion']; ?>" style="margin-left:10px" class="mini boton" value="Enviar" name="enviar">Agregar album en '<?php echo $col['Identificador']; ?>'</a>
				</div>
			</div>
			<?php
		}
		?>
	</section>
</div>