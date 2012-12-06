</div>

		<div id="zona_centro">
			<div id="estilotext"><p>Marcas</p>

			<?php
				ini_set('display_errors', '0');     #No muestra los errores
				session_start(); 

				require_once ('config.php'); 
				require_once ('DataObjects/Marca.php'); 

				$marca = new DO_Marca;

				$marca->find();
				

				while($marca->fetch()){

						

					echo 	"<a href='prueba.php?id_cat=$marca->id' > $marca->marcas </a> <br>" ;	


					}







			?>


			</div>	
		</div>
		<div id="zona_categorias">
			
		<?php

			require_once ('config.php'); 
			require_once ('DataObjects/Automoviles.php'); 


			$newAuto = new DO_Automoviles;
			$newAuto->whereAdd('id_cat=' . $_REQUEST['id_cat']);
			$newAuto->find(); 

			while($newAuto->fetch()){
				echo "<div id='principo'>";				
				echo "<div id='modelo'>$newAuto->modelo</div>";
				echo "<div id='precio'>$newAuto->precio</div>";
				echo "<div id='descripcion'>$newAuto->descripcion</div>";
				echo "<div id='mostrarimag'></div>";
				echo "</div>";
				
					
				}


			



		?>