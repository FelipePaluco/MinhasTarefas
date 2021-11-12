<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>MinhasTarefas</title>

		<link rel="stylesheet" href="css/estilo.css">	
		<!-- Bootstrap -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	</head>

	<body>
		<nav class="navbar navbar navbar-dark bg-dark">
			<div class="container">
				<a class="navbar-brand" href="#">
					<img src="img/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
					MinhasTarefas
				</a>
			</div>
		</nav>

		<div class="container app">
		<?php if(isset($_GET['novatarefa']) && $_GET['novatarefa'] == true) { ?>
				<div class="alert alert-success alert-dismissible fade show" role="alert">
  					<strong>Tarefa adicionada com sucesso!</strong><br/>Você pode consulta-la em <strong>Tarefas Pendentes</strong> ou em  <strong>Todas as Tarefas</strong>.
  					<button type="button" class="close" data-dismiss="alert" aria-label="Fechar">
    					<span aria-hidden="true">&times;</span>
  					</button>
				</div>
			<?php } ?>
			<div class="row">
				<div class="col-md-3 menu">
				<ul class="list-group">
						<li class="list-group-item"><a href="index.php"><i class="fas fa-home"></i> Minhas Tarefas</a></li>
						<li class="list-group-item active"><a href="#"><i class="fas fa-plus"></i> Nova Tarefa</a></li>
						<li class="list-group-item"><a href="tarefas_pendentes.php"><i class="fas fa-clock"></i> Tarefas Pendentes</a></li>
						<li class="list-group-item"><a href="tarefas_realizadas.php"><i class="fas fa-check"></i> Tarefas Realizadas</a></li>
					</ul>
				</div>

				<div class="col-md-9">
					<div class="container pagina">
						<div class="row">
							<div class="col">
								<h4>Nova tarefa</h4>
								<hr />
								<form method="post" action="../scripts/tarefa_controller.php?acao=inserir">
									<div class="form-group">
										<label>Descrição da tarefa:</label>
										<input type="text" class="form-control" name="tarefa" placeholder="Exemplo: Lavar o carro">
									</div>

									<button class="btn btn-success">Cadastrar</button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Bootstrap -->
		<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
	</body>
</html>