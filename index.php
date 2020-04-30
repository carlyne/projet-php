<?php session_start()?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Game in Life</title>
</head>
<body>
    
    <h1>Bienvenue sur Game in Life</h1>

    <?php if (!isset( $_SESSION['user'])) : ?>
        <p>Vous n'avez pas de compte ?</p>
        <button><a href="authentification/signup.php">Inscrivez-vous</a></button>
        
        <p>ou</p>
        <button><a href="authentification/login.php">Connectez-vous</a></button>

    <?php else : ?>
        <h1>Bonjour <?= $_SESSION['user']['email'] ?></h1>
        <p>Vous n'avez pas encore de personnage ?</p>
        <button><a href="create.php">Créer votre personnage</a></button>

        <p>se déconnecter</p>
        <button><a href="authentification/logout.php">Déconnectez-vous</a></button>
    <?php endif; ?>
    
</body>
</html>