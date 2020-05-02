<?php include('partials/service.php')?>
<?php include('index_traitment.php')?>

<?php 

$currentProfilId = (int) $_SESSION['user']['profil'];

// Get user's profil
$requestUserProfil = "SELECT * FROM profil WHERE id = $currentProfilId";
$getUserProfil = $bdd->query($requestUserProfil);
$userProfil = $getUserProfil->fetch(PDO::FETCH_ASSOC);

// Get user's competences
$requestCompetences = "SELECT * FROM competence_profil INNER JOIN competence_list ON competence_profil.competence_id = competence_list.id WHERE competence_profil.profil_id = $currentProfilId";
$getCompetences = $bdd->query($requestCompetences);
$competences = $getCompetences->fetch(PDO::FETCH_ASSOC);
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
                <ul>
                    <li><strong><?= $competences['name'] ?> :</strong> <?= $competences['content'] ?></li>
                    <li>State : <?= $competences['evol_state'] ?> %</li>
                    <button class="profil-button"><a href="modifications/delete_traitment.php?competence=<?= $competences['id'] ?>">Delete</a></button></li>
                    <button class="profil-button"><a href="modifications/edit_traitment.php?competence=<?= $competences['id'] ?>">Edit</a></button></li>
                </ul>
            </section>

            <section class="character">
                <h1>Pseudo : <?= $userProfil['pseudo'] ?> </h1>
                <img src="assets/canadian-dollar.png" alt="" width="100%" height="200px ">
            </section>

            <section class="objectifs">
                <h2>Objectifs</h2>
                <ul>
                    <li><?= $userProfil['objectifs'] ?></li>
                </ul>
            </section>
            
        </div>

        <button><a href="modifications/add_competence.php">Ajouter une compétence</a></button>


    </main>

    



    
</body>
</html>