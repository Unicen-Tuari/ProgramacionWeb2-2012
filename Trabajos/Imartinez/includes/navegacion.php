<div id="navegacion">
	<ul>
<?php /*para el correcto funcionamiento necesito 
$ciudad_actual
$provincia_actual
$categoria_actual
$subcategoria_actual
$ubicacion
*/?>
		<li>
			» <a href="index.php">Argentina</a>
		</li>
		<?php if ($provincia_actual!=""){?>
			<li>
				<?php $url_amigable="index.php?ubicacion=".url_amigable($provincia_actual)?>
				» <a href="<?php echo $url_amigable?>"><?php echo $provincia_actual?></a>
				
			</li><?php }?>
		<li>
		<?php if ($ciudad_actual!=""){?>
			<?php $url_amigable="index.php?ubicacion=".url_amigable($ciudad_actual)?>
			» <a href="<?php echo $url_amigable?>"><?php echo capitalizar($ciudad_actual)?></a>
		</li><?php }?>
		<li>
		<?php $url_amigable="categorias.php?categoria=".url_amigable($categoria_actual."&amp;ubicacion=".$ubicacion)?>
			» <a href="<?php echo $url_amigable?>"><?php echo $categoria_actual." en ".$ubicacion?></a>
		</li>
		<?php if ($categoria_para_mostrar != $categoria_actual){ ?>
		<li>
		<?php $url_amigable="categorias.php?categoria=".url_amigable($categoria_actual."&amp;subcategoria=".$subcategoria_actual."&amp;ubicacion=".$ubicacion)?>
			» <a href="<?php echo $url_amigable?>"><?php echo capitalizar($subcategoria_actual)." en $ubicacion"?></a>
		</li><?php }?>		
		<?php if (isset($clasificado)){?>
		<li>
			» <?php echo $clasificado->titulo?>
		</li><?php }?>	
	</ul>
</div>