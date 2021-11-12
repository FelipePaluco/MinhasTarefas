<?php

class Tarefa { // Criando o modelo de uma tarefa.
    private $id;
    private $id_status;
    private $tarefa;
    private $data_cadastro;

    public function __get($atributo) { // Criando metódos mágicos Getter e Setter (para lidar com os atributos privados)
        return $this->$atributo;
    }

    public function __set($atributo, $valor) {
        $this->$atributo = $valor;
    }
}


?>