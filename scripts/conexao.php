<?php
    class Conexao { // Instanciando um modelo de Conexão
        // Configurando a classe Conexão com os metódos privados necessários.
        private $host = 'localhost';
        private $dbname = 'db_tarefas';
        private $user = 'root';
        private $password = '';

        public function conectar() { // Criando o metódo publico de conexão.
            try {
                $conexao = new PDO( // Instancia um objeto PDO passando como argumento os metódos privados.
                    "mysql:host=$this->host; dbname=$this->dbname", "$this->user", "$this->password"
                ); 

                return $conexao;

            } catch (PDOException $erro) { // Caso haja algum erro, mostra o erro no navegador.
                echo '<p>'.$erro->getMessage().'</p>';

        }
    }
}


?>
