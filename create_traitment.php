<?php include('partials/service.php')?>

<?php 
// Get user's informations
$thisUserId = (int) $_POST['id'];
$thisUserCompetence = (int) $_POST['competence'];
$thisUserPseudo = $_POST['pseudo'];

// Update user's profil
$requestInsert = "UPDATE profil SET competences=:competences, pseudo=:pseudo WHERE user_id=:id";
$query = $bdd->prepare($requestInsert);

$query->execute([
    'competences' => $thisUserCompetence,
    'pseudo' => $thisUserPseudo,
    'id' => $thisUserId
]);

// Back to Homepage
header("Location: index.php");
?>
