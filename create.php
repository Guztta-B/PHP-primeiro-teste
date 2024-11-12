<?php 
session_start();
//pegar dados do formulario
$nome = $_POST['nome'];
$email = $_POST['email'];

$id = gerarId();

$_SESSION['users'][] = [ 
    'id' => $id,
    'nome' => $nome,
    'email' => $email,
];

function gerarId() { 
    if(empty($_SESSION['users'])){ 
        return 1;
    } else{ 
        $ultimoUsuarioCadastrado = end($_SESSION['users']); 
        return $ultimoUsuarioCadastrado['id'] + 1;
    }
}

header('location: index.php'); 
exit;