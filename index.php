<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css.css">
    <title>Introdução ao PHP </title>
</head>
<body>
    <h1>Introdução ao PHP com CRUD.</h1>
    <p>Meu primeiro "Site" com PHP</p>

<h2>Adicionar conatato</h2>

 <form action="create.php" method="post">
    <label for="nome">Nome: </label>
     <input type="text" name="nome" id="nome" required>
      <label for="email">Email: </label>
        <input type="email" name="email" id="email" required>
         <input type="submit" value="Adicionar usuario">
     </form>
     <h2>Lista de usuario</h2>
     <table> 
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Açoes (editar/Deletar)</th>
            </tr>
        </thead>
        <tbody>
            <?php if(!empty($_SESSION['users'])) ?>
            <?php foreach($_SESSION['users'] as $user): ?>
            <tr>
                <td><?php echo $user['id']; ?></td>
                <td><?php echo $user['nome']; ?></td>
                <td><?php echo $user['email']; ?></td>
                <td>
                    <a href="edit.php?id=<?php echo $user['id']; ?> " class="botao_editar"  >Editar</a>
                    <a href="delete.php?id=<?php echo $user['id']; ?>" class="botao_deletar" >Deletar</a>
                </td>
            </tr>
            <?php endforeach; ?>
            <php else: ?>
                <tr>
                    <td colspan="4" > Nenhum usuario encontrado </td> 
                </tr>
            </php endif; ?> 
        </tbody>
     </table>
</body>
</html>