<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		#table{
			margin-top: -100px;
		}
		#rowTitle{
			font-size: 20px;
		}
	</style>
</head>
<body>

	<center>
		{{ flashSession.output() }}
	</center>
	
	<center>
		<br/>

			<p>Seja bem vindo(a): <b><?php echo $this->session->get('AUTH_NOME'); ?>!</b></p>
			<span class="dropdown">
			  <button class="btn btn-primary btn-sm dropdown-toggle" style="margin-bottom: 10px;" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			    Menu
			  </button>
			  <span class="dropdown-menu" aria-labelledby="dropdownMenuButton">
			    <a class="dropdown-item" href="editar/<?php echo $this->session->get('AUTH_ID'); ?>" title="Alterar seus dados?!">Editar?</a>
			    <a class="dropdown-item" href="logout" title="Deseja Sair!">Deslogar?</a>
			  </span>
			</span>

		<h5>Abaixo se encontra o quadro de imovéis disponiveis em nosso site, com suas respectivas imobiliárias!</h5>

		<table class="table table-striped" id="table">
		  <thead>
		    <tr>
		      <td scope="col" id="rowTitle">Tipo</td>
		      <td scope="col" id="rowTitle">Descrição</td>
		      <td scope="col" id="rowTitle">Bairro</td>
		      <td scope="col" id="rowTitle">Localização</td>
		      <td scope="col" id="rowTitle">Valor</td>
		      <td scope="col" id="rowTitle">Imobiliária</td>
		      <td scope="col" id="rowTitle">Cidade</td>
		      <td scope="col" id="rowTitle">Email</td>
		    </tr>
		  </thead>
		  <tbody>
		  	<?php 
		  		$soma = 0;
		  	?>
		  	{% for imovel in imoveis %}
				<tr>
			      <td>{{ imovel.tipoImovel }}</td>
			      <td>

			      	<p>
				  	  <a class="btn btn-success btn-sm" data-toggle="collapse" href="#collapseExample<?php echo $soma; ?>" role="button" aria-expanded="false" aria-controls="collapseExample<?php echo $soma; ?>">
					    Detalhes
					  </a>
					</p>
					<div class="collapse" id="collapseExample<?php echo $soma; ?>">
					  <div class="card card-body">
					    {{ imovel.descricao }}
					  </div>
					</div>

			      </td>
			      <td>{{ imovel.bairro }}</td>
			      <td>{{ imovel.localizacao }}</td>
			      <td><i><b>{{ imovel.valor }}</b><i></td>
			      <td>{{ imovel.nome }}</td>
			      <td>{{ imovel.cidade }}</td>
			      <td>{{ imovel.email }}</td>
			    </tr>
				<br/>
				<?php 
					$soma++;
				?>
			{% endfor %}
		    
		  </tbody>
		</table>

	</center>

</body>
</html>