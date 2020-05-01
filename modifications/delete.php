<?php include('../partials/service.php')?>

<?php 

// Check if user connected

if (!isset($_SESSION['user'])) {
    //header('Location 403.html');
}

$thisCompetenceId = (int) $_GET['competence'];
$profilId = (int) $_SESSION['user']['profil'];

$hasCompetenceRequest = "SELECT * FROM competence_profil WHERE profil_id = $profilId AND competence_id = $thisCompetenceId";
$getCompetence = $bdd->query($hasCompetenceRequest);
$hasCompetence = $getCompetence->fetch(PDO::FETCH_ASSOC);
var_dump($hasCompetence);

// Delete resource
if (!$hasCompetence) {
    var_dump('no');
} else {
    // $requestDelete = "DELETE FROM competence_profil WHERE id = $thisCompetenceId";
    var_dump('ok');
}

?>