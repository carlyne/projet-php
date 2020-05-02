<?php include('../partials/service.php')?>  

<?php 
    // Get form's values
    $thisUserProfil = $_SESSION['user']['profil'];
    $thisCompetence = $_POST['competence'];
    $editedLvl = $_POST['state_evol'];

    // Update new competence's level
    $requestUpdateCompetenceLvl = "UPDATE competence_profil SET state_evol = $editedLvl WHERE profil_id = $thisUserProfil AND competence_id = $thisCompetence";
    $bdd->query($requestUpdateCompetenceLvl);

    // Back to profil page
    header("Location: ../profil_page.php");
?>