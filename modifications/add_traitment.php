<?php include('../partials/service.php')?>

<?php 
$thisCurrentUser = $_SESSION['user'];

if(!isset($thisCurrentUser)) {
    var_dump('not allowed');
    
} else {
    // Add competence to list of all competences
    $requestInsertCompetence = "INSERT INTO competence_list (name, content) VALUES (:name, :content)";
    $sendRequestInsertCompetence = $bdd->prepare($requestInsertCompetence);

    $sendRequestInsertCompetence->execute([
        'name' => $_POST['name'],
        'content' => $_POST['content']
    ]);

    //get new competence id
    $requestCompetenceId = "SELECT * FROM competence_list ORDER BY id DESC LIMIT 1";
    $getCompetenceId = $bdd->query($requestCompetenceId);
    $competenceId = $getCompetenceId->fetch(PDO::FETCH_ASSOC);

    // add new competence to profil page    
    $requestAddCompetence = "INSERT INTO competence_profil (competence_id, profil_id, state_evol) VALUES(:competence, :profil, :state_evol)";
    $sendRequestAddCompetence = $bdd->prepare($requestAddCompetence);
    $sendRequestAddCompetence->execute([
        'competence' => $competenceId['id'],
        'profil' => $thisCurrentUser['profil'],
        'state_evol' => 0
    ]);

    // Back to profil page
    header("Location: ../profil_page.php");
}
?>