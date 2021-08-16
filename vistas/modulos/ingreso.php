<h2 class="name-section">INGRESAR</h2>

<form class="form-login" method="post" action="">

	<input type="text" placeholder="Usuario" name="usuarioI" required>

	<input type="password" placeholder="Contraseña" name="claveI" required>

	<input type="submit" value="Ingresar">

</form>

<?php

$ingreso = new LoginC();
$ingreso ->  IngresoC();

?>