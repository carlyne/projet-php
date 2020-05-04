<?php

    $isUserConnected = false;
    $userHasCharacter = false;

    // Check if user is connected
    if (isset($_SESSION['user']) && !empty($_SESSION['user'])) {
        $isUserConnected = true;
        $profilId =  (int) $_SESSION['user']['profil'];
        
        // Get user's profil informations
        $requestUserProfil = "SELECT * FROM profil WHERE id = $profilId";
        $sendUserProfil = $bdd->query($requestUserProfil);
        $userProfil = $sendUserProfil->fetch(PDO::FETCH_ASSOC);

    } else {
        $isUserConnected = false;
    }

    // Check if character has been created
    if ($isUserConnected == true && !empty($userProfil['pseudo'])) {
        $userHasCharacter = true;
    } else {
        $userHasCharacter = false;
    }
    
?>