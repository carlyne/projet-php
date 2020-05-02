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
    $requestAddCompetence = "INSERT INTO competence_profil (competence_id, profil_id) VALUES(:competence, :profil)";
    $sendRequestAddCompetence = $bdd->prepare($requestAddCompetence);
    $sendRequestAddCompetence->execute([
        'competence' => $competenceId['id'],
        'profil' => $thisCurrentUser['profil']
    ]);

    // Back to Homepage
    header("Location: ../profil_page.php");
}
?>