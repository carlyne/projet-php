<?php include('../partials/service.php')?>
<?php include('../index_traitment.php')?>

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
    <?php include('../partials/header.php')?>
    <link rel="stylesheet" type="text/css" href="../partials/style.css">
    
</head>
<body>
    <?php include('../partials/navbar.php')?> 

    <main>
        <h1>Ajouter une compétence </h1>

        <form class="creation" action="add_traitment.php" method="POST">
            <input type="hidden" value=<?= $thisUser['id'] ?> name="id">

            <div>
                <p>Ajoutez une compétence inédite</p>
                <input type="text" name="name" id="name" placeholder="nom de la compétence">
            </div>
            <div>
                <textarea name="content" id="content" placeholder="courte description"></textarea>
            </div>
            
            <div>
                <label for="competence">Ou choisissez dans les compétences existantes</label>

                <select name="competence" id="competence">
                <option value="">Choisir une compétence</option>
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