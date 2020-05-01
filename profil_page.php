<?php include('partials/service.php')?>

<?php 

// Get user's profil
$selectUserProfil = "SELECT * FROM user LEFT JOIN profil ON user.profil = profil.id";
$response = $bdd->query($selectUserProfil);
$userProfil = $response->fetch(PDO::FETCH_ASSOC);

// Get user's competences
$selectSkills = "SELECT * FROM profil INNER JOIN competence ON profil.competences = competence.id";
$queryResponse = $bdd->query($selectSkills);
$competences = $queryResponse->fetchAll(PDO::FETCH_ASSOC);

var_dump($competences);
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
        <li><?= $userProfil['competences'] ?></li>
    </ul>

    <h2>Objectifs</h2>
    <ul>
        <li><?= $userProfil['objectifs'] ?></li>
    </ul>
</body>
</html>