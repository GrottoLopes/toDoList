<?php
    include ('aviso.php');
?>

<!DOCTYPE html>

<html language="pt-br">
    <?php
        require('connection.php');
    ?>
    <head>
        <title>Perfil</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=300px, initial-scale=1">
        <meta name="author" content="Gabriel Grotto Lopes">
        <meta name="description" content="Site para criação do trabalho final da matéria Programação WEB referente ao segundo semestre de 2021">
        <meta name="keywords" content="html, css, WEB, trabalho-final, trabalho, unifesp, perfil">
        <meta name="application-name" content="Programacao-WEB">
        <link href='https://fonts.googleapis.com/css?family=Roboto+Mono' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Redressed' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="styles.css">
    </head>
    <body>
        <div id="container-perfil">

            <h3>Bem vindo <?php echo $_SESSION['nome'].' '.$_SESSION['sobrenome'] ?> </h3>
                <div class="sitename">
                    <h2>To Do List</h2>
                </div>

                <div class="menu-principal">
                    <a href="principal.php" class="link">ToDoList</a>
                    <a href="logout.php" class="link">Sair</a>
                </div> 

            <div id="container-form-atualizar">
                
                <div class="h1-perfil"> 
                    <h1>Atualizar senha</h1>
                </div>

                <div class="form-perfil">
                    <form action="# " method="POST">
                        <div class="input-perfil">
                            <input type="password" name="atual" id="atual" placeholder="Senha atual" required>
                        </div>
                        <div class="input-perfil">
                            <input type="password" name="novasenha" id="novasenha" placeholder="Nova senha" required>
                        </div>
                        <div class="input-perfil">
                            <input type="password" name="confirmarsenha" id="confirmarsenha" placeholder="Confirme a nova senha" required>
                        </div>
                        <div class="submit-perfil">
                            <input type="submit" value="Alterar" class="sub-perfil">
                        </div>
                    </form>
                </div>

                <div class="retorno">
                    <?php

                        if (!empty($_POST['atual']) || !empty($_POST['novasenha']) || !empty($_POST['confirmarsenha'])){
                            $atual = md5($_POST['atual']);
                            $novasenha = md5($_POST['novasenha']);
                            $confsenha = md5($_POST['confirmarsenha']);
                            
                            if ($novasenha != $confsenha){
                                echo "As senhas não coincidem.";
                            }else{
                                $psw = $_SESSION['senha'];
                                $email = $_SESSION['email'];
                                if ($psw != $atual){
                                    echo "Senha atual errada.";
                                }else{
                                    $update = $connection->query("UPDATE tuser SET Senha = '$novasenha' WHERE Email = '$email'");

                                    echo "Senha alterada";
                                }
                            }
                        }
                        $connection->close();
                    ?>
                </div>

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