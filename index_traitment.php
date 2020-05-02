<?php
    $isUserConnected = false;
    $userHasCharacter = false;

    // Check if user is connected
    if (isset($_SESSION['user'])) {
        $isUserConnected = true;
        $currentUserId = $_SESSION['user']['id'];
        
        // Get user's profil informations
        $selectUserProfil = "SELECT * FROM user LEFT JOIN profil ON user.profil = profil.id WHERE   user.id = $currentUserId";
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