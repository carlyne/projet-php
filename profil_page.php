<?php include('partials/service.php')?>
<?php include('index_traitment.php')?>
<?php include('functions.php')?>

<?php 

if($isUserConnected == true) {

// $currentProfilId = (int) $_SESSION['user']['profil'];

// Get user's profil
$requestUserProfil = "SELECT * FROM profil WHERE id = $profilId";
$getUserProfil = $bdd->query($requestUserProfil);
$userProfil = $getUserProfil->fetch(PDO::FETCH_ASSOC);

// Get user's competences
$requestUserCompetences = "SELECT * FROM competence_profil LEFT JOIN competence_list ON competence_profil.competence_id = competence_list.id WHERE profil_id = $profilId";
$getCompetences = $bdd->query($requestUserCompetences);
$competences = $getCompetences->fetchAll(PDO::FETCH_ASSOC);

//Get user's objectifs
$requestUserObjectifs = "SELECT * FROM objectif WHERE profil_id = $profilId";
$getObjectifs = $bdd->query($requestUserObjectifs);
$objectifs = $getObjectifs->fetchAll(PDO::FETCH_ASSOC);

// Get user's profil image
$profilImage = $userProfil['profil_image'];

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
    <header class="banner"></header>

    <main class="profil-page">
        <div class="card">
            <section class="competences">
                <h2>Compétences</h2>
                <?php foreach($competences as $competence) :?>
                <ul>
                    <li><strong><?= $competence['name'] ?> :</strong> <?= $competence['content'] ?></li>
                    <li>State : <?= $competence['state_evol'] ?> %</li>
                    <button class="profil-button"><a href="modifications/delete_traitment.php?competence=<?= $competence['competence_id'] ?>">Delete</a></button></li>
                    <button class="profil-button"><a href="modifications/edit_competence.php?competence=<?= $competence['competence_id'] ?>">Edit</a></button></li>
                </ul>
                <?php endforeach;?>
            </section>

            <section class="character">
                <h1>Pseudo : <?= $userProfil['pseudo'] ?> </h1>
                <?php if(empty($profilImage)) : ?>
                    <img src="assets/man-default-avatar.png" alt="" width="100%" height="auto">
                <?php else : ?>
                    <img src="assets/<?= $profilImage ?>" alt="" width="100%" height="auto">
                <?php endif; ?>
            </section>

            <section class="objectifs">
                <h2>Objectifs</h2>
                <?php foreach($objectifs as $objectif) :?>
                <ul>
                <li <?php if($objectif['archived'] == 1 ) :?> class="archived" <?php endif;?>><strong><?= $objectif['name'] ?> :</strong> <?= $objectif['content'] ?></li>
                    <button class="profil-button disabled <?php if($objectif['archived'] == 1 ) :?> hidden <?php endif;?>"><a href="modifications/archive_traitment.php">Archive</a></button></li>
                </ul>
                <?php endforeach;?>
            </section>
            
        </div>
        
        <div>
            <button><a href="modifications/add_competence.php">Ajouter une compétence</a></button>
            <button><a href="modifications/upload.php">Modifier l'image</a></button>
        </div>


    </main>

    



    
</body>
</html>