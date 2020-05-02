<?php include('../partials/service.php')?>
<?php include('../index_traitment.php')?>

<?php 
// Get current user informations
$thisUserProfil = $_SESSION['user']['profil'];
$thisCompetence = $_GET['competence'];

// Get selected competence lvl
$requestCompetenceLvl = "SELECT * FROM competence_profil WHERE profil_id = $thisUserProfil AND competence_id = $thisCompetence";
$getCompetenceLvl = $bdd->query($requestCompetenceLvl);
$competenceLvl = $getCompetenceLvl->fetch(PDO::FETCH_ASSOC);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('../partials/header.php')?>
    <link rel="stylesheet" type="text/css" href="../partials/style.css">
    
</head>
<body>
    <?php include('../partials/navbar.php')?> 

    <main>
        <h1>Modifier votre compétence </h1>

        <form class="creation" action="edit_traitment.php" method="POST">
            <input type="hidden" value=<?= $thisCompetence ?> name="competence">

            <div>
                <label for="state_evol">Changer votre niveau de compétence</label>
                <input type="number" name="state_evol" id="state_evol" value=<?= $competenceLvl['state_evol'] ?> min="0" max="100" step=10>
            </div>

            <input class="button" type="submit">
        </form>
    </main>
    
</body>
</html>