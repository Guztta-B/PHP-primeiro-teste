<?php 

session_start();


$id = $_GET['id'];

foreach ($_SESSION['users'] as $key => $user) { 
    if ($user['id'] == $id) {
        $currentUser = &$user;
        break; 
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {


    foreach ($_SESSION['users'] as $key => $user){
        if ($user['id'] == $id) { 
            $_SESSION['users'][$key]['nome'] = $_POST['nome'];
            $_SESSION['users'][$key]['email'] = $_POST['email'];

            header(header: 'location: index.php');
            exit;
        }
        
    }

   
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuario</title>
    <link rel="stylesheet" href="css.css"> 
</head>
<body>
    <h1>Editar usuario</h1>

    <form action="edit.php?id=<?php echo $id ?>" method="post">
        <label for="nome">Nome: </label>
        <input type="text" name="nome" id="nome" required
               value="<?php echo htmlspecialchars($currentUser['nome']); ?>">

        <label for="email">Email: </label>
        <input type="email" name="email" id="email" required
               value="<?php echo htmlspecialchars($currentUser['email']); ?>">
        <br>
        <input type="submit" value="Editar usuario">
    </form>
</body>
</html>