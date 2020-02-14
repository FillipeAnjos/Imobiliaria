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
	<h4>Site - Imobiliária</h4>
</center>

<center>
	{{ flashSession.output() }}
</center>
<br/>

	<div class="container">
	  <div class="row">
	    <div class="col-sm">
	      <!--One of three columns-->
	    </div>
	    <div class="col-sm">
	      
			<a href="/" title="Voltar a página inicial"><i>Home Page</i></a>
	    	<div id="caixa">


	    		<center>
					<h5>Tela de cadastro</h5>
				</center>

				<?php echo $this->tag->form('index/createAccount'); ?>

				<label>Nome: </label>
				<input type="text" name="nome" class="form-control" placeholder="Jose João">
				<h1> </h1>

				<label>Email: </label>
				<input type="text" name="email" class="form-control" placeholder="jose@hotmail.com">
				<h1> </h1>

				<label>Senha: </label>
				<input type="password" name="password" class="form-control" placeholder="Senha.">
				<h1> </h1>

				<label>Confirmar Senha: </label>
				<input type="password" name="confirmPassword" class="form-control" placeholder="Confirmar Senha.">

				<?php echo $this->tag->submitButton(['Cadastrar', 'class' => 'btn btn-primary btn-sm', 'id' => 'botao', 'title' => 'Confirmar cadastro?!']); ?>
				
			</div>	


	    </div>
	    <div class="col-sm">
	      <!--One of three columns-->
	    </div>
	  </div>
	</div>

</body>
</html>