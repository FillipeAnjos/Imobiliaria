<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<center>
		<?= $this->flashSession->output() ?>
	</center>
	
	<center>
		<p>Olá <b><?php echo $this->session->get('AUTH_NOME'); ?></b></p>

		<a href="logout">Deslogar?</a>
	</center>

</body>
</html>