<?php include('partials/service.php')?>

<?php 

// Get user's profil
$requestUserProfil = "SELECT * FROM user LEFT JOIN profil ON user.profil = profil.id";
$getUserProfil = $bdd->query($requestUserProfil);
$userProfil = $getUserProfil->fetch(PDO::FETCH_ASSOC);

$thisUserProfil = (int) $userProfil['id'];

// Get user's competences
$requestCompetences = "SELECT * FROM competence_profil INNER JOIN competence_list ON competence_profil.competence_id = competence_list.id WHERE competence_profil.profil_id = $thisUserProfil";
$getCompetences = $bdd->query($requestCompetences);
$competences = $getCompetences->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Game in Life</title>
</head>
<body>
    <h1>Pseudo : <?= $userProfil['pseudo'] ?> </h1>

    <h2>Compétences</h2>
    <ul>
        <li><?= $competences['name'] ?> : <?= $competences['content'] ?>. State : <?= $competences['evol_state'] ?> %
        <button><a href="modifications/delete.php?competence=<?= $competences['id'] ?>">Delete</a></button></li>
    </ul>

    <h2>Objectifs</h2>
    <ul>
        <li><?= $userProfil['objectifs'] ?></li>
    </ul>
</body>
</html>