<?php include('partials/service.php')?>

<?php 
// Get current user informations
$thisUser = $_SESSION['user'];

// Get list of all competences
$request = "SELECT * FROM competence";
$response = $bdd->query($request);

$competences = $response->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>  
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Game in Life</title>
</head>
<body>
    <h1>Créez votre personnage : </h1>
    <h2>Reflet de vos compétences, passion et ambitions démesurées.</h2>

    <form action="create_traitment.php" method="POST">
        <input type="hidden" value=<?= $thisUser['id'] ?> name="id">
        <div>
            <label for="pseudo">Pseudo</label>
            <input type="text" name="pseudo" id="pseudo" placeholder="votre pseudo">
        </div>
        
        <div>
            <label for="competence">Ajoutez votre toute première compétence !</label>

            <select name="competence" id="competence">
                <option value="no skill">Compléter plus tard</option>
                <?php foreach($competences as $competence => $value) :?>
                    <option value="<?= $value['id'] ?>"><?= $value['name'] ?></option>
                <?php endforeach;?>
            </select>
        </div>
        <input type="submit">
    </form>
</body>
</html>