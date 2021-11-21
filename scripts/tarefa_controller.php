<?php
    //Controlador da Tarefa, será acionado toda vez que precisar ser feito alguma alteração na tarefa.
    require "conexao.php";
    require "tarefa.service.php";
    require "tarefa.model.php";
    

    $acao = isset($_GET['acao']) ? $_GET['acao'] : $acao;

    if($acao == 'inserir') { // Verifica se o valor passado pelo método GET é de inserir.
        if(empty($_POST['tarefa']) || $_POST['tarefa'] == '') 
        { 
            Header('Location: http://localhost/app_tarefa/www/nova_tarefa.php?novatarefa');
        } else {       
            $tarefa = new Tarefa();
            $tarefa->__set('tarefa', $_POST['tarefa']);
            $tarefa->__set('id_usuario', $_SESSION['idUsuario']);


            $conexao = new Conexao();
            $tarefaService = new TarefaService($conexao, $tarefa);
            $tarefaService->inserir();

                Header('Location: http://localhost/app_tarefa/www/nova_tarefa.php?novatarefa=true');
        }

    } else if($acao == 'recuperar') { // verifica se acao é uma variavel, se for e tiver o valor igual a de 'recuperar'..
        $tarefa = new Tarefa();
        $conexao = new Conexao();
        $tarefaService = new TarefaService($conexao, $tarefa);
        $tarefas = $tarefaService->recuperar('todos');
        
    } else if($acao == 'recuperarPendentes') { // verifica se acao é uma variavel, se for e tiver o valor igual a de 'recuperar'..
        $tarefa = new Tarefa();
        $conexao = new Conexao();
        $tarefaService = new TarefaService($conexao, $tarefa);
        $tarefas = $tarefaService->recuperar('pendentes');
    }   else if($acao == 'recuperarRealizadas') { // verifica se acao é uma variavel, se for e tiver o valor igual a de 'recuperar'..       
        $tarefa = new Tarefa();
        $conexao = new Conexao();
        $tarefaService = new TarefaService($conexao, $tarefa);
        $tarefas = $tarefaService->recuperar('realizadas');
    } else if($acao == 'atualizar') {

        $tarefa = new Tarefa();
        $tarefa->__set('id', $_POST['id']);
        $tarefa->__set('tarefa', $_POST['tarefa']);

        $conexao = new Conexao();
        $tarefaService = new TarefaService($conexao, $tarefa);
        if($tarefaService->atualizar()) {
            if(isset($_GET['pag']) && $_GET['pag'] == 'dashboard') {
                Header('Location: http://localhost/app_tarefa/www/dashboard.php?editado=true');
            } else if(isset($_GET['pag']) && $_GET['pag'] == 'tarefas_pendentes') {
                Header('Location: http://localhost/app_tarefa/www/tarefas_pendentes.php?editado=true');
            } else if(isset($_GET['pag']) && $_GET['pag'] == 'tarefas_realizadas') {
                Header('Location: http://localhost/app_tarefa/www/tarefas_realizadas.php?editado=true');
            } 
        } 

    } else if($acao == 'remover') {
        $tarefa = new Tarefa();
        $tarefa->__set('id', $_GET['id']);

        $conexao = new Conexao();
        $tarefaService = new TarefaService($conexao, $tarefa);
        $tarefaService->remover();
        if(isset($_GET['pag']) && $_GET['pag'] == 'dashboard') {
            Header('Location: http://localhost/app_tarefa/www/dashboard.php?removido=true');
        } else {
            Header('Location: http://localhost/app_tarefa/www/tarefas_pendentes.php?removido=true');
        }

    } else if($acao == 'marcarRealizada') {
        $tarefa = new Tarefa();

        $tarefa->__set('id', $_GET['id']);
        $tarefa->__set('id_status', 2);

        $conexao = new Conexao();

        $tarefaService = new TarefaService($conexao, $tarefa);
        $tarefaService->marcarAtualizada();
        if(isset($_GET['pag']) && $_GET['pag'] == 'dashboard') {
            Header('Location: http://localhost/app_tarefa/www/dashboard.php');
        } else {
            Header('Location: http://localhost/app_tarefa/www/tarefas_pendentes.php');
        }
    }
    else if($acao == 'marcarPendente') {
        $tarefa = new Tarefa();

        $tarefa->__set('id', $_GET['id']);
        $tarefa->__set('id_status', 1);

        $conexao = new Conexao();

        $tarefaService = new TarefaService($conexao, $tarefa);
        $tarefaService->marcarPendente();
        if(isset($_GET['pag']) && $_GET['pag'] == 'dashboard') {
            Header('Location: http://localhost/app_tarefa/www/dashboard.php');
        } else if(isset($_GET['pag']) && $_GET['pag'] == 'tarefas_pendentes') {
            Header('Location: http://localhost/app_tarefa/www/tarefas_pendentes.php');
        }
        else if(isset($_GET['pag']) && $_GET['pag'] == 'tarefas_realizadas') {
            Header('Location: http://localhost/app_tarefa/www/tarefas_realizadas.php');
        }
    }
    
?>
