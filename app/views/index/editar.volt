<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<br/>

	<h2>Page atualizar!</h2>

	<br/>

	{% for user in usuario %}

	<?php echo $this->tag->form("index/atualizar"); ?>
		<!--<label for="nome">ID: </label>-->
		<input type="hidden" name="idUser" value="{{user.id}}" >
		<input type="hidden" name="passwordUser" value="{{user.password}}" >
		<br/>

		<label for="nome">Nome: </label>
		<input type="" name="nomeUser" value="{{user.nome}}" style="width: 300px;">
		<br/>

		<label for="nome">Email: </label>
		<input type="" name="emailUser" value="{{user.email}}" style="width: 305px;">
		<br/>	

		<input type="submit" value="Atualizar">


	{% endfor%}

</body>
</html>