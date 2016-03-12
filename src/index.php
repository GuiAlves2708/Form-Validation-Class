<?php

require './includes/autoload/autoload.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$validate = new FormValidation();
	
	$validate->set($_POST['nome'], 'Nome')->required()
			 ->set($_POST['email'], 'Email')->email()
			 ->set($_POST['tel'], 'Tel')->telephone()
			 ->set($_POST['cell'], 'Cell')->cellphone();
	

	if ($validate->validate()) {
		echo 'Passou';
	} else {
		$error = $validate->getErrors();
		echo $error[0];
	}
}
?>

<form method="post">
	<fieldset>
		<legend>Formulario</legend>
		<label>
			<span>Nome: </span>
			<input type="text" name="nome"  placeholder="required" size="40">
		</label>

		<label>
			<span>Email: </span>
			<input type="text" name="email" placeholder="email@exemple.com" size="40">
		</label>

		<label>
			<span>Tel: </span>
			<input type="text" name="tel" placeholder="000-0000-0000" size="40">
		</label>

		<label>
			<span>Cell: </span>
			<input type="text" name="cell" placeholder="000-00000-0000" size="40">
		</label>

		<input type="submit" value="Enviar">
	</fieldset>
</form>