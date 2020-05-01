<?php include('partials/service.php')?>

<?php
    $isUserConnected = false;
    $userHasCharacter = false;
    
    // Check if user is connected
    if (isset($_SESSION['user'])) {
        $isUserConnected = true;

        $currentUser = $_SESSION['user'];
        
        // Get user's profil informations
        $selectUserProfil = "SELECT * FROM user LEFT JOIN profil ON user.profil = profil.id";
        $response = $bdd->query($selectUserProfil);
        $userProfil = $response->fetch(PDO::FETCH_ASSOC);

    } else {
        $isUserConnected = false;
    }

    // Check if character has been created
    if (!empty($userProfil['pseudo'])) {
        $userHasCharacter = true;
    } else {
        $userHasCharacter = false;
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Game in Life</title>
</head>
<body>
    
    <h1>Bienvenue sur Game in Life</h1>

    <?php if (!$isUserConnected) : ?>
        <p>Vous n'avez pas de compte ?</p>
        <button><a href="authentification/signup.php">Inscrivez-vous</a></button>
        
        <p>ou</p>
        <button><a href="authentification/login.php">Connectez-vous</a></button>

    <?php else : ?>
        <h1>Bonjour <?= $userProfil['pseudo'] ?></h1>
        
        <?php if(!$userHasCharacter) : ?>
            <p>Vous n'avez pas encore de personnage ?</p>
            <button><a href="create.php">Créer votre personnage</a></button>
        <?php else :?>
            <p>Afficher votre personnage</p>
            <button><a href="profil_page.php">Afficher votre personnage</a></button>
        <?php endif; ?>

        <p>se déconnecter</p>
        <button><a href="authentification/logout.php">Déconnectez-vous</a></button>
    <?php endif; ?>
    
</body>
</html>