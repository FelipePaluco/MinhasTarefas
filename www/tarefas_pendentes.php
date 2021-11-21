<?php
	$acao = 'recuperarPendentes';
	require '../scripts/tarefa_controller.php';

	if(!isset($_SESSION['logado']) || $_SESSION['logado'] == false) {
		Header('Location: http://localhost/app_tarefa/www/index.php');
	}
?>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>MinhasTarefas</title>

		<link rel="stylesheet" href="css/estilo.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
		<script>
			
		function editar(id, txtTarefa) {

		// Criar um formulário
		let form = document.createElement('form');
		form.action = "../scripts/tarefa_controller.php?pag=tarefas_pendentes&acao=atualizar";
		form.method = "POST";
		form.className = 'row'

		// Criar um input pra entrada de texto
		let inputTarefa = document.createElement('input');
		inputTarefa.type = "text";
		inputTarefa.name = "tarefa";
		inputTarefa.className = "col-10 form-control mt-4";
		inputTarefa.value = txtTarefa;

		// criar um input hidden para guardar o id da tarefa.
		let inputID = document.createElement('input');
		inputID.type = "hidden";
		inputID.name = "id";
		inputID.value = id;

		// Criar um button para envio do form
		let buttonTarefa = document.createElement('button');
		buttonTarefa.type = "submit";
		buttonTarefa.className = "col-2 btn btn-info mt-4";
		buttonTarefa.innerHTML = "Editar"



		//Incluir inputTarefa no form
		form.appendChild(inputTarefa);

		//Incluir inputTarefa no form
		form.appendChild(inputID);

		//Incluir butonTarefa no form
		form.appendChild(buttonTarefa);

		//selecionar a div tarefa
		let tarefa = document.getElementById('tarefa_'+id);
		tarefa.innerHTML = "";

		tarefa.insertBefore(form, tarefa[0])

	}

	function remover(id) {
		location.href =  '../scripts/tarefa_controller.php?acao=remover&id='+id;
	}

	function marcarRealizada(id) {
		location.href =  '../scripts/tarefa_controller.php?pag=tarefas_pendentes&acao=marcarRealizada&id='+id;
	}
	</script>
	</head>

	<body class="bg-light">
		<nav class="navbar navbar navbar-dark bg-dark">
			<div class="container">
				<a class="navbar-brand" href="#">
					<img src="img/logo.png" width="150" height="45" class="d-inline-block align-top" alt="">
				</a>
				<div class="navbar nav">
					<ul class="nav">
						<li class="nav-item"><a href="../scripts/login_controller.php?logout=true" class="text-white"><i class="fas fa-sign-out-alt"></i> Sair</li></a>
					</ul>
				</div>
			</div>
		</nav>

		
		<div class="container app">
			<?php if(isset($_GET['editado']) && $_GET['editado'] == 'true') { ?>
				<div class="alert alert-success alert-dismissible fade show" role="alert">
					<strong>Tarefa editada com sucesso!</strong>
						<button type="button" class="close" data-dismiss="alert" aria-label="Fechar">
							<span aria-hidden="true">&times;</span>
						</button>
				</div>
			<?php } if(isset($_GET['removido']) && $_GET['removido'] == 'true') {?>
				<div class="alert alert-success alert-dismissible fade show" role="alert">
					<strong>Sua tarefa foi excluida com sucesso.</strong>.
						<button type="button" class="close" data-dismiss="alert" aria-label="Fechar">
							<span aria-hidden="true">&times;</span>
						</button>
				</div>
			<?php } ?>
			<div class="row">
				<div class="col-md-3 menu">
				<ul class="list-group shadow">
						<li class="list-group-item"><a href="dashboard.php"><i class="fas fa-home"></i> Minhas Tarefas</a></li>
						<li class="list-group-item"><a href="nova_tarefa.php"><i class="fas fa-plus"></i> Nova Tarefa</a></li>
						<li class="list-group-item active"><a href="#"><i class="fas fa-clock"></i> Tarefas Pendentes</a></li>
						<li class="list-group-item"><a href="tarefas_realizadas.php"><i class="fas fa-check"></i> Tarefas Realizadas</a></li>
					</ul>
				</div>

				<div class="col-md-9">
					<div class="container pagina shadow">
					<div class="row">
							<div class="col">
								<h4>Tarefas Pendentes</h4>
								<hr />
								<?php foreach($tarefas as $indice => $tarefa) { ?>
								<div class="row mb-3 d-flex align-items-center tarefa">
									<div class="col-md-9" id="tarefa_<?= $tarefa->id; ?>">
										<?= $tarefa->tarefa; ?> - <strong class="text-warning">(pendente)</strong>
									</div>
									<div class="col-sm-3 mt-2 d-flex justify-content-between">
										<i class="fas fa-trash-alt fa-lg text-danger" style="cursor: pointer;" onclick="remover(<?= $tarefa->id?>);"></i>
										<i class="fas fa-edit fa-lg text-info" style="cursor: pointer;" onclick="editar(<?= $tarefa->id?> , '<?= $tarefa->tarefa ?>');"></i>
										<i class="fas fa-check fa-lg text-success" style="cursor: pointer;" onclick="marcarRealizada(<?= $tarefa->id?>);"></i>
									</div>
								</div>
								<hr/>
								<?php } ?>
								<?php if($tarefas == null) {?>
									<p class="text-muted">Você não tem nenhuma tarefa pendente no momento.</p>
								<?php }?>
							</div>
					</div>
				</div>
				</div>
			</div>
		</div>
		<footer class="footer">
		<div class="container">
			<div class="row">
					<div class="col-md-11">
						<p class="text-muted mt-3">Desenvolvido por Felipe Paluco.</p>
					</div>
					<div class="col-md-1 mt-4 d-flex justify-content-between">
						<a href="https://github.com/FelipePaluco" class="text-muted "><i class="fab fa-github fa-md"></i></a>
						<a href="https://linkedin.com/in/felipepaluco/" class="text-muted"><i class="fab fa-linkedin fa-md"></i></a>
					</div>
				</div>
			</div>
		</footer>
		<!-- Bootstrap -->
		<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
	</body>
</html>
