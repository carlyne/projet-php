<?php include('partials/service.php')?>

<?php 
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
        <input type="hidden" value="user_id" name="id">
        <div>
            <label for="pseudo">Pseudo</label>
            <input type="text" name="pseudo" id="pseudo" placeholder="votre pseudo">
        </div>
        <p>Ajoutez votre toute première compétence !</p>
        <div>
            <label for="competence">Pseudo</label>
            <input type="text" name="competence" id="competence" placeholder="un de vos (nombreux) talents">
        </div>
        <input type="submit">
    </form>
</body>
</html>