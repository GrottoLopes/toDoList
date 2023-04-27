<!DOCTYPE html>

<html language="pt-br">
    <?php
        require('connection.php');
    ?>
    <head>
        <title>Login</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=300px, initial-scale=1">
        <meta name="author" content="Gabriel Grotto Lopes">
        <meta name="description" content="Site para criação do trabalho final da matéria Programação WEB referente ao segundo semestre de 2021">
        <meta name="keywords" content="html, css, WEB, trabalho-final, trabalho, unifesp, login">
        <meta name="application-name" content="Programacao-WEB">
        <link href='https://fonts.googleapis.com/css?family=Roboto+Mono' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="styles.css">
    </head>
    <body>
        <div id="container-login">
            <div id="container-form">
                
                <div class="h1-login"> 
                    <h1>Acesso</h1>
                </div>

                <div class="form-login">
                    <form action="# " method="POST">
                        <div class="input-login">
                            <input type="text" name="login" id="login" placeholder="Login" required>
                        </div>
                        <div class="input-login">
                            <input type="password" name="senha" id="senha" placeholder="Senha" required>
                        </div>
                        <div class="submit-login">
                            <input type="submit" value="Entrar" class="sub-login">
                        </div>
                    </form>
                </div>
            
                <div class="create">
                    <a href="create.php" class="a-login">Criar cadastro</a>
                </div>

                <div class="return">
                <?php
                    if (!empty($_POST['login']) || !empty($_POST['senha'])){
                        $email = $_POST['login'];
                        $psw = md5($_POST['senha']);
                        $quantidade = 0;

                        $consulta = $connection->query("SELECT * FROM tuser WHERE Email = '$email' AND Senha = '$psw'")
                        OR DIE ("Falha ao executar query ".mysqli_error($connection));
                        
                        $quantidade = $consulta->num_rows;
                        
                        if($quantidade == 1){ 
                            
                            $user = $consulta->fetch_assoc();
                            if(!isset($_SESSION)) {
                                session_start();
                            }
                
                            $_SESSION['iduser'] = $user['idUser'];
                            $_SESSION['nome'] = $user['Nome'];
                            $_SESSION['sobrenome'] = $user['Sobrenome'];
                            $_SESSION['email'] = $user['Email'];
                            $_SESSION['telefone'] = $user['Telefone'];
                            $_SESSION['senha'] = $user['Senha'];
                
                            header("Location: principal.php");
                        
                        }else {
                            echo 'E-mail ou senha inválidos.';
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