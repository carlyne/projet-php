<?php include('partials/service.php')?>
<?php include('index_traitment.php')?>

<?php 
// Get current user informations
$thisUser = $_SESSION['user'];

// Get list of all competences
$request = "SELECT * FROM competence_list";
$response = $bdd->query($request);

$competences = $response->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>  
    <?php include('partials/header.php')?>
    <link rel="stylesheet" type="text/css" href="partials/style.css">
</head>

<body>
    <?php include('partials/navbar.php')?> 

    <main>
        <h1>Créez votre personnage : </h1>
        <h2>Reflet de vos compétences, passions et ambitions démesurées.</h2>

        <form class="creation" action="create_traitment.php" method="POST">
            <input type="hidden" value=<?= $thisUser['id'] ?> name="id">

            <div>
                <input type="text" name="pseudo" id="pseudo" placeholder="votre pseudo">
            </div>
            
            <div>
                <label for="competence">Ajoutez votre toute première compétence !</label>

                <select name="competence" id="competence">
                    <?php foreach($competences as $competence => $value) :?>
                        <option value="<?= $value['id'] ?>"><?= $value['name'] ?></option>
                    <?php endforeach;?>
                </select>
            </div>

            <input class="button" type="submit">
        </form>
    </main>
</body>
</html>