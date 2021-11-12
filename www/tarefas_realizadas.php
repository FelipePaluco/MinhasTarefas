<?php
	$acao = 'recuperarRealizadas';
	require '../scripts/tarefa_controller.php';
?>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>MinhasTarefas</title>

		<link rel="stylesheet" href="css/estilo.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	</head>

	<body>
		<nav class="navbar navbar navbar-dark bg-dark">
			<div class="container ">
				<a class="navbar-brand" href="#">
					<img src="img/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
					MinhasTarefas
				</a>
			</div>
		</nav>

		
		<div class="container app s">
			<div class="row">
				<div class="col-md-3 menu">
				<ul class="list-group">
						<li class="list-group-item"><a href="index.php"><i class="fas fa-home"></i> Minhas Tarefas</a></li>
						<li class="list-group-item"><a href="nova_tarefa.php"><i class="fas fa-plus"></i> Nova Tarefa</a></li>
						<li class="list-group-item"><a href="tarefas_pendentes.php"><i class="fas fa-clock"></i> Tarefas Pendentes</a></li>
						<li class="list-group-item active"><a href="#"><i class="fas fa-check"></i> Tarefas Realizadas</a></li>
					</ul>
				</div>

				<div class="col-md-9">
					<div class="container pagina">
					<div class="row">
							<div class="col">
								<h4>Tarefas Realizadas</h4>
								<hr />
								<?php foreach($tarefas as $indice => $tarefa) { ?>
								<div class="row mb-3 d-flex align-items-center tarefa">
									<div class="col" id="tarefa_<?= $tarefa->id; ?>">
										<?= $tarefa->tarefa; ?> - <strong class="text-success">(realizado)</strong>
									</div>
								</div>
								<hr/>
								<?php } ?>
							</div>
					</div>
				</div>
				</div>
			</div>
		</div>
	</body>
</html>