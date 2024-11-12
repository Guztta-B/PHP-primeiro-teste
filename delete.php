<?php

session_start();

$id = $_GET["id"]; 

foreach ($_SESSION['users'] as $key => $user) {
    if ($user['id'] == $id) {
        unset($_SESSION['users'][$key]); 
        break;
    }
}

header('Location: index.php'); 
exit;