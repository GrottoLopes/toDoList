<?php
    DEFINE ('HOST', 'localhost');
    DEFINE ('USUARIO', 'root');
    DEFINE ('SENHA', '');
    DEFINE ('DATABASE', 'TrabalhoFinal');

    $connection = new mysqli(HOST, USUARIO, SENHA, DATABASE) OR die ('Não foi possível conectar');
?>