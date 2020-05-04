<?php include('partials/service.php')?>
<?php include('index_traitment.php')?>
<?php include('functions.php')?>

<?php

//Get 3 last users's profils
if($isUserConnected === true) {
    $requestAllProfilsExcept = "SELECT * FROM profil WHERE NOT id = $profilId ORDER BY id DESC LIMIT 3";
    $profilsExcept = doRequest($bdd, $requestAllProfilsExcept);

} else {
    $requestAllProfils = "SELECT * FROM profil ORDER BY id DESC LIMIT 3";
    $profils = doRequest($bdd, $requestAllProfils);
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('partials/header.php')?>
    <link rel="stylesheet" type="text/css" href="partials/style.css">
</head>
<body>
    
    <?php include('partials/navbar.php')?>   


    <!-- Dynamic banner -->
    <header class="banner">
        <h1>
            Bienvenue sur Game in Life <?php if ($userHasCharacter) : ?>, <?= $userProfil['pseudo'] ?><?php endif; ?>
        </h1>
        
        <?php if (!$isUserConnected) : ?>
            <button><a href="authentification/login.php">Se connecter</a></button>
        <?php elseif (!$userHasCharacter) : ?>
            <button><a href="create.php">Créer votre personnage</a></button>
        <?php else : ?>
            <button><a href="profil_page.php">Afficher votre personnage</a></button>
        <?php endif; ?>
    </header>
    

    <!-- Presentation -->
    <main class="main-index">
        <p>
            Gérez votre vie comme si vous étiez dans un jeux vidéo ! Créez votre perosnnage, ajoutez-lui vos compétences, objectifs, donnez-lui des objets et voyez votre évolution en acucmulant des compétences!
            Ayez un profil unique en débloquant des images de profils au fur et à mesure que vous parvenez à vos objectifs !
        </p>
        <figure>
            <img src="assets/avataaars.png" alt="avatar-exemple">
        </figure>
    </main>


    <!-- Display last profils created -->
    <h2>Les derniers profils créés :</h2>

    <section class="profils">
        <?php if($isUserConnected === true) : ?>

        <?php foreach($profilsExcept as $profil => $value) : ?>
            <div class="card-profil">
                <figure><img src="assets/<?= $value['profil_image'] ?>" alt=""></figure>
                <div> 
                <h3><a href="profil_page.php?id=<?= $value['id'] ?>"><?= $value['pseudo'] ?></a></h3>
                </div>
            </div>
        <?php endforeach; ?>

        <?php else : ?>
            <?php foreach($profils as $profil => $value) : ?>
                <div class="card-profil">
                    <figure><img src="assets/<?= $value['profil_image'] ?>" alt=""></figure>
                    <div> 
                        <h3><a href="profil_page.php?id=<?= $value['id'] ?>"><?= $value['pseudo'] ?></a></h3>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>    
    </section>
    
</body>
</html>