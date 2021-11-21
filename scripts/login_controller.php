<?php
    session_start();
    $_SESSION['logado'] = false;

    if(isset($_SESSION['logado']) && $_SESSION['logado'] == true) return Header("Location: http://localhost/app_tarefa/www/dashboard.php");

    if(isset($_GET['logout']) && $_GET['logout'] == true) {
        session_unset();
        session_destroy();
        Header("Location: http://localhost/app_tarefa/www/index.php");
    } 

    try {
        $conexao = new PDO("mysql:host=localhost; dbname=db_tarefas", "root", "");
        $query = "SELECT * FROM tb_usuarios WHERE EMAIL = '".$_POST['userLogin']."' AND SENHA = '".$_POST['userPassword']."'";
        
        $stmt = $conexao->prepare($query);
        $stmt->execute();

        if($stmt->rowCount() == 1) {
            $fetch = $stmt->fetch(PDO::FETCH_ASSOC);
            $_SESSION['idUsuario'] = $fetch['ID'];
            $_SESSION['logado'] = true;
            Header("Location: http://localhost/app_tarefa/www/dashboard.php");
            
        } else {
            echo("Nenhum usuário encontrado.");
        }


    } catch (PDOException $erro) {
        echo '<p>'.$erro->getMessage().'</p>';
    }

?>
