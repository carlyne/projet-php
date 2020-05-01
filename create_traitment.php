<?php include('partials/service.php')?>

<?php 
// Get user's informations
$thisUserId = (int) $_POST['id'];
$thisUserCompetence = (int) $_POST['competence'];
$thisUserPseudo = $_POST['pseudo'];

// Update user's profil
$requestInsert = "UPDATE profil SET competence_amount=:competence, pseudo=:pseudo WHERE user_id=:id";
$sendInsert = $bdd->prepare($requestInsert);

$sendInsert->execute([
    'competence' => 1,
    'pseudo' => $thisUserPseudo,
    'id' => $thisUserId
]);

// Add new competence
$requestProfilId =  "SELECT * FROM profil WHERE user_id = $thisUserId";
$sendProfilId = $bdd->query($requestProfilId);
$getProfilId = $sendProfilId->fetch(PDO::FETCH_ASSOC);
$thisProfilId = $getProfilId['id'];

$requestUpdateCompetence = "INSERT INTO competence_profil (competence_id, profil_id) VALUES(:competence, :id)";
$sendUpdateCompetence = $bdd->prepare($requestUpdateCompetence);

$sendUpdateCompetence->execute([
    'competence' => $thisUserCompetence,
    'id' => $thisProfilId
]);


// Back to Homepage
header("Location: index.php");
?>
