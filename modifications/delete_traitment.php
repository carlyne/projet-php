<?php include('../partials/service.php')?>

<?php 

// Check if user connected
if (!isset($_SESSION['user'])) {
    var_dump('not allowed');
} else {
    $thisCompetenceId = (int) $_GET['competence'];
    $thisProfilId = (int) $_SESSION['user']['profil'];

    // Check if competence match with current user's profil
    $hasCompetenceRequest = "SELECT * FROM competence_profil WHERE profil_id = $thisProfilId AND competence_id = $thisCompetenceId";
    $getCompetence = $bdd->query($hasCompetenceRequest);
    $hasCompetence = $getCompetence->fetch(PDO::FETCH_ASSOC);
}


// Delete resource
if (!$hasCompetence) {
    var_dump('not allowed');

} else {
    $requestDelete = "DELETE FROM competence_profil WHERE competence_id = $thisCompetenceId";
    $bdd->query($requestDelete);

    // Back to Homepage
    header("Location: ../profil_page.php");
}

?>