<!--
<div class="page-header">
    <h1>Congratulations!</h1>
</div>

<p>You're now flying with Phalcon. Great things are about to happen!</p>

<p>This page is located at <code>views/index/index.phtml</code></p>
-->

<!DOCTYPE html>
<html>
<head>
	<title></title>

	<style type="text/css">
		
		#caixa{
			width: 400px; 
			background-color: #E6E6E6;
			padding: 20px;
			border-radius: 5px;
		}
		#botao{
			margin-top: 20px;
		}

	</style>
</head>
<body>

	<!--<img src="img/phalcon.png">-->

<br/>

<center>
	<h4>Bem vindo(a) ao site - Imobiliária</h4>
</center>

<center>
	<?= $this->flashSession->output() ?>
</center>
<br/>
<?php 
	/*
	echo "Nome: <b>".$this->session->get('AUTH_NOME')."</b>";
	echo "<br/>";
	echo "Email: <b>".$this->session->get('AUTH_EMAIL')."</b>";
	echo "<br/>";
	echo "Senha: <b>".$this->session->get('AUTH_PASSWORD')."</b>";
	*/
?>

<div class="container">
  <div class="row">
    <div class="col-sm">
      <!--One of three columns-->
    </div>
    <div class="col-sm">
      

    	<div id="caixa">
    		<center>
				<h5>Login</h5>
			</center>

			<?php echo $this->tag->form('index/login'); ?>

			<label>Email: </label>
			<input type="text" name="email" class="form-control" placeholder="jose@hotmail.com">
			
			<h1> </h1>

			<label>Senha: </label>
			<input type="password" name="password" class="form-control" placeholder="Sua senha.">

			<?php echo $this->tag->submitButton(['Logar', 'class' => 'btn btn-primary btn-sm', 'id' => 'botao', 'title' => 'Logue aqui!']); ?>
			&nbsp;

			<a href="index/create" class="btn btn-light btn-sm" id="botao" title="Cadastre-se para ter acesso ao nosso painel!">Cadastrar-se</a>

		</div>	

    </div>
    <div class="col-sm">
      <!--One of three columns-->
    </div>
  </div>
</div>

</body>
</html>







