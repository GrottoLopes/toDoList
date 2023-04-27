<?php
    include ('aviso.php');
?>

<!DOCTYPE html>

<html language="pt-br">
    <?php
        require('connection.php');
    ?>
    <head>
        <title>To Do List</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=300px, initial-scale=1">
        <meta name="author" content="Gabriel Grotto Lopes">
        <meta name="description" content="Site para criação do trabalho final da matéria Programação WEB referente ao segundo semestre de 2021">
        <meta name="keywords" content="html, css, WEB, trabalho-final, trabalho, unifesp, página_principal">
        <meta name="application-name" content="Programacao-WEB">
        <link href='https://fonts.googleapis.com/css?family=Roboto+Mono' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Redressed' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="styles.css">
    </head>
    <body>
        <div id="container-principal">
                <h3>Bem vindo <?php echo $_SESSION['nome'].' '.$_SESSION['sobrenome'] ?> </h3>
            <div class="sitename">
                <h2>To Do List</h2>
            </div>

            <div class="menu-principal">
                <a href="atualizar.php" class="link">Conta</a>
                <a href="logout.php" class="link">Sair</a>
            </div> 

            <div id="container-forms">
                <form action="#" method="POST">
                    <input type="text" name="tarefa" id="input-tarefa" placeholder="Nova Tarefa", required>
                    <button name="submit" class="sub-tarefa"><b>Adicionar Tarefa</b></button>
                </form>

                <?php

                    $email = $_SESSION['email'];
                    
                    if(isset($_POST['submit'])){
                        $tarefa = $_POST['tarefa'];

                        $insert = $connection->query("INSERT INTO `ttasks`(`Tarefa`, `Owner`) VALUES ('$tarefa', '$email')");
                    }
                ?>

            </div>

            <div id="exibicao">
                <?php

                    $consulta = $connection->query("SELECT * FROM ttasks WHERE Owner = '$email'");

                    $quantidade = $consulta->num_rows;

                    if($quantidade > 0){
                        while ($row = $consulta->fetch_array()){
                            echo '<div class="line">';
                            echo '<p class="task">'.$row['Tarefa'].'</p>'; /* TAREFAS --> */
                            ?>
                            <a href="principal.php?del_task=<?PHP ECHO $row['IdTask'];?>"><buttom class="delete" name="deletar">x</buttom></a><br>';<?php /*<!-- EXCLUIR -->*/
                            echo '</div>';
                        }
                    }

                    if(isset($_GET['del_task'])){
                        $id = $_GET['del_task'];
                        $del = $connection->query("DELETE FROM ttasks WHERE IdTask = $id");
                        header("Location: principal.php");
                    }

                $connection->close();
                ?>
            </div>
        
        </div>
    </body>
    <footer>
        <div class="footer">
            <div class="name-footer">
                <a href="https://www.linkedin.com/in/gabriel-grotto-lopes-1631aa165/" class="a-footer">GABRIEL GROTTO LOPES</a>
            </div>
            <div class="university-footer">
                <a href="https://www.unifesp.br/campus/sjc/" class="a-footer">UNIFESP - Universidade Federal de São Paulo</a>
            </div>
            <div class="email-footer">
            <a href="mailto:grotto.lopes@unifesp.br" class="a-footer">grotto.lopes@unifesp.br</a>
            </div>
        </div>
    </footer>
</html>