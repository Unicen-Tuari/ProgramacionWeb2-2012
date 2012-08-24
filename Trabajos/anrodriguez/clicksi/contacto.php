<?php
include_once './estructura/encabezado.inc.php';
?>	
<div id="content">
	<form class="formContacto" method="post" onSubmit="return ValidarFormularioContacto(this);"
		action="./rutinas/qcontacto.php">
		<div>
			<h1>Formulario de Contacto</h1>
		</div>
		<br />
		<div>
			<table>
				<tr>
					<td>Razon Social (*)</td>
					<td><input type="text" size="50" name="razonsocial" onBlur="return ValidarRazonSocialFormularioContacto(this);"/>
					</td>
				</tr>
				<tr>
					<td>Correo electronico (*)</td>
					<td><input type="text" size="50" name="email" onBlur="return ValidarEmailFormularioContacto(this);"/>
					</td>
				</tr>
				<tr>
					<td>Telefono</td>
					<td><input type="text" size="30" name="telefono" />
					</td>
				</tr>
				<tr>
					<td>Localidad</td>
					<td><input type="text" size="30" name="localidad" />
					</td>
				</tr>
				<tr>
					<td></td>
				</tr>
				<tr>
					<td>Motivo</td>
					<td><select name="motivo">
							<option value="0">Consulta</option>
							<option value="1">Sugerencia</option>
							<option value="2">Reclamo</option>
							<option value="3">Otro</option>
					</select></td>
				</tr>
				<tr>
					<td>Comentarios</td>
						<td><textarea name="comentarios" rows="10" cols="70"></textarea>
					</td>
				</tr>
				<tr>
					<td><input type="submit" name="Enviar" value="Enviar comentario" />
					</td>
				</tr>
			</table>
		</div>

		<div>
			<h4>(*) Datos obligatorios.</h4>
		</div>
	</form>
</div>
<?php
    include_once './estructura/piedepagina.inc.php';
?>	
