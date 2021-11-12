<?php
	$acao = 'recuperar'; // define a açao como recuperar.
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
	<script>
	function editar(id, txtTarefa) {

		// Criar um formulário
		let form = document.createElement('form');
		form.action = "index.php?pag=index&acao=atualizar";
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
		location.href =  '../scripts/tarefa_controller.php?pag=index&acao=remover&id='+id;
	}

	function marcarRealizada(id) {
		location.href =  '../scripts/tarefa_controller.php?pag=index&acao=marcarRealizada&id='+id;
	}
	</script>
	</head>

	<body>
		<nav class="navbar navbar-dark bg-dark">
			<div class="container">
				<a class="navbar-brand" href="#">
					<img src="img/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
					MinhasTarefas
				</a>
			</div>
		</nav>

		<div class="container app ">
		<?php if(isset($_GET['editado']) && $_GET['editado'] == 'true') { ?>
			<div class="alert alert-success alert-dismissible fade show" role="alert">
  				<strong>Tarefa editada com sucesso!</strong>
  					<button type="button" class="close" data-dismiss="alert" aria-label="Fechar">
    					<span aria-hidden="true">&times;</span>
  					</button>
			</div>
		<?php } if(isset($_GET['editado']) && $_GET['editado'] == 'false') { ?>
			<div class="alert alert-danger alert-dismissible fade show" role="alert">
  				<strong>Oops! Parece que algo deu errado. Informe ao administrador do sistema.</strong>.
  					<button type="button" class="close" data-dismiss="alert" aria-label="Fechar">
    					<span aria-hidden="true">&times;</span>
  					</button>
			</div>
		<?php } if(isset($_GET['removido']) && $_GET['removido'] == 'true') {?>
			<div class="alert alert-success alert-dismissible fade show" role="alert">
  				<strong>Sua tarefa foi excluida com sucesso.</strong>
  					<button type="button" class="close" data-dismiss="alert" aria-label="Fechar">
    					<span aria-hidden="true">&times;</span>
  					</button>
			</div>
		<?php } ?>

		<div class="row">
			<div class="col-sm-3 menu">
				<ul class="list-group">
					<li class="list-group-item active"><a href="#"><i class="fas fa-home"></i> Minhas Tarefas</a></li>
					<li class="list-group-item"><a href="nova_tarefa.php"><i class="fas fa-plus"></i> Nova Tarefa</a></li>
					<li class="list-group-item"><a href="tarefas_pendentes.php"><i class="fas fa-clock"></i> Tarefas Pendentes</a></li>
					<li class="list-group-item"><a href="tarefas_pendentes.php"><i class="fas fa-check"></i> Tarefas Realizadas</a></li>
				</ul>
			</div>
			<div class="col-sm-9">
				<div class="container pagina">
					<div class="row">
						<div class="col">
							<h4>Minhas Tarefas</h4>
							<hr />
							<?php 
								foreach($tarefas as $indice => $tarefa) { ?>
								<div class="row mb-3 d-flex align-items-center tarefa">
									<div class="col-sm-9" id="tarefa_<?= $tarefa->id; ?>">
										<?= $tarefa->tarefa; ?> - 
											<?php if($tarefa->status == 'pendente') { ?><strong class="text-warning">(<?=$tarefa->status; ?>) </strong><?php } ?>
											<?php if($tarefa->status == 'realizado') { ?><strong class="text-success">(<?=$tarefa->status; ?>) </strong><?php } ?>
									</div>
									<div class="col-sm-3 mt-2 d-flex justify-content-between">
										<i class="fas fa-trash-alt fa-lg text-danger" style="cursor: pointer;" onclick="remover(<?= $tarefa->id?>);"></i>
											<?php if($tarefa->status == 'pendente') { ?>
												<i class="fas fa-edit fa-lg text-info" style="cursor: pointer;" onclick="editar(<?= $tarefa->id?> , '<?= $tarefa->tarefa ?>');"></i>
												<i class="fas fa-check fa-lg text-success" style="cursor: pointer;" onclick="marcarRealizada(<?= $tarefa->id?>);"></i>
											<?php } ?>
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
		<!-- Bootstrap -->
		<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
	</body>
</html>