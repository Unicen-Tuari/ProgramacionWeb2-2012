<div id="navegacion">
	<ul>
		<li>
			» <a href="index.php">Argentina</a>
		</li>
		<?php if ($provincia_y_municipio["provincia"]!=""){?>
			<li>
				<?php $url_amigable="index.php?ubicacion=".url_amigable($provincia_y_municipio["provincia"]->get_nombre())?>
				» <a href="<?php echo $url_amigable?>"><?php echo $provincia_y_municipio["provincia"]->get_nombre()?></a>
				
			</li><?php }?>
		<li>
		<?php if ($provincia_y_municipio["municipio"]!=""){?>
			<?php $url_amigable="index.php?ubicacion=".url_amigable($provincia_y_municipio["municipio"]->get_nombre())?>
			» <a href="<?php echo $url_amigable?>"><?php echo $provincia_y_municipio["municipio"]->get_nombre()?></a>
		</li><?php }?>
		<li>
		<?php $url_amigable="categorias.php?categoria=".url_amigable($categorias_relacionadas[0]->get_nombre()."&amp;ubicacion=".$ubicacion)?>
			» <a href="<?php echo $url_amigable?>"><?php echo $categorias_relacionadas[0]->get_nombre()." en ".$ubicacion?></a>
		</li>
		<?php if ($categoria_para_mostrar != normalizar($categorias_relacionadas[0]->get_nombre())){ ?>
		<li>
		<?php $url_amigable="categorias.php?categoria=".url_amigable($categoria_actual."&amp;subcategoria=".$subcategoria_actual."&amp;ubicacion=".$ubicacion)?>
			» <a href="<?php echo $url_amigable?>"><?php echo capitalizar($subcategoria_actual)." en $ubicacion"?></a>
		</li><?php }?>		
		<?php if (isset($clasificado)){?>
		<li>
			» <?php echo $clasificado->get_titulo()?>
		</li><?php }?>	
	</ul>
</div>