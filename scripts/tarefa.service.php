<?php
session_start();
if(!isset($_SESSION['logado']) || $_SESSION['logado'] == false) {
	Header('Location: http://localhost/app_tarefa/www/index.php');
}
//CRUD
class TarefaService {

	private $conexao;
	private $tarefa;

	public function __construct(Conexao $conexao, Tarefa $tarefa) {
		$this->conexao = $conexao->conectar();
		$this->tarefa = $tarefa;
	}

	public function inserir() { //Create
		$query = 'insert into tb_tarefas(id_usuario, tarefa)values(?, ?)';
		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(1, $this->tarefa->__get('id_usuario'));
		$stmt->bindValue(2, $this->tarefa->__get('tarefa'));
		$stmt->execute();
	}

	public function recuperar($tipo) { //Read
		
		if($tipo == 'todos') {
			$query = 'select t.id_usuario, t.id, s.status, t.tarefa from tb_tarefas as t left join tb_status as s on (t.id_status = s.id) WHERE t.id_usuario = '.$_SESSION['idUsuario'];
			$stmt = $this->conexao->prepare($query);
			$stmt->execute();
			return $stmt->fetchAll(PDO::FETCH_OBJ);


		} else if($tipo == 'pendentes') {
			$query = 'select * from tb_tarefas where id_status = 1 and id_usuario = '.$_SESSION['idUsuario'];
			$stmt = $this->conexao->prepare($query);
			$stmt->execute();
			return $stmt->fetchAll(PDO::FETCH_OBJ);
		}
		else if($tipo == 'realizadas') {
			$query = 'select * from tb_tarefas where id_status = 2 and id_usuario = '.$_SESSION['idUsuario'];
			$stmt = $this->conexao->prepare($query);
			$stmt->execute();
			return $stmt->fetchAll(PDO::FETCH_OBJ);
		}
	}


	public function atualizar() { //Update
		$query = 'update tb_tarefas set tarefa = ? where id = ?';
		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(1, $this->tarefa->__get('tarefa'));
		$stmt->bindValue(2, $this->tarefa->__get('id'));
		return $stmt->execute();
	}

	
	public function marcarAtualizada() { //Update
		$query = 'update tb_tarefas set id_status = ? where id = ?';
		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(1, $this->tarefa->__get('id_status'));
		$stmt->bindValue(2, $this->tarefa->__get('id'));
		return $stmt->execute();
	}

	public function marcarPendente() { //Update
		$query = 'update tb_tarefas set id_status = ? where id = ?';
		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(1, $this->tarefa->__get('id_status'));
		$stmt->bindValue(2, $this->tarefa->__get('id'));
		return $stmt->execute();
	}

	public function remover() { //Delete
		$query = 'delete from tb_tarefas where id = ?';
		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(1, $this->tarefa->__get('id'));
		$stmt->execute();
	}
}

?>
