<!DOCTYPE html>
<html>
    <?php
        require ('connection.php');
    ?>

    <head>
        <title>Create Account</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=300px, initial-scale=1">
        <meta name="author" content="Gabriel Grotto Lopes">
        <meta name="description" content="Site para criação do trabalho final da matéria Programação WEB referente ao segundo semestre de 2021">
        <meta name="keywords" content="html, css, WEB, trabalho-final, trabalho, unifesp, create-account">
        <meta name="application-name" content="Programacao-WEB">
        <link href='https://fonts.googleapis.com/css?family=Roboto+Mono' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="./styles.css">
    </head>
    <body>
        <div id="container-create">
            <div id="container-form">
               
                <div class="h1-create">
                    <a href="login.php">
                        <img src="./Imagens/back.png" alt="Voltar" class="btmvoltar">
                    </a>
                    <h1>Criar Acesso</h1>
                </div>

                <div class="form-create">
                    <form action="#" method="POST">
                        <div class="input-create">
                            <input type="text" name="Nome" id="create" placeholder="Nome" required>
                        </div>
                        <div class="input-create">
                            <input type="text" name="Lastname", id="create" placeholder="Sobrenome" required>
                        </div>
                        <div class="input-create">
                            <input type="e-mail" name="e-mail" id="create" placeholder="E-mail" required>
                        </div>
                        <div class="input-create">
                            <input type="tel" name="telefone" pattern="[0-9]{11}" id="create" placeholder="DDDTelefone" required>
                        </div>
                        <div class="input-create">
                            <input type="password" name="senha" id="create" placeholder="Senha" required>
                        </div>
                        <div class="submit-create">
                            <input type="submit" value="Criar" class="sub-create">
                        </div>
                    </form>
                </div>
            </div>
            <div class="return-create">

            
        <!-- *****************************    PHP     **************************-->
            
            <?php
                if (!empty($_POST['Nome']) || !empty($_POST['Senha']) || !empty($_POST['e-mail']) || !empty($_POST['telefone']) || !empty($_POST['Lastname'])){
                    $email = $_POST['e-mail'];
                    $nome = $_POST['Nome'];
                    $sobrenome = $_POST['Lastname'];
                    $telefone = $_POST['telefone'];
                    $senha = md5($_POST['senha']);

                    $stmt = "SELECT * FROM tuser WHERE email = '$email'";
                    $result = $connection->query($stmt) or die($connection->error);
                    
                    if (mysqli_num_rows ($result) == 0){
                        $stmt = $connection->prepare("INSERT INTO tuser (Nome, Sobrenome, Telefone, Email, Senha) VALUES (?,?,?,?,?)");
                        $stmt->bind_param('ssiss', $nome, $sobrenome, $telefone, $email, $senha);
                        
                        if ($stmt->execute()){
                            header('Location: login.php');
                        }else{
                            echo "erro ao inserir ERRO: " .$stmt->error;
                        }
                    }else {
                        echo "E-mail já cadastrado";
                    }
                    $connection->close();
                }

                ?>

            </div>
        </div>  
    </body>
    <footer>
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